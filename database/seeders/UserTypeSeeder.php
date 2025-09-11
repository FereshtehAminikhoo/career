<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_types = [
            "manager",
            "hiring_expert",
            "technical_expert",
        ];

        foreach ($user_types as $user_type) {
            DB::table('statuses')->updateOrInsert(
                ["name" => $user_type],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
