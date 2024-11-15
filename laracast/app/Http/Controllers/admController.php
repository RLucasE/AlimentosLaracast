<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admController extends Controller
{
    //  
    public function adresses()
    {
        $adresses = Adress::orderBy('estado', 'desc')->get();
        return view('admin.adresses', [
            'adresses' => $adresses
        ]);
    }

    public function changeStatusAdress(Request $request)
    {
        //falta validar que exista la id
        $adress = Adress::find($request['adress_id']);

        if ($adress !== null) {

            if ($adress->estado === 'Rev') {
                $adress->update([
                    'estado' => 'Apr'
                ]);
                return redirect("/adresses");
            }

            if ($adress->estado === 'Apr') {
                $adress->update([
                    'estado' => 'Rev'
                ]);
                return redirect("/adresses");
            }
        }
    }
}
