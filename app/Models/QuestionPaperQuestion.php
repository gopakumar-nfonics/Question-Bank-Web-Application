<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaperQuestion extends Model
{
    use HasFactory;

    protected $table = 'tbl_question_paper_question';
    protected $primaryKey = 'qpq_id';
    protected $fillable = ['qpq_papper_id', 'qpq_question_id'];
}
