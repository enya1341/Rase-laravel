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

    public function adminuser($email,Request $request)
    {
        $password = $request->input('password');
        $item = DB::table('users')->where('email', "ryuna6337@gmail.com")->first();
        
        if(Hash::check($password, $item->password)){
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
        $param = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "storeAdmin" => 1,
            "created_at" => $now,
            "updated_at" => $now,
        ];
        DB::table('users')->where('email', $request->email)->update($param);
        return response()->json([
            'message' => 'Storeadmin granted successfully',
            'data' => $param,
        ], 200);
    }

    public function storeAdminDelete(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "storeAdmin" => 0,
            "created_at" => $now,
            "updated_at" => $now,
        ];
        DB::table('users')->where('email', $request->email)->update($param);
        return response()->json([
            'message' => 'Storeadmin deleted successfully',
            'data' => $param,
        ], 200);
    }
    
}