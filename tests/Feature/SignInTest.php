<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignInTest extends TestCase
{
    /**
     * @test
     * サインイン画面の表示
     */
    public function user_can_view_signin()
    {
        $response = $this->get(route('signin'));

        $response->assertStatus(200);
    }
}
