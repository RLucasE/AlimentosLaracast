<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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

        if (Auth::user()->user_type === 'Vend') {
            return redirect('/offersMy');
        }

        if (Auth::user()->user_type === 'Com') {
            return redirect('/offers');
        }

        if (Auth::user()->user_type === 'Adm') {
            return redirect('/foods');
        }

        return redirect('/offers');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
