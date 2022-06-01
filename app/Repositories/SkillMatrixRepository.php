<?php

namespace App\Repositories;

use App\Models\Level;
use App\Models\Skill;
use App\Models\SkillLevel;
use App\Models\User;

class SkillMatrixRepository
{
    protected $skill_level;
    protected $users;
    protected $skills;
    protected $levels;

    public function __construct(
        SkillLevel $skill_level,
        User $users,
        Skill $skills,
        Level $levels
    )
    {
        $this->skill_level = $skill_level;
        $this->users = $users;
        $this->skills = $skills;
        $this->levels = $levels;
    }

    public function getAllSkillLevel()
    {
        return $this->skill_level;
    }

    public function getAllLevel()
    {
        return $this->levels;
    }

    public function getAllSkill()
    {
        return $this->skills;
    }

    public function getAllUser()
    {
        return $this->users;
    }

    public function save($input)
    {
        return $this->skill_level->create($input);
    }
}
