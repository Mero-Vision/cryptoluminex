<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CryptoCurrencyController extends Controller
{

    public function index()
    {
        $response = Http::get('https://api.coincap.io/v2/assets', [
            'limit' => 10, // Adjust the number of coins you want to display
        ]);

        $cryptoData = $response->json()['data'];

        return response()->json(['cryptoData' => $cryptoData]);
    }
}