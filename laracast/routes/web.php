<?php

use App\Http\Controllers\admController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Adress;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Models\User;

//No auntenticadas
Route::get('/', function () {
    return view('landing');
});
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [SessionController::class, 'login'])->name('login');
Route::post('/login', [SessionController::class, 'newSession']);
Route::post('/logout', [SessionController::class, 'destroy']);



//Auntenticadas

Route::middleware('auth') // Aplica el middleware de autenticación
    ->group(function () {
        // Este grupo aplica la autorización de "isAdm" para todas las rutas dentro de él
        Route::middleware('can:isAdm,App\Models\User')  // Usa el middleware 'can' con la habilidad 'isAdm'
            ->group(function () {
                Route::get('/foods', [AlimentoController::class, 'index']);
                Route::get('/foods/create', [AlimentoController::class, 'create']);
                Route::get('/foods/{id}', [AlimentoController::class, 'show']);
                Route::patch('/foods/{id}', [AlimentoController::class, 'update']);
                Route::delete('/foods/{id}', [AlimentoController::class, 'delete']);
                Route::get('/foods/{id}/edit', [AlimentoController::class, 'edit']);
                Route::post('/foods', [AlimentoController::class, 'store']);

                Route::get('/adresses', [admController::class, 'adresses']);
                Route::patch('/changeStatusAdress', [admController::class, 'changeStatusAdress']);
            });
    });



Route::middleware('auth') // Aplica el middleware de autenticación
    ->group(function () {
        // Este grupo aplica la autorización de "isAdm" para todas las rutas dentro de él
        Route::get('/offers', [OfferController::class, 'indexAll']);
        Route::get('/offers/{id}', [OfferController::class, 'showOffer']);
        Route::get('/newVend', [BusinessController::class, 'newVend']);
        Route::post('/newVend', [BusinessController::class, 'storeDirUser']);

        Route::middleware('can:isVend,App\Models\User')  // Usa el middleware 'can' con la habilidad 'isAdm'
            ->group(function () {
                Route::get('/offersMy', [OfferController::class, 'indexMy']);
                Route::get('/myOffer/{id}', [OfferController::class, 'showMyOffer']);

                Route::get('/myBusiness', [BusinessController::class, 'main']);
                Route::get('/createOffer', [BusinessController::class, 'create']);
                Route::post('/createOffer', [BusinessController::class, 'storeOffer']);
                Route::get('/clients', [BusinessController::class, 'clients']);
            });
    });



Route::middleware('auth') // Aplica el middleware de autenticación
    ->group(function () {
        // Este grupo aplica la autorización de "isAdm" para todas las rutas dentro de él
        Route::get('/offerCarrito', [CartController::class, 'showCarrito']);
        Route::post('/offers/{id}/addoffercart', [CartController::class, 'addoffercart']);
        Route::delete('/deleteDetail', [CartController::class, "deleteDetail"]);
    });

Route::middleware('auth') // Aplica el middleware de autenticación
    ->group(function () {
        // Este grupo aplica la autorización de "isAdm" para todas las rutas dentro de él
        Route::get('/myAdresses', [AdressController::class, 'myAdresses']);
        Route::get('/adress/create', [AdressController::class, 'create']);
    });
