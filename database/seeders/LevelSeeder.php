<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            "Intern",
            "Junior",
            "Midlevel",
            "Senior",
            "Intern To Junior",
            "Junior To Midlevel",
            "Midlevel To Senior",
        ];

        foreach ($levels as $level) {
            DB::table('job_levels')->updateOrInsert(
                ["name" => $level],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
