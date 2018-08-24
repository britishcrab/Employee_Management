<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignoutTest extends TestCase
{
    /**
     * @test
     * サインアウト画面の表示
     */
    public function user_can_view_signin()
    {
        $response = $this->get(route('signout'));
        $response->assertStatus(200);
    }
}
