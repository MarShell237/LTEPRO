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

    /**
     * Retourne tous les matchs (fixtures) pour la période ±5 jours
     * Structure adaptée pour ta vue : ['fixtures' => [...]]
     */
    public function getAllFixtures($minutes = 30)
    {
        $dateFrom = date('Y-m-d', strtotime('-5 days'));
        $dateTo = date('Y-m-d', strtotime('+5 days'));

        $data = $this->fetch('/matches', [
            'dateFrom' => $dateFrom,
            'dateTo'   => $dateTo
        ], 'football_data_all_matches_' . $dateFrom . '_' . $dateTo, $minutes);

        // Football-Data.org retourne ['matches' => [...]] → on renvoie ['fixtures' => [...]] pour la vue
        return [
            'fixtures' => $data['matches'] ?? []
        ];
    }

    public function getStandings($leagueId)
    {
        return $this->fetch('/competitions/' . $leagueId . '/standings', [], 'football_data_standings_' . $leagueId);
    }

    public function getTeamStats($teamId)
    {
        return $this->fetch('/teams/' . $teamId, [], 'football_data_team_stats_' . $teamId);
    }

    public function getPlayerStats($playerId)
    {
        return $this->fetch('/players/' . $playerId, [], 'football_data_player_stats_' . $playerId);
    }

    public function getLeagues($minutes = 60)
    {
        return $this->fetch('/competitions', [], 'football_data_leagues', $minutes);
    }
}
