<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Monika',
            'email' => 'amonika8754@gmail.com',
        ]);
        // \App\Models\Job::factory(100)->create();
        User::factory(100)->create();

        $users = User::all()->shuffle();
        for($i = 0; $i < 20; $i++){
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = \App\Models\Employer::all();

        for($i = 0;$i < 100; $i++){
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
        // User::factory(10)->create();
    }
}
