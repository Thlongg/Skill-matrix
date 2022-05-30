<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    use HasFactory;

    protected $table = 'skills_level';

    protected $fillable = [
        'user_id',
        'skills_id',
        'level_id',
        'start_date',
        'end_date'
    ];

    // public function skills()
    // {
    //     return $this->belongsToMany(Skill::class, 'skills_level', 'skills_id', 'id');
    // }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'skills_level', 'user_id', 'id');
    // }

    // public function levels()
    // {
    //     return $this->belongsToMany(Level::class, 'skills_level', 'level_id', 'id');
    // }
}
