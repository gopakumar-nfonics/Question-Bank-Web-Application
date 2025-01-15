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
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class GenerateQuestionPapersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;
    protected $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->user_id = $request['user_id'] ?? null;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
{
    $request = $this->request;

    // Get the next incrementing number for `qp_code`
    $lastQuestionPaper = QuestionPaper::where('qp_code', 'LIKE', 'AMQP%')
        ->orderBy('created_at', 'desc')
        ->first();

    // Extract the numeric part of the `qp_code` and increment it
    $nextCount = $lastQuestionPaper ? ((int)substr($lastQuestionPaper->qp_code, 4, 5)) + 1 : 1;

    for ($i = 1; $i <= $request['qp_count']; $i++) {
        $qp_code = $this->generateUniqueCode('AMQP', $i, $nextCount, $request['qp_count']);

        $questionPaper = QuestionPaper::create([
            'qp_title' => $request['qp_title'],
            'qp_code' => $qp_code,
            'qp_template' => $request['qp_template'],
            'created_by' => $this->user_id,
        ]);

        $templateDetails = QuestionConfiginfo::where('qd_template_id', $request['qp_template'])->get();

        $selectedQuestionIds = $this->selectQuestionsWithRepetition($templateDetails);

        $this->saveSelectedQuestions($selectedQuestionIds, $questionPaper->qp_id);

        // Generate the question paper document
        $this->generateQuestionPaperDoc($questionPaper, $selectedQuestionIds);
    }
}

    private function generateUniqueCode($baseCode, $index, $currentCount, $totalCount)
{
    $formattedBaseCode = $baseCode . str_pad($currentCount, 5, '0', STR_PAD_LEFT);

    // Append `_index` only if total count is greater than 1
    if ($totalCount > 1) {
        $formattedBaseCode .= "-{$index}";
    }

    return $formattedBaseCode;
}

    private function selectQuestionsWithRepetition($templateDetails)
{
    $selectedQuestionIds = []; // To store all selected question IDs for this paper.

    foreach ($templateDetails as $detail) {
        // Fetch unused questions excluding already selected ones.
        $unusedQuestions = Questions::where('qs_subject_id', $detail->qd_subject_id)
            ->where('qs_topic_id', $detail->qd_topic_id)
            ->where('qs_difficulty_level', $detail->qd_difficulty_level)
            ->where('qs_usage_count', 0)
            ->whereNotIn('qs_id', $selectedQuestionIds) // Exclude already selected questions
            ->inRandomOrder()
            ->limit($detail->qd_no_of_questions)
            ->pluck('qs_id')
            ->toArray();

        // If not enough unused questions, fetch the least used ones.
        if (count($unusedQuestions) < $detail->qd_no_of_questions) {
            $neededQuestions = $detail->qd_no_of_questions - count($unusedQuestions);

            $leastUsedQuestions = Questions::where('qs_subject_id', $detail->qd_subject_id)
                ->where('qs_topic_id', $detail->qd_topic_id)
                ->where('qs_difficulty_level', $detail->qd_difficulty_level)
                ->whereNotIn('qs_id', array_merge($selectedQuestionIds, $unusedQuestions)) // Exclude already selected
                ->orderBy('qs_usage_count', 'asc')
                ->limit($neededQuestions)
                ->pluck('qs_id')
                ->toArray();

            $unusedQuestions = array_merge($unusedQuestions, $leastUsedQuestions);
        }

        // Add selected questions to the global list.
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

        $this->addPaperTitle($section, $questionPaper);
        $this->addQuestionsToDoc($section, $selectedQuestionIds);

        $directory = storage_path('app/question_papers');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $fileName = $directory . '/' . $questionPaper->qp_code . '.docx';
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($fileName);

        return $fileName;
    }

    /**
     * Add the title to the question paper document.
     */
    private function addPaperTitle($section, $questionPaper)
    {
        $section->addText(
            "{$questionPaper->qp_title} : {$questionPaper->qp_code}",
            ['bold' => true, 'size' => 14],
            ['alignment' => 'left', 'spaceAfter' => 150]
        );
        $section->addTextBreak(1);
    }

    /**
     * Add questions and their details to the document.
     */
    private function addQuestionsToDoc($section, $selectedQuestionIds)
    {
        $questions = Questions::whereIn('qs_id', $selectedQuestionIds)
            ->orderBy('qs_subject_id')
            ->get();

        foreach ($questions as $question) {
            $this->addQuestionToDoc($section, $question);
        }
    }

    /**
     * Add a single question with its options and details to the document.
     */
    private function addQuestionToDoc($section, $question)
    {
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);

        $this->addQuestionMetadata($table, $question);
        $this->addQuestionContent($table, $question);
        $this->addOptions($table, $question);
    }

    /**
     * Add question metadata to the table.
     */
    private function addQuestionMetadata($table, $question)
    {
        $table->addRow();
        $table->addCell(3000)->addText("QID: {$question->qs_id}");
        $table->addCell(3000)->addText("Difficulty: {$question->difficultylevel->difficulty_level}");
    }

    /**
     * Add question content to the table.
     */
    private function addQuestionContent($table, $question)
    {
        $table->addRow();
        $table->addCell(3000)->addText("Question:");
        $cleanedQuestion = $this->cleanHtml($question->qs_question); // Clean HTML
        \PhpOffice\PhpWord\Shared\Html::addHtml($table->addCell(8000), $cleanedQuestion);
    }

    /**
     * Add options to the table.
     */
    private function addOptions($table, $question)
    {
        $options = QuestionOption::where('qo_question_id', $question->qs_id)->get();
        foreach ($options as $key => $option) {
            $table->addRow();
            $table->addCell(3000)->addText("Option " . chr(65 + $key));
            $cleanedOption = $this->cleanHtml($option->qo_options); // Clean HTML
            \PhpOffice\PhpWord\Shared\Html::addHtml($table->addCell(8000), $cleanedOption);
        }
    }

    /**
     * Clean HTML content to ensure all tags are properly closed.
     */
    private function cleanHtml($html)
    {
        libxml_use_internal_errors(true); // Disable warnings for invalid HTML
        $dom = new \DOMDocument();
        $dom->loadHTML($html);
        $dom->saveHTML(); // This will fix unclosed tags
        return $dom->saveHTML();
    }


}
