@extends('layouts.app')
@section('content')
<style>
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
.leagues-grid {
  display: grid;
  gap: 1.5rem;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  margin-top: 2rem;
}
.league-card {
  background: rgba(255,255,255,0.95);
  border-radius: 1rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.12);
  padding: 1.5rem 1rem;
  text-align: center;
  transition: transform 0.2s, box-shadow 0.2s;
  position: relative;
}
.league-card:hover {
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 8px 32px rgba(30,58,138,0.18);
}
.league-logo {
  width: 56px;
  height: 56px;
  margin-bottom: 12px;
  border-radius: 50%;
  background: #f3f4f6;
  box-shadow: 0 2px 8px rgba(0,0,0,0.07);
}
.league-name {
  font-weight: bold;
  font-size: 1.15rem;
  color: #1e3a8a;
  margin-bottom: 4px;
}
.league-country {
  font-size: 0.95em;
  color: #555;
  margin-bottom: 8px;
}
.league-link {
  display: inline-block;
  margin-top: 10px;
  color: #2563eb;
  text-decoration: underline;
  font-size: 1em;
  font-weight: 500;
  transition: color 0.2s;
}
.league-link:hover {
  color: #1e3a8a;
}
</style>
<script>
document.body.classList.add('football-bg');
</script>
<div class="football-ball"></div>
<div class="container">
<h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">Ligues</h1>
@if(isset($leagues['message']))
    <div style="background:#fee;color:#900;padding:12px;border-radius:8px;margin-bottom:16px;max-width:600px;margin-left:auto;margin-right:auto;">
        <strong>Erreur API :</strong> {{ $leagues['message'] }}
    </div>
@endif
<div class="leagues-grid">
    @forelse($leagues['competitions'] ?? [] as $league)
    <a href="{{ route('leagues.standings', $league['id']) }}" class="league-link" style="text-decoration:none;">
        <div class="league-card">
            <img src="{{ $league['emblem'] ?? $league['area']['flag'] ?? '' }}" alt="{{ $league['name'] }}" class="league-logo">
            <div class="league-name">{{ $league['name'] }}</div>
            <div class="league-country">{{ $league['area']['name'] }}</div>Voir classement
        </div>
    </a>
    @empty
        <p style="color:#fff;font-size:1.2rem;">Aucune ligue disponible.</p>
    @endforelse
</div>
@endsection
