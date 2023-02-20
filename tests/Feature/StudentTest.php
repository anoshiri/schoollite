<?php

use App\Models\User;
use App\Models\Student;
use App\Filament\Resources\StudentResource;



beforeEach(function () {
    $this->actingAs(
        User::first()
    );
});
 

it('can render page', function () {
    $this->get(StudentResource::getUrl('index'))->assertSuccessful();
});


it('can list students', function () {
    $students = Student::factory()->count(10)->create();
 
    livewire(StudentResource\Pages\ListStudents::class)
        ->assertCanSeeTableRecords($students);
});


