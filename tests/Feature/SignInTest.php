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
     * サインイン失敗
     * メール     不正
     * パスワード 正
     */
    public function unvalid_mail_can_login()
    {
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);
        $response = $this->post('auth/signin', [
            'mail' => 'miss@gmail.com',
            'password' => 'password'
        ]);
        $this->assertFalse(Auth::guard()->check(), 'password間違いですが認証されています');
        $response->assertSessionHas('errors');
        $response->assertSessionHasErrors(['signin_error' => 'サインインに失敗しました.']);
    }

    /**
     * @test
     * サインイン失敗
     * メール     不正
     * パスワード 不正
     */
    public function unvalid_mail_password_can_login()
    {
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);
        $response = $this->post('auth/signin', [
            'mail' => 'miss@gmail.com',
            'password' => 'miss'
        ]);
        $this->assertFalse(Auth::guard()->check(), 'password間違いですが認証されています');
        $response->assertSessionHas('errors');
        $response->assertSessionHasErrors(['signin_error' => 'サインインに失敗しました.']);
    }

    /**
     * @test
     * サインイン成功
     */
    public function valid_user_can_login()
    {
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);
        $this->assertFalse(Auth::guard()->check(), '認証処理前に認証されています');

        $response = $this->post('auth/signin', [
            'mail'    => $user->mail,
            'password' => 'password'
        ]);
        $this->assertTrue(Auth::guard()->check(), '認証処理後に認証されていません');
        $response->assertRedirect('/');
    }
}
