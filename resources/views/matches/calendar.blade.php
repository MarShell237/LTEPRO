@extends('layouts.app')
@section('content')
<style>
.calendar-day {
  background: rgba(255,255,255,0.97);
  border-radius: 1.2rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.13);
  padding: 1.5rem 1rem;
  margin-bottom: 2rem;
}
.calendar-date {
  font-size: 1.3rem;
  font-weight: bold;
  color: #2563eb;
  margin-bottom: 1rem;
}
.calendar-matches {
  display: grid;
  gap: 1.2rem;
  grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
}
.match-card {
  background: #f3f4f6;
  border-radius: 1rem;
  box-shadow: 0 2px 8px rgba(30,58,138,0.08);
  padding: 1rem;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.teams-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  gap: 10px;
  margin-bottom: 8px;
}
.team-name {
  display: flex;
  align-items: center;
  gap: 6px;
  max-width: 48%;
  overflow: hidden;
  text-overflow: ellipsis;
  font-weight: bold;
  color: #1e3a8a;
}
.score {
  min-width: 56px;
  font-size: 1.2rem;
  font-weight: bold;
  color: #2563eb;
}
.match-status {
  font-size: 0.95em;
  color: #2563eb;
  margin-top: 4px;
}
</style>
<div class="container">
<h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">Calendrier des matchs</h1>
@forelse($calendar as $date => $matches)
    <div class="calendar-day">
        <div class="calendar-date">{{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}</div>
        <div class="calendar-matches">
            @foreach($matches as $match)
                <div class="match-card">
                    <div class="teams-row">
                        <span class="team-name">
                            @if(isset($match['homeTeam']['crest']))
                                <img src="{{ $match['homeTeam']['crest'] }}" alt="logo" style="width:24px;height:24px;vertical-align:middle;border-radius:50%;background:#fff;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                            @endif
                            <span style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $match['homeTeam']['name'] }}</span>
                        </span>
                        <span class="score">{{ $match['score']['fullTime']['home'] ?? '-' }} - {{ $match['score']['fullTime']['away'] ?? '-' }}</span>
                        <span class="team-name" style="justify-content:flex-end;">
                            @if(isset($match['awayTeam']['crest']))
                                <img src="{{ $match['awayTeam']['crest'] }}" alt="logo" style="width:24px;height:24px;vertical-align:middle;border-radius:50%;background:#fff;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                            @endif
                            <span style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $match['awayTeam']['name'] }}</span>
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
                            $statusFr = $statusMap[$match['status']] ?? $match['status'];
                        @endphp
                        {{ $statusFr }}
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
