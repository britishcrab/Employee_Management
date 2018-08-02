<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            ['role_name' => '管理'],
            ['role_name' => '役員'],
            ['role_name' => '社員'],
        ]);
        //
    }
}
