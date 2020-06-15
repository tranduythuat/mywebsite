<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admincg@gmail.com',
            'password' => bcrypt('admin123456')
        ]);
    }
}
