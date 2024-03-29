<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LmsSeeder extends Seeder
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
        factory(App\User::class, 10)->create();
        factory(App\Subject::class, 20)->create()->each(function ($subject) {
            $superTeacher = App\User::where('id', '1') -> first();
            $superStudent = App\User::where('id', '2') -> first();
            $subject -> creator() -> associate($superTeacher);
            $subject -> students() -> sync($superStudent);
            $subject -> save();

            factory(App\Task::class, 2)->create()->each(function ($task) use ($subject) {
                $task -> subject() -> associate($subject);
                $task -> save();
            });
        });
    }
}
