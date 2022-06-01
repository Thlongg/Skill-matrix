<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            // [
            //     'skill_name' => ('PHP'),
            // ],
            [
                'skill_name' => ('Laravel'),
            ],
            [
                'skill_name' => ('CakePHP'),
            ],
            [
                'skill_name' => ('Javacript'),
            ],
            [
                'skill_name' => ('jQuery'),
            ],
            [
                'skill_name' => ('VueJS'),
            ],
            [
                'skill_name' => ('AngularJS'),
            ],
            [
                'skill_name' => ('ReactJS'),
            ],
            [
                'skill_name' => ('MySQL'),
            ],
            [
                'skill_name' => ('MongoDB'),
            ],
            [
                'skill_name' => ('NodeJS'),
            ],
            [
                'skill_name' => ('Python'),
            ],
            [
                'skill_name' => ('GoLang'),
            ],
            [
                'skill_name' => ('Java'),
            ],
            [
                'skill_name' => ('Ruby'),
            ],
            [
                'skill_name' => ('HTML/CSS'),
            ],
            [
                'skill_name' => ('HTML5'),
            ],
            [
                'skill_name' => ('Firebase'),
            ],
            [
                'skill_name' => ('Git'),
            ],
            [
                'skill_name' => ('Docker'),
            ],
            [
                'skill_name' => ('AWS'),
            ],
        ];

        try {
            foreach ($skills as $skill) {
                DB::table('skills')->insert($skill);
            }
        } catch (\Throwable $th) {
        }
    }
}
