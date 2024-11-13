<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('sessions.register');
    }

    public function store(Request $request)
    {


        $request->validate([
            'user_name' => ['required'],
            'user_lastname' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request['user_lasname'] . $request['user_name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'user_type' => 'Com'
        ]);

        Auth::login($user);

        return redirect('/offers');
    }
}
