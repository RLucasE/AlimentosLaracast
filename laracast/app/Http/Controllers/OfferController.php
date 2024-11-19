<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{

    public function indexAll()
    {
        $offers = Offer::with('alimento')
            ->where('estado', 'act')
            ->get();
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

        $offers = Offer::where('user_num', Auth::user()->id)->with('alimento')->get();
        return view('offers.indexMy', [
            'offersMy' => $offers
        ]);
    }

    public function showMyOffer($id)
    {
        //Hay que identificar la sesion del usuario y devolverle sus ofertas

        return view('offers.showMyOffer');
    }
}
