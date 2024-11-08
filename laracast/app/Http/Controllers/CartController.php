<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Offer;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //
    public function addoffercart(Request $request, $id)
    {
        $offer = Offer::find($id);



        $request->validate([
            'cant_offer' => 'required|numeric|between:1'  . ',' . $offer->cant
        ]);

        Cart::create([
            'offer_num' => $id, //falta validar que la oferta exista en nuestra base de datos
            'comp_num' => 1,
            'vend_num' => request('vend_num'),
            'cant' => request('cant_offer')
        ]);

        //falta cambiar el stock en la oferta

        return redirect('/offerCarrito');
    }
}
