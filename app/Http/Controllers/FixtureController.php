<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\FootballApiService;

class FixtureController extends Controller
{
    protected $footballApi;
    public function __construct(FootballApiService $footballApi) { $this->footballApi = $footballApi; }

    public function index() {
        $fixtures = $this->footballApi->getAllFixtures();
        return view('fixtures.index', compact('fixtures'));
    }
    public function calendar(Request $request) {
        $fixtures = $this->footballApi->getAllFixtures();
        // Grouper les fixtures par date (format Y-m-d)
        $calendar = [];
        foreach($fixtures['fixtures'] ?? [] as $fixture) {
            $date = substr($fixture['utcDate'], 0, 10);
            $calendar[$date][] = $fixture;
        }
        krsort($calendar);
        return view('fixtures.calendar', compact('calendar'));
    }
}
