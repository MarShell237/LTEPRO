<?php
namespace App\Http\Controllers;

use App\Services\FootballApiService;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    protected $api;
    public function __construct(FootballApiService $api) { $this->api = $api; }
    public function index() {
        $leagues = $this->api->getLeagues();
        return view('leagues.index', compact('leagues'));
    }
    public function standings($id) {
        $standings = $this->api->getStandings($id);
        return view('leagues.standings', compact('standings'));
    }
}
