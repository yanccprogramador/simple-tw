<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogued()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('home');
    }
    public function testGuest()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

}
