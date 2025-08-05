@extends('layouts.app')
@section('content')
<style>
.filters-bar {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  align-items: center;
  background: rgba(255,255,255,0.85);
  border-radius: 1rem;
  box-shadow: 0 2px 8px rgba(30,58,138,0.08);
  padding: 1rem 1.5rem;
  margin-bottom: 2rem;
  justify-content: center;
}
.filter-input, .filter-select {
  padding: 10px 14px;
  border-radius: 8px;
  border: 1px solid #2563eb;
  min-width: 180px;
  font-size: 1rem;
  background: #f3f4f6;
  color: #1e3a8a;
  outline: none;
  transition: border 0.2s;
}
.filter-input:focus, .filter-select:focus {
  border: 1.5px solid #1e3a8a;
}
.filter-btn {
  background: linear-gradient(90deg,#2563eb,#1e3a8a);
  color: #fff;
  padding: 10px 24px;
  border-radius: 8px;
  border: none;
  font-weight: bold;
  font-size: 1rem;
  box-shadow: 0 2px 8px rgba(30,58,138,0.10);
  cursor: pointer;
  transition: background 0.2s;
}
.filter-btn:hover {
  background: linear-gradient(90deg,#1e3a8a,#2563eb);
}
body.football-bg {
  background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
  min-height: 100vh;
  position: relative;
}
.football-ball {
  position: absolute;
  width: 60px;
  height: 60px;
  background: url('https://upload.wikimedia.org/wikipedia/commons/6/6e/Football_iu_1996.jpg') no-repeat center/cover;
  border-radius: 50%;
  animation: ball-move 8s linear infinite;
  opacity: 0.15;
}
@keyframes ball-move {
  0% { left: -80px; top: 10vh; }
  25% { left: 30vw; top: 30vh; }
  50% { left: 60vw; top: 60vh; }
  75% { left: 90vw; top: 20vh; }
  100% { left: -80px; top: 10vh; }
}
.matches-grid {
  display: grid;
  gap: 1.5rem;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  margin-top: 2rem;
}
.match-card {
  background: rgba(255,255,255,0.95);
  border-radius: 1rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.12);
  padding: 1.5rem 1rem;
  text-align: center;
  transition: transform 0.2s, box-shadow 0.2s;
  position: relative;
}
.match-card:hover {
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 8px 32px rgba(30,58,138,0.18);
}
.score {
  font-size: 1.5rem;
  font-weight: bold;
  color: #2563eb;
}
.team-name {
  font-weight: bold;
  color: #1e3a8a;
}
.match-date {
  font-size: 0.95em;
  color: #555;
  margin-bottom: 6px;
}
.match-status {
  font-size: 0.9em;
  color: #2563eb;
  margin-top: 8px;
}
</style>
<script>
document.body.classList.add('football-bg');
</script>
<div class="football-ball"></div>
<div class="container">
<h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">Tous les matchs</h1>
<form method="get" class="filters-bar">
    <input type="text" name="team" value="{{ request('team') }}" placeholder="Filtrer par équipe ou club" class="filter-input">
    <select name="competition" class="filter-select">
        <option value="">Toutes compétitions</option>
        @foreach(array_unique(array_map(fn($m)=>$m['competition']['name']??'', $matches['matches']??[])) as $comp)
            @if($comp)
                <option value="{{ $comp }}" @if(request('competition')==$comp)selected @endif>{{ $comp }}</option>
            @endif
        @endforeach
    </select>
    <select name="sort" class="filter-select">
        <option value="date" @if(request('sort')=='date')selected @endif>Trier par date</option>
        <option value="home" @if(request('sort')=='home')selected @endif>Trier par équipe domicile</option>
        <option value="away" @if(request('sort')=='away')selected @endif>Trier par équipe extérieur</option>
    </select>
    <button type="submit" class="filter-btn">Filtrer</button>
</form>
@php
$filtered = $matches['matches'] ?? [];
if(request('team')) {
    $filtered = array_filter($filtered, function($m) {
        return stripos($m['homeTeam']['name'], request('team')) !== false || stripos($m['awayTeam']['name'], request('team')) !== false;
    });
}
if(request('competition')) {
    $filtered = array_filter($filtered, function($m) {
        return ($m['competition']['name'] ?? '') == request('competition');
    });
}
if(request('sort')=='home') {
    usort($filtered, fn($a,$b)=>strcmp($a['homeTeam']['name'],$b['homeTeam']['name']));
} elseif(request('sort')=='away') {
    usort($filtered, fn($a,$b)=>strcmp($a['awayTeam']['name'],$b['awayTeam']['name']));
} else {
    usort($filtered, fn($a,$b)=>strcmp($a['utcDate'],$b['utcDate']));
}
@endphp
<div class="matches-grid">
    @forelse($filtered as $match)
        <div class="match-card">
            <div class="teams-row" style="display:flex;justify-content:space-between;align-items:center;width:100%;margin-bottom:12px;gap:10px;">
                <span class="team-name" style="display:flex;align-items:center;gap:6px;max-width:48%;overflow:hidden;text-overflow:ellipsis;">
                    @if(isset($match['homeTeam']['crest']))
                        <img src="{{ $match['homeTeam']['crest'] }}" alt="logo" style="width:28px;height:28px;vertical-align:middle;border-radius:50%;background:#f3f4f6;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                    @endif
                    <span style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $match['homeTeam']['name'] }}</span>
                </span>
                <span class="score" style="min-width:56px;">{{ $match['score']['fullTime']['home'] ?? '-' }} - {{ $match['score']['fullTime']['away'] ?? '-' }}</span>
                <span class="team-name" style="display:flex;align-items:center;gap:6px;max-width:48%;overflow:hidden;text-overflow:ellipsis;justify-content:flex-end;">
                    @if(isset($match['awayTeam']['crest']))
                        <img src="{{ $match['awayTeam']['crest'] }}" alt="logo" style="width:28px;height:28px;vertical-align:middle;border-radius:50%;background:#f3f4f6;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
                    @endif
                    <span style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $match['awayTeam']['name'] }}</span>
                </span>
            </div>
            <div class="match-date">{{ $match['utcDate'] }}</div>
            <div class="match-status">{{ $match['status'] }}</div>
        </div>
    @empty
        <p style="color:#fff;font-size:1.2rem;">Aucun match disponible.</p>
    @endforelse
</div>
</div>
@endsection
