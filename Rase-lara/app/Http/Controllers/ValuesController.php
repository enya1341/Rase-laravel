<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ValuesController extends Controller
{
    public function post($store_id, Request $request)
    {
        $now = Carbon::now();
        $store_id_int = (Integer) $store_id;
        $param = [
            "user_id" => $request->user_id,
            "store_id" => $store_id_int,
            "value" => $request->value,
            "created_at" => $now,
            "updated_at" => $now,
        ];
        $items = DB::table('values')->where('user_id', $request->user_id)->get();
        if($items){
            for ($i = 0; $i < count($items); $i++) {
                if ($items[$i]->store_id === $store_id_int) {
                    return response()->json([
                        'message' => '既にこの店舗の評価をしています',
                        'data' => $items,
                    ], 200);
                }
            }
        }
        

        DB::table('values')->insert($param);
        return response()->json([
            'message' => '評価をしました。×ボタンを押して予約を消しましょう',
            'data' => $param,
        ], 200);
    }

    public function get($store_id)
    {
        $items = DB::table('values')->where('store_id',$store_id)->get();
        return response()->json([
            'message' => 'Value got successfully',
            'data' => $items
        ], 200);
    }
}
