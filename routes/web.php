<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $response = Http::get('https://api.github.com/users/Jesse-js/repos');
    
    return view('repos', ['repos' => $response->json()]);
});



Route::get('/movies', function () {
    $response = Http::get('http://www.omdbapi.com/?apikey=['.env('OMDB_API_KEY').']&s=batman');
    dd($response->json());
    return view('movies', ['movies' => $response->json()]);
});