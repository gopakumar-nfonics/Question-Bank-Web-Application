<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifficultyLevel extends Model
{
    use HasFactory;
    protected $table = 'tbl_difficulty_level';

    protected $fillable = [
        'difficulty_level',
        'difficulty_level_color',
        'created_by',
    ];

}
