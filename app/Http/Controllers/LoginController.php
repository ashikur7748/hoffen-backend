<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request){

        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username' => $username,'password' => $password])){
            return User::where('username',$username)->get();
        }else{
            return "Failed";
        }

    }


    public function Logout()
    {
        Auth::logout();
        return ['massage'=>'logout'];
    }
}
