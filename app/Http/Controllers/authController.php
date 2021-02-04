<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //
    public function out(Request $req){
        $req->user()->token()->revoke();
return 'logged out succesfully';
    }
    public function get(Request $req){
        return 'ss';
            }
        public function signup(Request $req){
        // echo 'sign up';
        $req->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed',
        ]);
       $user= User::create([
            "name"=>$req->name,
            // "password"=>$req->bcrypt($req->password),
            'password' => Hash::make($req['password']),

            "email"=>$req->email,
        ]);
        return response()->json([
            "message"=>'user registerd successfully',"statusCode"=>201
        ]);
    }
    public function login(Request $req){
        $req->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);
        $user_data=request(['email','password']);
        if(!Auth::attempt($user_data)){
            return 'false';
        }

        $user=$req->user();
        
        $token = $user->createToken("Access Token");
        $user->access_token=$token->accessToken;
        return response()->json([
            'user'=>$user
        ]);
        

    }
}
