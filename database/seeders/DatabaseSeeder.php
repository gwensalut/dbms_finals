<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
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

        User::factory()->create([
            'username' => 'admin',
            'password' => 'root',
        ]);

        Event::factory()->create([
            'event_name' => 'Maligo para maging mabango',
            'event_by' => 'DCL Admins',
            'venue' => 'BPC',
            'participants' => ['kalbo', 'ka', 'tanginamo'],
            'starting_on' => '2024-09-26',
        ]);
    }
}
