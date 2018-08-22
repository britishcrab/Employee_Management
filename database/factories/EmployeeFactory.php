<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

    $factory->define(\App\Models\Employee::class, function (Faker $faker) {
        static $password;

        return [
			'mail'          => $faker->unique()->safeEmail,
			'password'       => $password ?: $password = bcrypt('password'),
			'last_name'           => $faker->lastname,
			'first_name'           => $faker->firstname,
			'birthday'           => $faker->dateTimeBetween('-80 years', '-20years')->format('Y/m/d'),
			'role_id'           => 1,
			'remember_token' => str_random(100),
		];
	});
