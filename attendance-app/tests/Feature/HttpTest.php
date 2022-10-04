<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{
    public function test_get_all()
    {
        $response = $this->get('/api/students');
        $response->assertStatus(200);
    }

    public function test_get_one()
    {
        $response = $this->get('/api/student/g56020');
        $response->assertStatus(200);
    }

    public function test_post()
    {
        $response = $this->postJson(
            '/api/student',
            [
                'matricule' => 'g56020',
                'prenom' => 'Dylan',
                'nom' => 'Fandel',
                'groupe' => 'e12',
                'presence' => true
            ]
        );

        $response
            ->assertStatus(201);
    }

    public function test_patch()
    {
        $response = $this->withoutMiddleware()->patch(
            '/api/student/g12345',
            [
                'matricule' => 'g12345',
                'prenom' => 'Dylan',
                'nom' => 'Fandel',
                'groupe' => 'e12',
                'presence' => false
            ]
        );
        $response
            ->assertStatus(201);
    }


    public function test_delete()
    {
        $response = $this->withoutMiddleware()->delete(
            '/api/student/g12342'
        );

        $response->assertStatus(204);
    }
}
