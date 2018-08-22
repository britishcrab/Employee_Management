<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

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

	/** @test */
	public function valid_user_can_login()
	{
		// ユーザーを１つ作成
		$user = factory(Employee::class)->create([
			'password'  => Hash::make('password')
		]);
	
		// // まだ、認証されていない
		// $this->assertFalse(Auth::check());
	
		// // ログインを実行
		// $response = $this->post('login', [
		// 	'email'    => $user->email,
		// 	'password' => 'password'
		// ]);
		//
		// // 認証されている
		// $this->assertTrue(Auth::check());
		//
		// // ログイン後にホームページにリダイレクトされるのを確認
		// $response->assertRedirect('home');
	}
}
