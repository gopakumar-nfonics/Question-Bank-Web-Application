<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'tbl_question';

    protected $primaryKey = 'qs_id';

    protected $fillable = [
        'qs_question',
        'qs_answer',
        'qs_difficulty_level',
        'qs_subject_id',
        'qs_topic_id',
        'qs_usage_count',
        'created_by',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'qs_subject_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'qs_topic_id');
    }

    public function correctAnswer()
    {
        return $this->belongsTo(QuestionOption::class, 'qs_answer', 'qo_id');
    }

    public function difficultylevel()
    {
        return $this->belongsTo(DifficultyLevel::class, 'qs_difficulty_level');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
