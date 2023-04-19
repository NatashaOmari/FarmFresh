<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    //
    public function register (Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        $user->save();
        $token=$user->createToken('registertoken')->plainTextToken;

        return response ([
            'user'=>$user,
            'token'=>$token
        ],201);

    }
    public function login(Request $request) {
        $request->validate([
            
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        //check email and password
        $user=User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password,$user->password)) {
            return response('invalid credentials',401);
        }
        $token=$user->createToken('logintoken')->plainTextToken;
        return response ([
            'user'=>$user,
            'token'=>$token
        ],201);
    }
    public function logout () {
        Auth::user()->tokens()->delete();
        return "user logged out";
    }
}
