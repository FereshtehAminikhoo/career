<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Full Time",
            "Part Time",
            "Remote",
            "Internship",
        ];

        foreach ($types as $type){
            DB::table('job_types')->updateOrInsert(
                ["name" => $type],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
