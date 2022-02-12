<?php

namespace Database\Seeders;

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
        $param = [
            'name' => 'yusuke',
            'email' => 'yusuke@gmail.com',
            'password' => '1111'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'sachiko',
            'email' => 'sachiko@gmail.com',
            'password' => '2222'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'kenta',
            'email' => 'kenta@gmail.com',
            'password' => '3333'
        ];
        DB::table('users')->insert($param);
    }
}
