<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\IncomingMail;
use App\Models\Job;
use App\Models\OutgoingMail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(1)->create();
        Employee::factory(10)->create();
        Job::factory(5)->create();
        // IncomingMail::factory(30)->create();
        // OutgoingMail::factory(15)->create();
    }
}
