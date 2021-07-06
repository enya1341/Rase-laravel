<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class StoresController extends Controller
{

    public function storeget()
    {
            $items = DB::table('stores')->get();
            Log::debug($items);
            return response()->json([
                'message' => 'Store got successfully',
                'data' => $items
            ], 200);


    }

    public function storedata($store_id)
    {
            $items = DB::table('stores')->where('id', $store_id)->get();
            return response()->json([
                'message' => 'Storedata got successfully',
                'data' => $items
            ], 200);
    }

    public function post(Request $request)
    {
        $param = [
            'name' => $request->name,
            'region' => $request->region,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'image' => '0.jpg'
        ];
        DB::table('users')->insert($param);
        $storedata = DB::table('stores')->where('name', $request->name)->where('overview', $request->overview)->get();
        return response()->json([
            'message' => 'Storeadmin store created successfully',
            'data' => $storedata,
        ], 200);
    }

    public function put($store_id,Request $request)
    {
        $param = [
            'name' => $request->name,
            'region' => $request->region,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'image' => $request->image
        ];
        DB::table('stores')->where('id', $store_id)->update($param);
        return response()->json([
            'message' => 'Storeadmin store updated successfully',
            'data' => $param,
        ], 200);
    }

}
