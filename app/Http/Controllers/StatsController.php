<?php
namespace App\Http\Controllers;

use App\Services\FootballApiService;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    protected $api;
    public function __construct(FootballApiService $api) { $this->api = $api; }
    public function team($id) {
        $stats = $this->api->getTeamStats($id);
        return view('stats.team', compact('stats'));
    }
    public function player($id) {
        $stats = $this->api->getPlayerStats($id);
        return view('stats.player', compact('stats'));
    }
}
