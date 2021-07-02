<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'store_id' => 15,
            'day' => '2020-07-08 22:00:00',
            'number' => "2",
        ];
        DB::table('reservations')->insert($param);
    }
}
