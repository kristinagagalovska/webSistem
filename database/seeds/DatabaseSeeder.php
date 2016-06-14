<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'number' => '',
            'isadmin' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1'),
        ]);
    }
}
