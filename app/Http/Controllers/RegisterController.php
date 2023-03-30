<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function Register(Request $request){

        $userStore = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password)
        ]);

        if ($userStore){
            return "success";
        }else{
            return "failed";
        }
    }
}
