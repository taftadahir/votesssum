<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/votes', function (Request $request) {
    // Stoquer l'email
    // return $request['email'];
    return view('votes',['email'=>$request['email']]);
})->name("votes");
Route::get('/results', function () {
    // Stoquer l'email
    return view('results');
})->name("results");

Route::post('/updateVote', function (Request $request) {
    return $request;
})->name("update");
