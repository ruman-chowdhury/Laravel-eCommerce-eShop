<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert dummy data into admins table

        DB::table('admins')->insert([
           'name' => 'Admin Ruman',
            'email' => 'rumanc345@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01684820345'
        ]);


    }
}
