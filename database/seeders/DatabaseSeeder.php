<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\SchoolClass;
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
        User::factory()->create([
            'id' => 1,
            'name' => 'Gabriele Dongiovanni',
            'email' => 'dongiovanni.gabriele@gmail.com',
            'password' => bcrypt('password'),
        ]);

        SchoolClass::factory()->create([
            'id' => 1,
            'name' => '1A',
        ]);

        Event::factory()->create([
            'title' => 'Test event',
            'start' => now(),
            'end' => now()->addHour(),
            'user_id' => 1,
            'class_id' => 1,
        ]);
    }
}
