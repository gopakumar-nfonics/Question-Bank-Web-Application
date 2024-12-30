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
        'created_by',
    ];
}
