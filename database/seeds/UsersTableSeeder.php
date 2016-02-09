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
            'name' => 'Derek Gillett',
            'email' => 'mail@computerwhiz.com.au',
            'password' => bcrypt('9E%QovBUBJCRSqcRvEZl8&TzjFx5E^'),
        ]);
    }
}
