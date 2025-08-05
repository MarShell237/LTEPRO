<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\FootballApiService;

class MatchController extends Controller
{
    protected $footballApi;
    public function __construct(FootballApiService $footballApi) { $this->footballApi = $footballApi; }

    public function index() {
        $matches = $this->footballApi->getAllMatches();
        return view('matches.index', compact('matches'));
    }
    public function calendar(Request $request) {
        $matches = $this->footballApi->getAllMatches();
        // Grouper les matchs par date (format Y-m-d)
        $calendar = [];
        foreach($matches['matches'] ?? [] as $match) {
            $date = substr($match['utcDate'], 0, 10);
            $calendar[$date][] = $match;
        }
        krsort($calendar);
        return view('matches.calendar', compact('calendar'));
    }
}
