<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Management & Leadership",
            "Operations",
            "Technical & Engineering",
            "Support & Customer Service",
            "Sales & Marketing",
            "HR & Administration",
            "Finance & Accounting",
            "Research & Development",
            "Legal & Compliance",
            "General Services",
        ];

        foreach ($categories as $category){
            DB::table('job_categories')->updateOrInsert(
                ["name" => $category],
                ["created_at" => now(), "updated_at" => now()],
            );
        }
    }
}
