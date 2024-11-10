<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Offer;
use Illuminate\Http\Request;
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
            'comp_num' => 1,
            'vend_num' => request('vend_num'),
            'cant' => request('cant_offer')
        ]);

        //falta cambiar el stock en la oferta

        return redirect('/offerCarrito');
    }

    public function showCarrito()
    {
        //Ver que usuario pidio esta oferta ejemplo el usuario 1
        $carritoDetails = Cart::where('comp_num', 1)->with('offer')->get();



        $carritoDetailsGrouped = DB::table('carts')
            ->join('offers', 'carts.offer_num', '=', 'offers.id') // Relaciona 'carts' con 'offers'
            ->select('carts.vend_num', DB::raw('count(carts.offer_num) as offer_count')) // Cuenta las ofertas por vendedor
            ->where('carts.comp_num', 1) // Filtra por 'comp_num'
            ->groupBy('carts.vend_num') // Agrupa por 'ven_num'
            ->get();

        return view('offers.carrito', [
            'detalleCarts' => $carritoDetails,
            'carritoDetailsGrouped' => $carritoDetailsGrouped
        ]);
    }
}
