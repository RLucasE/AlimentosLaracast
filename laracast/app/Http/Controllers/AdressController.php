<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdressController extends Controller
{
    public function myAdresses()
    {
        //Ver que usuario pidio esta oferta ejemplo el usuario 1

        return view('adresses.index');
    }

    public function create()
    {
        //Ver que usua  rio pidio esta oferta ejemplo el usuario 
        return view('adresses.create');
    }
}
