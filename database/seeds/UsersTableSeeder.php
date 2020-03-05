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
            'nome' => 'Gabriel',
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'privilege' => 'admin'
        ]);
    }
}
