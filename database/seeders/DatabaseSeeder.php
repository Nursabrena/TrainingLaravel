<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([     //create user so data akan masuk dlm user
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Staff::create([
            'tag' => 'A12345',
            'user_id' => $user->id,         //data fake 
        ]);

        $this->call(ItemSeeder::class);
    }
}
