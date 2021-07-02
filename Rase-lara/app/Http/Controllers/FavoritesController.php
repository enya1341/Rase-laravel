<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FavoritesController extends Controller
{
    public function post($user_id,Request $request)
    {
        $COMMENT = "Favorites created successfully";
        $now = Carbon::now();
        $param = [
            "user_id"  =>  $user_id,
            "store_id"  =>  $request->store_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('favorites')->insert($param);
        return response()->json([
            'message' => $COMMENT,
            'data' => $param
        ], 200);
    }
    public function get($user_id)
    {
        $items = DB::table('Favorites')->where('user_id', $user_id)->get();
        return response()->json([
            'message' => 'Favorites got successfully',
            'data' => $items
        ], 200);
    }
    public function delete($user_id, Request $request)
    {
        $COMMENT = "Favorites deleted successfully";
        DB::table('favorites')->where('store_id', $request->store_id)->where('user_id',$user_id)->delete();
        return response()->json([
            'message' => $COMMENT,
        ], 200);
    }
}
