<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'is_admin' => '0',
            'phone_number' => '01224545679',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'phone_number' => '01224545678',
            'password' => bcrypt('123456'),
        ]);
    }
}
