<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory(10) // 10 users
        // ->has(Project::factory(3) // Each user gets 3 projects
        //     ->has(Task::factory(5)) // Each project gets 5 tasks
        // )
        // ->create();

        $totalUsers = 1_000;
        $chunkSize = 100;
        
        for ($i = 0; $i < $totalUsers; $i += $chunkSize) {
            User::factory($chunkSize)
                ->has(
                    Project::factory(10) // Each user gets 10 projects
                        ->has(
                            Task::factory(20) // Each project gets 20 tasks
                        )
                )
                ->create();
        
            echo "Created $chunkSize users with projects and tasks.\n";
        }
        
    }
}
