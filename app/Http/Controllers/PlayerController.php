<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{
   public function show($id)
    {
        $response = Http::withHeaders([
            'x-apisports-key' => env('API_FOOTBALL_KEY')
        ])->get("https://v3.football.api-sports.io/players?id={$id}");

        $stats = $response->json();

        // Si ton fichier est dans resources/views/stats/player.blade.php
        return view('stats.player', compact('stats'));
    }

}
