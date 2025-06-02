<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TorneoTest extends TestCase
{
    use RefreshDatabase;

    public function test_torneo_can_be_created()
    {
        //Artisan::call('migrate:reset');
        Artisan::call('migrate');
        Artisan::call('db:seed');
        //Arrange
        $torneoData = [
            'nombre' => 'Test Torneo',
            'descripcion' => 'This is a test torneo.',
            'fecha_torneo' => '2023-10-01',
            'ubicacion' => 'Test Location',
            'tipo_torneo_id'=> 1
        ];
        //Act
        $response = $this->post('/newtorneo', $torneoData);
        //$response = $this->postJson('/newtorneo', $torneoData);

        //Assert
        $response->assertStatus(302);
        $this->assertDatabaseHas('torneos', $torneoData);
    }
}
