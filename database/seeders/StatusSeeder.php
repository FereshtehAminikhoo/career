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
            "Resume Received",
            "Under Review",
            "Accepted",
            "Rejected",
        ];

        foreach ($statuses as $status) {
            DB::table('statuses')->updateOrInsert(
                ["name" => $status],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
