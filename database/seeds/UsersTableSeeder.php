<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //setting dummy data for user authentication

        DB::table('users')->insert([
            'name' => 'Ruman Chowdhury Hridoy',
            'email' => 'ruman671989@gmail.com',
            'password' => bcrypt('123789')
        ]);
    }
}
