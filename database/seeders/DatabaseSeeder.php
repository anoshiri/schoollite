<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $user = User::first();
        $user->update(['email' => 'admin@admin.com']);

        Teacher::factory(10)->create()->each(function ($teacher) {
            $teacher->grades()->saveMany(Grade::factory(3)->make());
        });

        // Student::factory(50)->create()->each(function ($student) {
        //     $student->arm()->attach(Arm::all()->random(3)->pluck('id')->toArray());
        // });
    }
}
