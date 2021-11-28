<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Vijay Chapagain',
            'email' => 'chapagainbijay596@gmail.com',
            'password' => Hash::make('yeshu4321'),
            'utype' => 'USR',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Tulsi Sir',
            'email' => 'tulsi1@gmail.com',
            'password' => Hash::make('dhukurpani4321'),
            'utype' => 'ADM',
            'role' => 'super',
            'created_at' => Carbon::now()
        ]);
    }
}
