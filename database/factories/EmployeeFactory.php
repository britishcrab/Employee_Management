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

    $factory->define(App\User::class, function (Faker $faker) {
        static $password;

        return [
            'mail'          => $faker->unique()->safeEmail, // 複数レコード作成時には重複しないＥメールを生成
            'password'       => $password ?: $password = bcrypt('password'),　// 複数レコード作成時には同じパスワードを生成
			'last_name'           => $faker->lastname,
			'first_name'           => $faker->firstname,
			'remember_token' => str_random(100),　//ランダム値
		];
	});
