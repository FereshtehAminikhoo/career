<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            "resume_received",
            "under_review",
            "accepted",
            "rejected",
        ];

        foreach ($statuses as $status) {
            DB::table('statuses')->updateOrInsert(
                ["name" => $status],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
