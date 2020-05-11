<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Admin',
            'email' =>'email@gmail.net',
            'password'=>bcrypt('3000'),
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' =>'email@gmail.net',
        //     'password'=>bycryt('3000'),
        // ]);
    }
}
