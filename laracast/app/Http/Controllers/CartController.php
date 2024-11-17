<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'comp_num' => Auth::user()->id,
            'vend_num' => request('vend_num'),
            'cant' => request('cant_offer')
        ]);

        //falta cambiar el stock en la oferta

        return redirect('/offerCarrito');
    }

    public function showCarrito()
    {
        $carritos = Cart::where('comp_num', Auth::user()->id)->get();

        $vendIds = Cart::where('comp_num', Auth::user()->id)
            ->distinct()
            ->pluck('vend_num');


        $vendedores = User::whereIn('id', $vendIds)
            ->distinct()  // Aseguramos que no se repitan vendedores
            ->get();

        return view('offers.carrito', [
            'detalleCarts' => $carritos,
            'vendedores' => $vendedores
        ]);
    }

    public function deleteDetail(Request $request)
    {
        //falta verificar que el detalle del carrito pertenezca al usuario autenticado

        $cartDetail = Cart::find($request['cart_id']);

        $cartDetail->delete();

        return redirect()->back();
    }
}
