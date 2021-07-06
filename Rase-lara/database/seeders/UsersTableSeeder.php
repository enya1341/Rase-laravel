<?php

namespace Database\Seeders;

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
        $param = [
            'name' => 'ENya3(admin)',
            'email' => 'ryuna6337@gmail.com',
            'password' => Hash::make('test'),
            'admin' => 1,
            "storeAdmin" => 1
        ];
        DB::table('users')->insert($param);
    }
}
