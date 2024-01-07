<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'task_name' => 'Complete Project A',
                'description' => 'Finish all the tasks related to Project A',
                'due_date' => '2024-01-15',
                'status' => 'pending',
                'priority' => 'medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_name' => 'Complete Project B',
                'description' => 'Finish all the tasks related to Project B',
                'due_date' => '2024-01-15',
                'status' => 'pending',
                'priority' => 'low',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'task_name' => 'Complete Project C',
                'description' => 'Finish all the tasks related to Project C',
                'due_date' => '2024-01-15',
                'status' => 'pending',
                'priority' => 'high',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
