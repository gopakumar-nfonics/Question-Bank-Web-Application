<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{

    use HasFactory;
    protected $table = 'tbl_question_paper';
    protected $primaryKey = 'qp_id';
    protected $fillable = ['qp_title', 'qp_code', 'qp_template','created_by'];
}
