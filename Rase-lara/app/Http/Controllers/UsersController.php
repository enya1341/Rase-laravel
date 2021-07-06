<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function get(Request $request)
    {
        if ($request->has('email')) {
            $items = DB::table('users')->where('email', $request->email)->get();
            return response()->json([
                'message' => 'User got successfully',
                'data' => $items
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }

    public function adminUserGet($admin_password)
    {
        $item = DB::table('users')->where('email', "ryuna6337@gmail.com")->get();
        if(Hash::check($admin_password, $item->password)){
            $users = DB::table('users')->get();
            return response()->json([
                'message' => 'Admin user got successfully',
                'data' => $users
            ], 200);
        }else{
            return response()->json(['status' => 'not found'], 404);
        }

    }

    public function storeAdminGrant(Request $request)
    {
        $now = Carbon::now();
        $hashed_password = Hash::make($request->password);
        $param = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $hashed_password,
            "storeAdmin" => 1,
            "created_at" => $now,
            "updated_at" => $now,
        ];
        DB::table('users')->update($param);
        return response()->json([
            'message' => 'Storeadmin  granted successfully',
            'data' => $param,
        ], 200);
    }
    
}