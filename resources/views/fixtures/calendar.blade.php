@extends('layouts.app')
@section('content')
<style>
body {
  background:#1f3e93;
  min-height: 100vh;
  position: relative;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.calendar-day {
  background: #1f3e93;
  border-radius: 1.2rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.13);
  padding: 1.5rem 1rem;
  margin-bottom: 2rem;
}
.calendar-date {
  font-size: 1.4rem;
  font-weight: bold;
  color: #f3f4f6;
  margin-bottom: 1rem;
  text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
}
.calendar-matches {
  display: grid;
  gap: 1.2rem;
  grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
}
.match-card {
  background: #ffffff;
  border-radius: 1rem;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  padding: 1rem;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.2s, box-shadow 0.2s;
}
.match-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.teams-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  gap: 10px;
  margin-bottom: 10px;
}
.team-name {
  display: flex;
  align-items: center;
  gap: 8px;
  max-width: 48%;
  overflow: hidden;
  text-overflow: ellipsis;
  font-weight: 600;
  color: #1e3a8a;
}
.score {
  min-width: 56px;
  font-size: 1.3rem;
  font-weight: 700;
  color: #2563eb;
}
.match-status {
  font-size: 0.95rem;
  color: #2563eb;
  margin-top: 6px;
  font-weight: 500;
}
.match-details {
  margin-top: 12px;
  font-size: 0.95rem;
  color: #1f2937;
  background: #e0e7ff;
  border-radius: 0.8rem;
  padding: 10px 14px;
  width: 100%;
  text-align: left;
  font-weight: 500;
  box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
}
.match-details div {
  margin: 4px 0;
}
.match-details .date {
  color: #1e40af;
  font-size: 1rem;
  font-weight: 600;
}
.match-details .time {
  color: #2563eb;
  font-size: 0.95rem;
  font-weight: 500;
}
.match-details .referee {
  color: #1f2937;
  font-size: 0.9rem;
  font-weight: 500;
}

@media (max-width: 600px) {
  .container{
    margin-left: -15px;
  }
  .match-card{
    transform: scale(0.9);
  }
}
</style>

<div class="container">
<h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">Calendrier des matchs</h1>

@forelse($calendar as $date => $fixtures)
    <div class="calendar-day">
        <div class="calendar-date">{{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}</div>
        <div class="calendar-matches">
            @foreach($fixtures as $fixture)
                <div class="match-card">
                    <div class="teams-row">
                        <span class="team-name">
                            @if(isset($fixture['homeTeam']['crest']))
                                <img src="{{ $fixture['homeTeam']['crest'] }}" alt="logo" style="width:24px;height:24px;border-radius:50%;background:#fff;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                            @endif
                            <span>{{ $fixture['homeTeam']['name'] }}</span>
                        </span>
                        <span class="score">{{ $fixture['score']['fullTime']['home'] ?? '-' }} - {{ $fixture['score']['fullTime']['away'] ?? '-' }}</span>
                        <span class="team-name" style="justify-content:flex-end;">
                            @if(isset($fixture['awayTeam']['crest']))
                                <img src="{{ $fixture['awayTeam']['crest'] }}" alt="logo" style="width:24px;height:24px;border-radius:50%;background:#fff;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                            @endif
                            <span>{{ $fixture['awayTeam']['name'] }}</span>
                        </span>
                    </div>

                    <div class="match-status">
                        @php
                            $statusMap = [
                                'SCHEDULED' => 'Prévu',
                                'TIMED' => 'Programmé',
                                'IN_PLAY' => 'En cours',
                                'PAUSED' => 'Pause',
                                'FINISHED' => 'Terminé',
                                'POSTPONED' => 'Reporté',
                                'SUSPENDED' => 'Suspendu',
                                'CANCELED' => 'Annulé',
                            ];
                            $statusFr = $statusMap[$fixture['status']] ?? $fixture['status'];
                        @endphp
                        {{ $statusFr }}
                    </div>

                    {{-- Détails du match : date, heure, arbitre --}}
                    <div class="match-details">
                        <div class="date">date: {{ \Carbon\Carbon::parse($fixture['utcDate'])->translatedFormat('d/m/Y') }}</div>
                        <div class="time">heure: {{ \Carbon\Carbon::parse($fixture['utcDate'])->format('H:i') }}</div>
                        <div class="referee">Arbitre: {{ $fixture['referees'][0]['name'] ?? 'Non communiqué' }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@empty
    <p style="color:#fff;font-size:1.2rem;">Aucun match à venir.</p>
@endforelse
</div>
@endsection
