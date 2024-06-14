<?php

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

Route::get('/invoices', function () {
    $response = Http::invoicesApi()->get('/invoices?amount[lt]=200&type[eq]=b');

    if ($response->failed()) {
        if ($response->status() === 401) {
            abort(401, 'Unauthorized');
        }
    }
    $data = $response->json();

    return view('invoices', ['invoices' => $data['data'] ?? []]);
});

Route::get('/retry', function () {
    
    $response = Http::retry(3, 100, function (Exception $exception, PendingRequest $request) {
        Log::info("Retrying request");
        return true;
    })->get('https://api.github.com/users/Jesse-js/repios');

    dd($response->json());
    if ($response->failed()) {
        abort($response->status(), $response->json());
    };
    return view('repos', ['repos' => $response->json()]);
});