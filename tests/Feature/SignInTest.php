<?php

namespace Tests\Feature;

use Exception;
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

    /**
     * @test
     */
	public function valid_user_can_login()
	{
		// ユーザーを１つ作成
		$user = factory(Employee::class)->create([
			'password'  => Hash::make('password')
		]);
	
		// まだ、認証されていない
		$this->assertFalse(Auth::guard()->check());
	
		// ログインを実行
		$response = $this->post('auth/signin', [
			'mail'    => $user->mail,
			'password' => 'password'
		]);

		// 認証されている
		$this->assertTrue(Auth::guard()->check());
		
		// ログイン後にホームページにリダイレクトされるのを確認
		$response->assertRedirect('/');
	}

    /**
     * @test
     */
    public function unvalid_user_can_login()
    {
        // ユーザーを１つ作成
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);

        // パスワード間違いでログインを実行
        $response = $this->post('auth/signin', [
            'mail'    => $user->mail,
            'password' => 'miss'
        ]);

        // 認証されていない
        $this->assertFalse(Auth::guard()->check());
        
        // ログイン失敗でサインイン画面にリダイレクト
        $response->assertRedirect('auth/signin');
    }
}
