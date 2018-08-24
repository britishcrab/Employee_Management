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
    public function unvalid_password_can_login()
    {
        /**
         * サインイン失敗
         * メール     正
         * パスワード 不正
         */
        // ユーザーを１つ作成
        $user = factory(Employee::class)->create(['password'  => Hash::make('password')]);
        // パスワード間違いでログインを実行
        $response = $this->post('auth/signin', [
            'mail' => $user->mail,
            'password' => 'miss'
        ]);
        // 認証されていない
        $this->assertFalse(Auth::guard()->check(), 'password間違いですが認証されています');
        // セッションにサインイン失敗のエラーが入っているか
        $response->assertSessionHas('errors');
        $response->assertSessionHasErrors(['signin_error' => 'サインインに失敗しました.']);

        /**
         * サインイン失敗
         * メール     不正
         * パスワード 正
         */
        // パスワード間違いでログインを実行
        $response = $this->post('auth/signin', [
            'mail' => 'miss@gmail.com',
            'password' => 'password'
        ]);
        // 認証されていない
        $this->assertFalse(Auth::guard()->check(), 'password間違いですが認証されています');
        // セッションにサインイン失敗のエラーが入っているか
        $response->assertSessionHas('errors');
        $response->assertSessionHasErrors(['signin_error' => 'サインインに失敗しました.']);
    }

    /**
     * @test
     * サインイン失敗
     * メール     不正
     * パスワード 正
     */
    public function unvalid_mail_can_login()
    {
        // ユーザーを１つ作成
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);

        // パスワード間違いでログインを実行
        $response = $this->post('auth/signin', [
            'mail' => 'miss@gmail.com',
            'password' => 'password'
        ]);

        // 認証されていない
        $this->assertFalse(Auth::guard()->check(), 'password間違いですが認証されています');

        // セッションにサインイン失敗のエラーが入っているか
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
        // ユーザーを１つ作成
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);

        // パスワード間違いでログインを実行
        $response = $this->post('auth/signin', [
            'mail' => 'miss@gmail.com',
            'password' => 'miss'
        ]);

        // 認証されていない
        $this->assertFalse(Auth::guard()->check(), 'password間違いですが認証されています');

        // セッションにサインイン失敗のエラーが入っているか
        $response->assertSessionHas('errors');
        $response->assertSessionHasErrors(['signin_error' => 'サインインに失敗しました.']);
    }

    /**
     * @test
     * サインイン成功
     */
    public function valid_user_can_login()
    {
        // ユーザーを１つ作成
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);

        // まだ、認証されていない
        $this->assertFalse(Auth::guard()->check(), '認証処理前に認証されています');

        // ログインを実行
        $response = $this->post('auth/signin', [
            'mail'    => $user->mail,
            'password' => 'password'
        ]);

        // 認証されている
        $this->assertTrue(Auth::guard()->check(), '認証処理後に認証されていません');

        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect('/');
    }
}
