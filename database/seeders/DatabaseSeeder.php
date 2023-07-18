<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Arm;
use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SessionTerm;
use App\Models\SchoolSession;
use App\Models\SubjectCategory;
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
        // make and modify users
        User::factory(10)->create();


        $user = User::first();
        $user->update(['email' => 'chuks@ecleaps.com']);

        // make teachers
        Teacher::factory(10)->create();


        // make grades and arms
        Grade::factory(6)->has(Arm::factory(3))->create();


        // make school sessions and terms
        SchoolSession::factory(6)->has(SessionTerm::factory(3))->create();


        SubjectCategory::factory(10)->create();
        Subject::factory(20)->create();


        Student::factory(75)->create();
    }
}
