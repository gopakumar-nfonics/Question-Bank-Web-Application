<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionConfig extends Model
{
    protected $table = 'tbl_question_config';

    protected $fillable = [
        'qc_subject_id',
        'qc_no_of_questions',
        'qc_code',
        'created_by'
    ];

    // Define relationships if applicable
    public function details()
    {
        return $this->hasMany(QuestionConfiginfo::class, 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'qc_subject_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
