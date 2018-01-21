<?php

namespace Tests\Unit;

use App\Tw;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UserTest extends TestCase
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
    public function testRegister()
    {
        $response=$this->actingAs($user = factory(User::class)->create())->post('register');
        $response->assertRedirect('home');
    }

    public function testUploadIcon()
    {
        $request= new Request();
        $request->file('avatar.jpg');
        $response = $this->post('/user/icon',  [$request]);

        // Assert the file was stored...
        $response->assertRedirect('home');


    }
    public function testViewIcon()
    {
        $response = $this->get('/user/icon');

        // Assert the file was stored...
        $response->assertViewIs('auth.icon');


    }
    public function testSaveTw(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/tw/create/',['id_user'=>1,'text'=>'teste']);
        $response->assertStatus(302);
    }

}
