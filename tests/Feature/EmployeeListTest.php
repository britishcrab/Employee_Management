<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeListTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function user_can_view_signin()
    {
        $role_names = ['管理', '役員', '社員'];
        foreach ($role_names as $role_name)
        {
            factory(Role::class)->create([
                'role_name'  => $role_name
            ]);
        }

        $user = factory(Employee::class)->create([
            'password'  => Hash::make('password')
        ]);
        $this->post('signin', [
            'mail' => $user->mail,
            'password' => 'password'
        ]);
        $response = $this->get(route('employee.list'));
        $response->assertStatus(200);
    }
}
