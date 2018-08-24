<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * @test
     */
    public function showTop()
    {
        $response = $this->get(route('top'));
        $response->assertViewIs('top');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function AdminPress()
    {
        $response = $this->get(route('admin.get.home'));
        $response->assertViewIs('admin_employee.home');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function ReportPress()
    {
        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);
        $response = $this->post('signin', [
            'mail' => $user->mail,
            'password' => 'password'
        ]);
        $response = $this->get(route('report.home.get'));
        $response->assertViewIs('report.home');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function SignoutPress()
    {
        $response = $this->get(route('signout'));
        $response->assertViewIs('auth.signout');
        $response->assertStatus(200);
    }
}
