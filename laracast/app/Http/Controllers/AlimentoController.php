<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    //
    public function show(): View
    {
        $foods = Alimento::all();
        return view('foods.index', [
            'foods' => $foods
        ]);
    }
}
