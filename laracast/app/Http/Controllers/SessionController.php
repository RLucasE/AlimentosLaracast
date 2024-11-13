<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function login()
    {
        return view('sessions.login');
    }

    public function newSession(Request $request)
    {
        $atributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($atributes)) {
            throw ValidationException::withMessages([
                "email" => "Las credenciales no son validas"
            ]);
        }

        request()->session()->regenerate();

        return redirect('/offers');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
