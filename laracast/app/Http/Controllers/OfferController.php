<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{

    public function indexAll()
    {
        $offers = Offer::with('alimento')->get();
        return view('offers.index', [
            'offers' => $offers
        ]);
    }

    public function showOffer($id)
    {
        $offer = Offer::find($id);
        return view('offers.show', [
            'offer' => $offer
        ]);
    }

    public function indexMy()
    {
        //Hay que identificar la sesion del usuario y devolverle sus ofertas
        $offers = Offer::where('user_num', '1')->with('alimento')->get();
        return view('offers.indexMy', [
            'offersMy' => $offers
        ]);
    }

    public function showCarrito()
    {
        return view('offers.carrito');
    }
}
