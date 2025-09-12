@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Statistiques du joueur</h1>

    @if($stats && isset($stats['response'][0]))
        @php 
            $player = $stats['response'][0]['player']; 
            $statistics = $stats['response'][0]['statistics'][0] ?? []; 
        @endphp

        <div class="player-card">
            {{-- Infos joueur --}}
            <div class="player-info">
                <img src="{{ $player['photo'] ?? asset('default-player.png') }}" 
                     alt="{{ $player['name'] }}" 
                     class="player-photo">
                <div>
                    <h2 class="player-name">{{ $player['name'] ?? 'Inconnu' }}</h2>
                    <p>Âge : {{ $player['age'] ?? '-' }} ans</p>
                    <p>Nationalité : {{ $player['nationality'] ?? '-' }}</p>
                    <p>Poste : {{ $player['position'] ?? '-' }}</p>
                </div>
            </div>

            {{-- Stats principales --}}
            <div class="stats-grid">
                <div class="stat-box blue">
                    <div class="stat-value">{{ $statistics['games']['appearences'] ?? 0 }}</div>
                    <div class="stat-label">Matchs joués</div>
                </div>

                <div class="stat-box green">
                    <div class="stat-value">{{ $statistics['goals']['total'] ?? 0 }}</div>
                    <div class="stat-label">Buts</div>
                </div>

                <div class="stat-box yellow">
                    <div class="stat-value">{{ $statistics['goals']['assists'] ?? 0 }}</div>
                    <div class="stat-label">Passes décisives</div>
                </div>

                <div class="stat-box orange">
                    <div class="stat-value">{{ $statistics['cards']['yellow'] ?? 0 }}</div>
                    <div class="stat-label">Cartons jaunes</div>
                </div>

                <div class="stat-box red">
                    <div class="stat-value">{{ $statistics['cards']['red'] ?? 0 }}</div>
                    <div class="stat-label">Cartons rouges</div>
                </div>

                <div class="stat-box purple">
                    <div class="stat-value">{{ $statistics['games']['minutes'] ?? 0 }}</div>
                    <div class="stat-label">Minutes jouées</div>
                </div>
            </div>
        </div>
    @else
        <p class="no-data"> Aucune statistique disponible pour ce joueur.</p>
    @endif
</div>

{{-- CSS natif --}}
<style>
.container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    font-family: Arial, sans-serif;
}
.title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}
.player-card {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.player-info {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}
.player-photo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ccc;
}
.player-name {
    font-size: 20px;
    font-weight: bold;
}
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 15px;
}
.stat-box {
    padding: 15px;
    border-radius: 8px;
    color: #333;
    text-align: center;
    font-weight: bold;
}
.stat-value {
    font-size: 18px;
    margin-bottom: 5px;
}
.stat-label {
    font-size: 13px;
    color: #555;
}
.blue { background: #e6f0ff; }
.green { background: #e6ffe6; }
.yellow { background: #fff8e6; }
.orange { background: #ffe6cc; }
.red { background: #ffe6e6; }
.purple { background: #f2e6ff; }
.no-data {
    color: #666;
    font-style: italic;
}
</style>
@endsection
