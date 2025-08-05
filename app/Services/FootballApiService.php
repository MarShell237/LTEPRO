<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FootballApiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('FOOTBALL_DATA_API_KEY');
        $this->baseUrl = 'https://api.football-data.org/v4';
    }

    protected function fetch($endpoint, $params = [], $cacheKey = null, $minutes = 10)
    {
        $cacheKey = $cacheKey ?: md5($endpoint . serialize($params));
        return Cache::remember($cacheKey, $minutes * 60, function () use ($endpoint, $params) {
            $url = $this->baseUrl . $endpoint;
            $response = Http::withHeaders([
                'X-Auth-Token' => $this->apiKey,
            ])->get($url, $params);
            return $response->json();
        });
    }

    public function getAllMatches($minutes = 30)
    {
        // football-data.org: /matches?dateFrom=YYYY-MM-DD&dateTo=YYYY-MM-DD
        $dateFrom = date('Y-m-d', strtotime('-5 days'));
        $dateTo = date('Y-m-d', strtotime('+5 days'));
        return $this->fetch('/matches', [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo
        ], 'football_data_all_matches_' . $dateFrom . '_' . $dateTo, $minutes);
    }

    public function getStandings($leagueId)
    {
        // football-data.org: /competitions/{id}/standings
        return $this->fetch('/competitions/' . $leagueId . '/standings', [], 'football_data_standings_' . $leagueId);
    }

    public function getTeamStats($teamId)
    {
        // football-data.org: /teams/{id}
        return $this->fetch('/teams/' . $teamId, [], 'football_data_team_stats_' . $teamId);
    }

    public function getPlayerStats($playerId)
    {
        // football-data.org n'a pas d'endpoint direct pour les stats joueurs, mais /players/{id} existe pour certains plans
        return $this->fetch('/players/' . $playerId, [], 'football_data_player_stats_' . $playerId);
    }

    public function getLeagues($minutes = 60)
    {
        // football-data.org: /competitions
        return $this->fetch('/competitions', [], 'football_data_leagues', $minutes);
    }
}
