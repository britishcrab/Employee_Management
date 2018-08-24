<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignoutTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * @test
     * サインアウト画面表示
     */
    public function user_can_view_signin()
    {
        $response = $this->get(route('signout'));
        $response->assertStatus(200);
    }

    /**
     * @test
     * サインアウト
     */
    public function signout()
    {
        $user = factory(Employee::class)->create();

        $this->actingAs($user)
            ->withSession([
                '_token' => 'g1gwswr1FQeaCQNC80NbdHbRFRg1ixI8X3tkZClE',
                'login__59ba36addc2b2f9401580f014c7f58ea4e30989d' => $user->id
            ])->get('/');

        $this->assertTrue(Auth::guard()->check(), 'ログイン失敗');

        $this->get(route('signout'));

        $response = $this->post('signout');
        $response->assertRedirect('signin');
    }
    /**
     * @test
     * キャンセル押下
     */
    public function cancelPush()
    {
        $user = factory(Employee::class)->create();

        $this->actingAs($user)->get(route('top'));

        $this->assertTrue(Auth::guard()->check(), 'ログイン失敗');

        $this->get(route('signout'));

        $response = $this->get(URL::previous());
        $response->assertViewIs('top');
    }
}
