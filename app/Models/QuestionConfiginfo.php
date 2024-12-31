<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionConfiginfo extends Model
{
    protected $table = 'tbl_question_config_info';
    protected $fillable = [
        'qi_config_id', 'qi_topic_id', 'qi_difficulty_level', 'qi_no_of_questions'
    ];

    public function questionConfig()
    {
        return $this->belongsTo(QuestionConfig::class, 'qi_config_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'qi_topic_id');
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class, 'qi_difficulty_level');
    }
}
