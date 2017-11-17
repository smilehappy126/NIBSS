<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate;

        User::create([
            'username' => 'admin',
            'email'    => 'admin@cc.ncu.edu.tw',
            'password' => Hash::make('root'),
        ]};
}
