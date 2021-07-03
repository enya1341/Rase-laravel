<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReservationsController extends Controller
{
    public function post($store_id, Request $request)
    {
        $now = Carbon::now();
        $param = [
            "user_id" => $request->user_id,
            "store_id" => $store_id,
            "day" => $request->day,
            "number" => $request->number,
            "created_at" => $now,
            "updated_at" => $now
        ];
        if($now < $request->day && 0 < $request->number){
            DB::table('Reservations')->insert($param);
            return response()->json([
                'message' => 'Reservation created successfully',
                'data' => $param,
                'Error' => null
            ], 200);
        }else if($now >= $request->day && 0 >= $request->number){
            return response()->json(['message' => '予約時間が既に過ぎているかつ予約人数が0人以下です', 'Error' => true ,'data' => 'dateもしくはtimeとnumber'], 200);
        }else if($now >= $request->day){
            return response()->json(['message' =>'予約時間が既に過ぎています', 'Error' =>true, 'data' => 'dateもしくはtime'], 200);
        }else if(0 >= $request->number){
            return response()->json(['message' => '予約人数が0人以下です', 'Error' =>true, 'data' => 'number'], 200);
        }
    }


    public function put($user_id, Request $request)
    {
        $now = Carbon::now();
        $param = [
            "user_id" => $user_id,
            "store_id" => $request->store_id,
            "day" => $request->day,
            "number" => $request->number,
            "created_at" => $now,
            "updated_at" => $now
        ];
        if ($now < $request->day && 0 < $request->number) {
            DB::table('Reservations')->where('id', $request->reservation_id)->where('user_id',$user_id)->insert($param);
            return response()->json([
                'message' => 'Reservation puted successfully',
                'data' => $param,
                'Error' => null
            ], 200);
        } else if ($now >= $request->day && 0 >= $request->number) {
            return response()->json(['message' => '予約時間が既に過ぎているかつ予約人数が0人以下です', 'Error' => true, 'data' => 'dateもしくはtimeとnumber'], 200);
        } else if ($now >= $request->day) {
            return response()->json(['message' => '予約時間が既に過ぎています', 'Error' => true, 'data' => 'dateもしくはtime'], 200);
        } else if (0 >= $request->number) {
            return response()->json(['message' => '予約人数が0人以下です', 'Error' => true, 'data' => 'number'], 200);
        }
    }

    public function get($user_id)
    {
        $count = 0;
        $params =array();
        $reservations_use_userid = DB::table('Reservations')->where('user_id', $user_id)->get();
        foreach($reservations_use_userid as $reservation){
            $datetime = preg_split('/["\s]/', $reservation->day);
            if($count==0){
                $params[$count] = [
                    'reservations'   => $reservation,
                    'date' => $datetime[0],
                    'time' => $datetime[1]
                ];
                $count++;
            }else{
                $params[$count] =[
                    'reservations' => $reservation,
                    'date' => $datetime[0],
                    'time' => $datetime[1]
                ];
                $count++;
            }

        }
        return response()->json([
            'message' => 'Reservation got successfully',
            'data' => $params
        ], 200);
    }

    public function delete($user_id, Request $request)
    {
        DB::table('Reservations')->where('id', $request->reservation_id)->where('user_id',$user_id)->delete();
        return response()->json([
            'message' => 'Reservation deleted successfully',
            'data' => $request->reservation_id
        ], 200);
    }
}
