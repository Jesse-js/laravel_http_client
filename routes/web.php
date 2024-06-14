<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $response = Http::get('https://api.github.com/users/Jesse-js/repos');
    $response = Http::github()->get('Jesse-js/repos');
    if ($response->failed()) {
        abort($response->status(), $response->json());
    }
    return view('repos', ['repos' => $response->json()]);
});



Route::get('/movies', function () {
    // $response = Http::get('http://www.omdbapi.com', [
    //     'apikey' => env('OMDB_API_KEY'),
    //     's' => 'batman',
    // ]);
    $response = Http::omdb()->get('', [
        'apikey' => env('OMDB_API_KEY'),
        's' => 'batman',
    ]);

    if ($response->failed()) {
        abort($response->status(), $response->json());
    }

    $data = $response->json();
    
    return view('movies', ['movies' => $data['Search']]);
});
