<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function post(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $items = DB::table('users')->where('email', $email)->first();
        if ($items && Hash::check($password, $items->password)) {
            return response()->json(['auth' => true], 200);
        } else {
            return response()->json(['auth' => false ,$items,$email,$password], 200) ;
        }
    }
}
