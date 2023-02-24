<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->actingAs(User::factory()->create());
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_student()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
