<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = [
        'level',
        'desc',
        'color'
    ];

    public function skilllevels()
    {
        return $this->belongsToMany(SkillLevel::class, 'skills_level', 'id', 'level_id');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'skills_level', 'id', 'id');
    // }

}
