<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;
    protected $table = 'tbl_question_options';

    protected $primaryKey = 'qo_id';

    protected $fillable = [
        'qo_question_id',
        'qo_options',
        'qo_created_by',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'qo_question_id');
    }
}
