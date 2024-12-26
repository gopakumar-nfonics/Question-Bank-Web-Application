<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics_tbl';

    protected $primaryKey = 'topic_id';

    protected $fillable = ['subject_id', 'topic_name', 'created_by'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
