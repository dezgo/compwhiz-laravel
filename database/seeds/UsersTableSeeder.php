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
        DB::table('users')->insert([
            'name' => 'Joe Bloe',
            'email' => 'joe@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
