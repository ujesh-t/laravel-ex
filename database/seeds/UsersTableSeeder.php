<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['username'=>'ujesh','name' => 'Ujesh','email' => 'ujesh.t@gmail.com', 'password' => 'qwerty','bio'=>'Awesome Guy']);
    }
}
