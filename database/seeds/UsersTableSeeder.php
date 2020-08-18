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
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Syeda Fahima Jannath',
            'username' => 'fahima',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'John Doe',
            'username' => 'doe',
            'email' => 'doe@gmail.com',
            'password' => bcrypt('rootauthor'),
        ]);
    }
}
