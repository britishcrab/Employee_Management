<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->delete();

        Employee::create([
            'last_name'  => 'nishida',
            'first_name' => 'yuya',
            'mail'       => 'kanri@gmail.com',
            'password'   => Hash::make("password"),
            'birthday'   => '1992/02/29',
            'role_id'    => 1,
        ]);

        $faker = \Faker\Factory::create('ja_JP');

        $role_id = ['1','2','3'];

        for ($i = 0; $i < 10; $i++) {
            Employee::create([
                'last_name'  =>$faker->lastName() ,
                'first_name' => $faker->firstName(),
                'mail'       => $faker->email(),
                'password'   => Hash::make("password"),
                'birthday'   => $faker->date($format='Y-m-d',$max='now'),
                'role_id'    => $faker->randomElement($role_id)
            ]);
        }
    }
}