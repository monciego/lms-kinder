<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

          $teacher = \App\Models\User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('teacher@gmail.com'),
        ]);

        $teacher->attachRole('teacher');

          $student = \App\Models\User::factory()->create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student@gmail.com'),
        ]);

        $student->attachRole('student');

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
