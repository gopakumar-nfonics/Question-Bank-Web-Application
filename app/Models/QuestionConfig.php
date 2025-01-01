<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionConfig extends Model
{
    protected $table = 'tbl_question_template';

    protected $fillable = [
        'qt_title',
        'qt_no_of_questions',
        'created_by'
    ];

    // Define relationships if applicable
    public function details()
    {
        return $this->hasMany(QuestionConfiginfo::class, 'qd_template_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
