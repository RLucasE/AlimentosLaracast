<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BusinessController extends Controller
{
    //
    public function main()
    {
        $userAdress = Adress::where('user_num', Auth::user()->id)->get()->first();

        return view('business.myBusiness', [
            "userAdress" => $userAdress
        ]);
    }

    public function newVend()
    {
        return view('business.newVend');
    }

    public function storeDirUser(Request $request)
    {
        //Verificar que no tengo ya una direccion
        if (! Gate::allows('new-adress', Auth::user())) {
            abort(403);
        }

        //Velidar Datos

        Adress::create([
            'ciudad' => $request['Ciudad'],
            'cod_post' => $request['cod_post'],
            'calle' => $request['calle'],
            'numero' => $request['numero'],
            'piso' => $request['piso'],
            'estado' => 'Rev',
            'user_num' => Auth::user()->id
        ]);

        return redirect('/offers');
    }

    public function create()
    {
        return view('business.createOffer');
    }
}
