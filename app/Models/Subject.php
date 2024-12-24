<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects_tbl';

    protected $primaryKey = 'id';

    protected $fillable = [
        'sub_code',
        'sub_name',
        'sub_created_by',
        'sub_remarks',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'sub_created_by');
    }
}
