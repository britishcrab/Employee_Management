<?php
namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    protected $employee;

    function __construct()
    {
        $this->employee = new Employee;
    }

    public function Signin($input_data)
    {
        $mail = $input_data['mail'];
        $password = $input_data['password'];
        $employee = Employee::where('mail', $mail)->first();
        $hashedPassword = $employee->password;
        if (Hash::check($password, $hashedPassword))
        {
            return true;
        }else
        {
            return false;
        }
    }
}