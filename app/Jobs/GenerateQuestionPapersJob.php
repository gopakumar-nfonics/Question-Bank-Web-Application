<?php

namespace App\Jobs;

use App\Models\QuestionPaper;
use App\Models\QuestionConfiginfo;
use App\Models\QuestionPaperQuestion;
use App\Models\Question as Questions;
use App\Models\QuestionOption;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class GenerateQuestionPapersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request = $this->request;

        for ($i = 1; $i <= $request['qp_count']; $i++) {
            $qp_code = $this->generateUniqueCode($request['qp_code'], $i);

            $questionPaper = QuestionPaper::create([
                'qp_title' => $request['qp_title'],
                'qp_code' => $qp_code,
                'qp_template' => $request['qp_template'],
                'created_by' => Auth::id(),
            ]);

            $templateDetails = QuestionConfiginfo::where('qd_template_id', $request['qp_template'])->get();

            $selectedQuestionIds = $this->selectQuestionsWithRepetition($templateDetails);

            $this->saveSelectedQuestions($selectedQuestionIds, $questionPaper->qp_id);

            // Generate the question paper document
            $this->generateQuestionPaperDoc($questionPaper, $selectedQuestionIds);
        }
    }

    private function generateUniqueCode($baseCode, $index)
    {
        do {
            $randomNumber = random_int(1, 100);
            $qp_code = "{$baseCode}_{$index}_{$randomNumber}";
        } while (QuestionPaper::where('qp_code', $qp_code)->exists());

        return $qp_code;
    }

    private function selectQuestionsWithRepetition($templateDetails)
    {
        $selectedQuestionIds = [];

        foreach ($templateDetails as $detail) {
            $unusedQuestions = Questions::where('qs_subject_id', $detail->qd_subject_id)
                ->where('qs_difficulty_level', $detail->qd_difficulty_level)
                ->where('qs_usage_count', 0)
                ->inRandomOrder()
                ->limit($detail->qd_no_of_questions)
                ->pluck('qs_id')
                ->toArray();

            if (count($unusedQuestions) < $detail->qd_no_of_questions) {
                $neededQuestions = $detail->qd_no_of_questions - count($unusedQuestions);

                $leastUsedQuestions = Questions::where('qs_subject_id', $detail->qd_subject_id)
                    ->where('qs_difficulty_level', $detail->qd_difficulty_level)
                    ->whereNotIn('qs_id', $unusedQuestions)
                    ->orderBy('qs_usage_count', 'asc')
                    ->limit($neededQuestions)
                    ->pluck('qs_id')
                    ->toArray();

                $unusedQuestions = array_merge($unusedQuestions, $leastUsedQuestions);
            }

            $selectedQuestionIds = array_merge($selectedQuestionIds, $unusedQuestions);
        }

        return $selectedQuestionIds;
    }

    private function saveSelectedQuestions($selectedQuestionIds, $paperId)
    {
        foreach ($selectedQuestionIds as $qs_id) {
            QuestionPaperQuestion::create([
                'qpq_papper_id' => $paperId,
                'qpq_question_id' => $qs_id,
            ]);
        }

        Questions::whereIn('qs_id', $selectedQuestionIds)->increment('qs_usage_count');
    }

    private function generateQuestionPaperDoc($questionPaper, $selectedQuestionIds)
{
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    // Add the title of the question paper
    $section->addText(
        $questionPaper->qp_title, // Title text
        ['bold' => true, 'size' => 16], // Title styling
        ['alignment' => 'center'] // Title alignment
    );

    // Add a line break after the title
    $section->addTextBreak(2);

    // Fetch the questions from the database
    $questions = Questions::whereIn('qs_id', $selectedQuestionIds)->get();

    foreach ($questions as $index => $question) {
        // Add the question text with numbering
        $section->addText(
            ($index + 1) . ". " . $question->qs_question,
            ['size' => 12], // Question styling
            ['alignment' => 'left'] // Question alignment
        );

        // Fetch and display the options
        $options = QuestionOption::where('qo_question_id', $question->qs_id)->get();

        foreach ($options as $key => $option) {
            $section->addText(
                chr(65 + $key) . ". " . $option->qo_options, // Option in A, B, C, D format
                ['size' => 11], // Option styling
                ['alignment' => 'left', 'indent' => 0.5] // Option alignment with slight indentation
            );
        }

        // Add a line break after each question and its options
        $section->addTextBreak(1);
    }

    // Generate the file name and ensure the directory exists
    $directory = storage_path('app/question_papers');
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    $fileName = $directory . '/' . $questionPaper->qp_code . '.docx';

    // Save the document
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($fileName);

    return $fileName; // Optionally return the file path
}

}
