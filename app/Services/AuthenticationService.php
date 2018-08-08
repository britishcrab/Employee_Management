<?php
namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    protected $employees;

    function __construct()
    {
        $this->employees = new Employee;
    }

    public function Signin($input_data)
    {
        $mail = $input_data['mail'];
        $password = $input_data['password'];
        if($this->employees->where('mail', $mail)->exists())
        {
            $employee = Employee::where('mail', $mail)->first();
            $id = $employee->id;
            $hashedPassword = $employee->password;
            if (Hash::check($password, $hashedPassword))
            {
                return $id;
            }else
            {
                return false;
            }
        }else
        {
            false;
        }
    }
}