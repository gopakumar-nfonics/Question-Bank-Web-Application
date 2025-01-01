<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionConfiginfo extends Model
{
    protected $table = 'tbl_question_template_details';
    protected $fillable = [
        'qd_template_id','qd_subject_id','qd_topic_id', 'qd_difficulty_level', 'qd_no_of_questions'
    ];

    public function questionConfig()
    {
        return $this->belongsTo(QuestionConfig::class, 'qd_template_id');
    }
    
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'qd_subject_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'qd_topic_id');
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class, 'qd_difficulty_level');
    }
}
