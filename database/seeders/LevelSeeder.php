<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            // [
            //     'level' => ('-1'),
            //     'desc' => ('Chưa biết, không có nhu cầu học'),
            //     'color' => ('#A59DBD')
            // ],
            [
                'level' => ('0'),
                'desc' => ('Chưa biết, có thời gian sẽ học'),
                'color' => ('#8778AF')
            ],
            [
                'level' => ('1'),
                'desc' => ('Cần đào tạo thêm mới có thể làm được'),
                'color' => ('#EA9999')
            ],
            [
                'level' => ('2'),
                'desc' => ('Có thể làm những task đơn giản'),
                'color' => ('#E06666')
            ],
            [
                'level' => ('3'),
                'desc' => ('Có thể làm ngay được'),
                'color' => ('#B6D7A8')
            ],
            [
                'level' => ('4'),
                'desc' => ('Có kinh nghiệm'),
                'color' => ('#7FB468')
            ],
            [
                'level' => ('5'),
                'desc' => ('Expert'),
                'color' => ('#83D1F4')
            ],
        ];

        try {
            foreach ($levels as $level) {
                DB::table('levels')->insert($level);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
