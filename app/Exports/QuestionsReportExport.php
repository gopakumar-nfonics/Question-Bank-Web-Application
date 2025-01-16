<?php

namespace App\Exports;

use App\Models\Question;
use App\Models\DifficultyLevel;
use App\Models\Subject;
use App\Models\Topic;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QuestionsReportExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize, WithStyles
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function array(): array
    {
       
        $query = Question::with('subject', 'topic', 'difficultyLevel');

        if ($this->request->subject) {
            if ($this->request->topic) {
                $query->where('qs_subject_id', $this->request->subject); 
                $query->where('qs_topic_id', $this->request->topic);
                $subjects = Subject::where('id', $this->request->subject)
                ->with(['topics' => function ($query) {
                    $query->where('topic_id', $this->request->topic);  // Load only this topic
                }])
                ->get();
            }else{
            $query->where('qs_subject_id', $this->request->subject);
            $subjects = Subject::with('topics')->where('id', $this->request->subject)->get();
            }
        }else{

            $subjects = Subject::with('topics')->get();

        }

       

        if ($this->request->difficulty) {
            $query->where('qs_difficulty_level', $this->request->difficulty);
            $difficultyLevels = DifficultyLevel::where('id', $this->request->difficulty)->pluck('difficulty_level', 'id')->toArray();
        
        }else{

            $difficultyLevels = DifficultyLevel::pluck('difficulty_level', 'id')->toArray();
        

        }

        if ($this->request->has('qp_managers') && $this->request->qp_managers != '') {
            $query->where('created_by', $this->request->qp_managers);
        }
        if ($this->request->has('used_status') && $this->request->used_status !== '') {
            if ($this->request->used_status == 'used') {
                $query->where('qs_usage_count', '>', 0);  // ✅ Used questions
            } elseif ($this->request->used_status == 'notused') {
                $query->where('qs_usage_count', '=', 0);  // ✅ Unused questions
            }
        }

        $questions = $query->get();

        $grouped = $questions->groupBy(function ($item) {
            return $item->subject->sub_name . '-' . $item->topic->topic_name;
        });

        $data = [];

        foreach ($subjects as $subject) {
            foreach ($subject->topics as $topic) {
                $subjectTopicKey = $subject->sub_name . '-' . $topic->topic_name;
                $row = [
                    'Subject' => $subject->sub_name,
                    'Topic'   => $topic->topic_name,
                ];

                foreach ($difficultyLevels as $levelId => $levelName) {
                    $row[$levelName] = '0'; // Default to 0
                }

                if (isset($grouped[$subjectTopicKey])) {
                    $questionsGroup = $grouped[$subjectTopicKey];

                    foreach ($difficultyLevels as $levelId => $levelName) {
                        $count = $questionsGroup->where('qs_difficulty_level', $levelId)->count();
                        $row[$levelName] = ($count === 0 || $count === null) ? '0' : $count;
                    }
                }

                $data[] = $row;
            }
        }

        // Calculate totals
        $totalRow = ['Subject' => 'Total', 'Topic' => ''];
        foreach ($difficultyLevels as $levelName) {
            $totalRow[$levelName] = array_sum(array_column($data, $levelName));
        }
        $data[] = $totalRow;

        return $data;
    }

    public function headings(): array
    {
        //$difficultyLevels = DifficultyLevel::pluck('difficulty_level')->toArray();
        if ($this->request->difficulty) {
            $difficultyLevels = DifficultyLevel::where('id', $this->request->difficulty)->pluck('difficulty_level')->toArray();
        
        }else{

            $difficultyLevels = DifficultyLevel::pluck('difficulty_level')->toArray();
        

        }
        return array_merge(['Subject', 'Topic'], $difficultyLevels);
    }

    public function title(): string
    {
        return 'Questions Report';
    }

    public function styles(Worksheet $sheet)
{
    // Add a custom header at the top
    $sheet->mergeCells('A1:E1'); // Merge cells for the title
    $sheet->setCellValue('A1', 'Questions Report'); // Set the title text
    $sheet->getStyle('A1')->applyFromArray([
        'font' => ['bold' => true, 'size' => 11, 'color' => ['argb' => 'FFFFFFFF'], 'name' => 'Verdana'],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF0070C0'],
            ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ]);

    // Add column headings to row 2
    $headings = $this->headings(); // Retrieve column headings
    $sheet->fromArray($headings, null, 'A2'); // Write the headings to row 2

    $headerRow = 2; // Row for the column headings
    $data = $this->array(); // Get the actual data
    $startRow = $headerRow + 1; // Start data from row after header
    $lastRow = count($data) + $startRow - 1; // Determine the last row
    $lastColumnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($headings));

    // Apply bold styling to column headings
    $sheet->getStyle("A{$headerRow}:{$lastColumnLetter}{$headerRow}")->applyFromArray([
        'font' => ['bold' => true, 'size' => 11,  'name' => 'Verdana'],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ]);

    // Add the data to the sheet and merge cells dynamically for "Subject"
    $currentSubject = null;
    $mergeStartRow = $startRow; // Track the row for merging

    foreach ($data as $index => $row) {
        $currentRow = $startRow + $index; // Calculate current row
        $sheet->fromArray($row, null, "A{$currentRow}"); // Add data to row

        if ($row['Subject'] !== $currentSubject) {
            // Merge previous subject rows if needed
            if ($currentSubject !== null) {
                $sheet->mergeCells("A{$mergeStartRow}:A" . ($currentRow - 1));
            }

            // Update for the new subject
            $currentSubject = $row['Subject'];
            $mergeStartRow = $currentRow;
        }
    }

    // Merge the last group of subject rows
    $sheet->mergeCells("A{$mergeStartRow}:A{$lastRow}");

    // Apply bold styling to the total row
    $sheet->getStyle("A{$lastRow}:{$lastColumnLetter}{$lastRow}")->applyFromArray([
        'font' => ['bold' => true, 'size' => 11, 'color' => ['argb' => 'FFFFFFFF'], 'name' => 'Verdana'],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF0070C0'],
            ],
       
    ]);

    return [];
}



}
