<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_categories')->insert([
            [
                'task_id' => 1, // Reference to task_id from 'tasks' table
                'category_id' => 1, // Reference to category_id from 'categories' table
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 1, // Reference to task_id from 'tasks' table
                'category_id' => 2, // Reference to category_id from 'categories' table
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 2, // Reference to task_id from 'tasks' table
                'category_id' => 1, // Reference to category_id from 'categories' table
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
