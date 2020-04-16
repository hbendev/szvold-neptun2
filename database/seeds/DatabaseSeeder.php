<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'firstName' => 'teacher',
            'lastName' => 'super',
            'type' => 'teacher',
            'email' => 'teacher@neptun2.com',
            'password' => Hash::make('teacher'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'student',
            'lastName' => 'super',
            'type' => 'student',
            'email' => 'student@neptun2.com',
            'password' => Hash::make('student'),
        ]);
        factory(App\User::class, 50)->create();
        factory(App\Subject::class, 20)->create();
    }
}
