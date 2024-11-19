<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\AlimentoState;
use App\Models\AlimentoType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    //
    public function index(): View
    {
        $foods = Alimento::all();
        return view('foods.index', [
            'foods' => $foods
        ]);
    }

    public function create(): View
    {
        $states = AlimentoState::all();
        $alimentoTypes = AlimentoType::all();
        return view('foods.create', [
            'states' => $states,
            'alimentoTypes' => $alimentoTypes
        ]);
    }

    public function store(Request $request)
    {

        //Validacion
        $min = 1; //los id empiezan de las tablas empiezan con 1
        $maxState = AlimentoState::max('id');
        $maxType = AlimentoType::max('id');



        $request->validate([
            'name' => 'unique:App\Models\Alimento,name',
            'state' => 'required|numeric|between:' . $min . ',' . $maxState,
            'alimento_type' => 'required|numeric|between: ' . $min . ',' . $maxType
        ]);







        Alimento::create([
            'name' => request('name'),
            'alimento_state' => request('state'),
            'alimento_type' => request('alimento_type')
        ]);

        return redirect('/foods');
    }

    public function show(Request $request, string $id)
    {

        $food = Alimento::find($id);
        // Update the user...

        return view('foods.show', ['food' => $food]);
    }

    public function edit(Request $request, string $id)
    {
        $states = AlimentoState::all();
        $alimentoTypes = AlimentoType::all();
        $food = Alimento::find($id);
        // Update the user...

        return view('foods.edit', [
            'food' => $food,
            'states' => $states,
            'alimentoTypes' => $alimentoTypes
        ]);
    }

    public function update(Request $request, string $id)
    {
        $min = 1; //los id empiezan de las tablas empiezan con 1
        $maxState = AlimentoState::max('id');
        $maxType = AlimentoType::max('id');
        //la id que recibe pretende que el usario que esta haciendo la peticion tiene acceso a poder modificar cualquier alimento
        $alimento = Alimento::find($request['id']);

        $request->validate([
            'name' => 'unique:App\Models\Alimento,name,' . $alimento->id,
            'state' => 'required|numeric|between:' . $min . ',' . $maxState,
            'alimento_type' => 'required|numeric|between: ' . $min . ',' . $maxType
        ]);
        // Update the user...

        $alimento->update([
            'name' => $request['name'],
            'alimento_type' => $request['alimento_type'],
            'alimento_state' => $request['state']
        ]);



        return redirect('/foods/' . $alimento->id);
    }

    public function storeAlimVen(Request $request)
    {

        Alimento::create([
            'name' => request('name'),
            'alimento_state' => 1,
            'alimento_type' => request('alimento_type')
        ]);

        return redirect('/offersMy');
    }

    public function delete(Request $request, string $id)
    {
        $alimento = Alimento::find($id);
        $alimento->delete();

        return redirect('/foods');
    }
}
