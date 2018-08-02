<?php

use Illuminate\Database\Seeder;

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

        $faker = \Faker\Factory::create('ja_JP');

        $role_id = ['1','2','3'];

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Employee::create([
                'last_name' =>$faker->lastName() ,
                'first_name' => $faker->firstName(),
                'mail' => $faker->email(),
                'password' => "password.$i",
                'birthday' => $faker->date($format='Y-m-d',$max='now'),
                'role_id' => $faker->randomElement($role_id)
            ]);
        }
    }
}