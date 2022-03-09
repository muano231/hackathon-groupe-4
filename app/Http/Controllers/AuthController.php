<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'birthday' => '',
            'size' => '',
            'weight' => ''
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);
        $user->assignRole('testeur');

        $accessToken = $user->createToken('authToken')->accessToken;
        $user->load('roles');
        $user->role = $user->roles->first()->name;
        unset ($user->roles);
        return response(['user' => $user, 'access_token' => $accessToken]);

    }


    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user= Auth::user();
        $user->load('roles');
        $user->role = $user->roles->first()->name;
        unset ($user->roles);
        return response(['user' =>$user, 'access_token' => $accessToken]);

    }

    public function verifyUser(Request $request, User $user)
    {
        $user->verified = true;
        $user->save();
        return response(['user' =>$user]);
    }
}
