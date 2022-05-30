<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'skill_name',
    ];

    public function skillLevels()
    {
        return $this->belongsToMany(SkillLevel::class, 'skills_level', 'id', 'skills_id');
    }
}
