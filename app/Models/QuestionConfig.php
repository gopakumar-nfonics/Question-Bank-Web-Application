<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionConfig extends Model
{
    protected $table = 'tbl_question_config';

    protected $fillable = [
        'qc_subject_id',
        'qc_topic_id',
        'qc_difficulty_level',
        'qc_no_of_questions',
        'created_by'
    ];

    // Define relationships if applicable
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'qc_subject_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'qc_topic_id');
    }
    public function difficultylevel()
    {
        return $this->belongsTo(DifficultyLevel::class, 'qc_difficulty_level');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'qc_created_by');
    }
}
