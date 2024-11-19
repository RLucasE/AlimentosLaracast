<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Adress;
use App\Models\Alimento;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Dflydev\DotAccessData\Exception\DataException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
        $alimentos = Alimento::all();
        return view('business.createOffer', [
            "alimentos" => $alimentos
        ]);
    }

    public function storeOffer(Request $request)
    {
        dd($request);
    }

    public function clients()
    {
        $carritos = Cart::where('vend_num', Auth::user()->id)
            ->with('offer.alimento')
            ->get();


        $compIds = Cart::where('vend_num', Auth::user()->id)
            ->distinct()
            ->pluck('comp_num');

        $compradores = User::whereIn('id', $compIds)
            ->distinct()  // Aseguramos que no se repitan vendedores
            ->get();

        return view('business.clients', [
            'compradores' => $compradores,
            'carritos' => $carritos
        ]);
    }

    public function confirm(Request $request)
    {
        $carritoIds = $request->input('carrito_ids');
        $carritos = Cart::whereIn('id', $carritoIds)->get();

        $todosActivos = $carritos->every(function ($carrito) {
            return $carrito->estado === 'ready';
        });

        if ($todosActivos) {
            $order = Order::create([
                'vend_num' => $carritos[0]->vend_num,
                'comp_num' => $carritos[0]->comp_num
            ]);
            foreach ($carritos as $carrito) {

                $ord = OrderDetail::create([
                    'order' => $order->id,
                    'offer' => $carrito->offer_num,
                    'cant' => $carrito->cant,
                    'price' => $carrito->offer->price
                ]);

                $offer = Offer::find($carrito->offer_num);
                if ($offer->cant <= 0) {
                    $offer->update([
                        'estado' => 'cerr'
                    ]);
                }

                $carrito->delete();
            }

            $orderDetails = OrderDetail::where('order', $order->id)->get();

            // Mail::to('lucascabjnmro2@gmail.com')
            //     ->send(new OrderCreated($order, $orderDetails));


            return redirect("/clients");
        } else {
            // Redirigir de nuevo a la vista
            return back()->withErrors([
                'error' => 'No hay suficiente stock o la offerta caducó',
                'comp_num' => $carritos[0]->comp_num
            ]);
        }
    }
}
