<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

}
