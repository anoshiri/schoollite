<?php

use App\Models\User;
use App\Models\Student;
use function Pest\Livewire\livewire;
use App\Filament\Resources\StudentResource;
use App\Filament\Resources\TeacherResource;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});


it('has student page', function () {

    $user = User::first();
    actingAs($user)->get(StudentResource::getUrl('index'))->assertSuccessful();
});



 
it('can list students', function () {
    $students = Student::factory()->count(10)->create();
 
    livewire(PostResource\Pages\ListStudents::class)
        ->assertCanSeeTableRecords($students);
});


it('can render page', function () {
    $this->get(TeacherResource::getUrl('create'))->assertSuccessful();
});


