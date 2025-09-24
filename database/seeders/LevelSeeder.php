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
            "intern",
            "junior",
            "midlevel",
            "senior",
            "intern to junior",
            "junior to midlevel",
            "midlevel to senior",
        ];

        foreach ($levels as $level) {
            DB::table('levels')->updateOrInsert(
                ["name" => $level],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
