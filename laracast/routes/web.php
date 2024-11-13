<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Adress;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;


Route::get('/', function () {
    return view('landing');
});

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'login']);
Route::post('/login', [SessionController::class, 'newSession']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(8);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/foods', [AlimentoController::class, 'index']);
Route::get('/foods/create', [AlimentoController::class, 'create']);
Route::get('/foods/{id}', [AlimentoController::class, 'show']);
Route::patch('/foods/{id}', [AlimentoController::class, 'update']);
Route::delete('/foods/{id}', [AlimentoController::class, 'delete']);
Route::get('/foods/{id}/edit', [AlimentoController::class, 'edit']);
Route::post('/foods', [AlimentoController::class, 'store']);

Route::get('/offers', [OfferController::class, 'indexAll']);
Route::get('/offersMy', [OfferController::class, 'indexMy']);
Route::get('/offers/{id}', [OfferController::class, 'showOffer']);
Route::get('/myOffer/{id}', [OfferController::class, 'showMyOffer']);

Route::get('/offerCarrito', [CartController::class, 'showCarrito']);
Route::post('/offers/{id}/addoffercart', [CartController::class, 'addoffercart']);


Route::get('/myAdresses', [AdressController::class, 'myAdresses']);
Route::get('/adress/create', [AdressController::class, 'create']);


Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {

    request()->validate([
        'title' => 'required|min:5',
        'salary' => 'required|numeric'
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => 'required|min:5',
        'salary' => 'required|numeric'
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});
