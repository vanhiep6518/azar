<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'azar.admin@yopmail.com',
                'password' => bcrypt('admin123'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'azar.user@yopmail.com',
                'password' => bcrypt('user123'),
            ]
        ]);
    }
}
