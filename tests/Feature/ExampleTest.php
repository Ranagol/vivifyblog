<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    
    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);//when everything is OK and working 200 is the expected answer
    }

    public function testNonExistentUrl()
    {
        $response = $this->get('/nonexistent');

        $response->assertStatus(404);//when there is no url, so we would expect 404 answer
    }
/*
    public function testApplication()//authentication check risky but working
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/');
    }*/



    
   


}
