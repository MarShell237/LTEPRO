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
.news-grid {
  display: grid;
  gap: 1.5rem;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  margin-top: 2rem;
}
.news-card {
  background: rgba(255,255,255,0.95);
  border-radius: 1rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.12);
  padding: 1.5rem 1rem;
  text-align: left;
  transition: transform 0.2s, box-shadow 0.2s;
  position: relative;
}
.news-card:hover {
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 8px 32px rgba(30,58,138,0.18);
}
.news-image {
  width: 100%;
  height: 140px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 12px;
}
.news-title {
  font-weight: bold;
  font-size: 1.1rem;
  color: #2563eb;
  text-decoration: underline;
  margin-bottom: 6px;
  display: block;
}
.news-date {
  font-size: 0.95em;
  color: #555;
  margin-top: 8px;
}
</style>
<script>
  document.body.classList.add('football-bg');
</script>
<div class="football-ball"></div>
<div class="container">
<h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">Actualités sportives</h1>
<div class="news-grid">
    @forelse($news as $item)
        <div class="news-card">
            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="news-image">
            <a href="{{ $item['link'] }}" target="_blank" class="news-title">{{ $item['title'] }}</a>
            <div class="news-date">{{ $item['published_at'] }}</div>
        </div>
    @empty
        <p style="color:#fff;font-size:1.2rem;">Aucune actualité disponible.</p>
    @endforelse
</div>
</div>
@endsection
