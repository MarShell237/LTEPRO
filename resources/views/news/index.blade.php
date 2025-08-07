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
.promo-banner {
  background: rgba(255, 255, 255, 0.85);
  border-left: 6px solid #2563eb;
  border-radius: 1rem;
  padding: 1.2rem;
  margin-top: 2rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.15);
  text-align: center;
}
.promo-banner h3 {
  color: #1e3a8a;
  font-weight: 700;
  margin-bottom: 0.5rem;
}
.promo-banner p {
  font-size: 1rem;
  color: #333;
}
.promo-banner img {
  width: 70px;
  margin-top: 1rem;
}
</style>

<script>
  document.body.classList.add('football-bg');
</script>

<div class="football-ball"></div>
<div class="container">

  <h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">
    Code promo
  </h1>

  <!-- Bannière publicitaire principale -->
  <div class="promo-banner">
      <h1> Code Promo Exclusif : <span style="color:#dc2626;font-weight:bold;font-size:2rem;">BM40</span></h1>
      <p style="font-size: 20px;">Utilisez le code <strong style="color:#dc2626;font-weight:bold;">BM40</strong> sur <strong>1XBET,BETWINNER,MOSTBET,MEGAPARI,BETANDYOU,PARIPESA</strong> et d'autres partenaires pour obtenir des <strong>bonus de bienvenue exceptionnels</strong> !</p><hr>
      <p style="font-size: 20px;">Pour <strong>MELBET</strong>, utilisez le code <strong style="color:#dc2626;font-weight:bold;">RUSSE7</strong>. Et benéficiez de 200% de bonus lors de votre premiere recharge.</p><hr>
      <P style="font-size: 20px;">Pour <strong>LINEBET</strong>, utilisez le code <strong style="color:#dc2626;font-weight:bold;">DEL50</strong>. Et en cas de pertes beneficiez de 50% de remboursement.</P>
      <img src="{{ asset('logo.png') }}" alt="Logo BM40" style="width:10%;margin-top:1rem;background-color:black;">
  </div>

  <!-- Affichage des actualités -->
  <div class="news-grid">
      @forelse($news as $index => $item)
          <div class="news-card">
              <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="news-image">
              <a href="{{ $item['link'] }}" target="_blank" class="news-title">{{ $item['title'] }}</a>
              <div class="news-date">{{ $item['published_at'] }}</div>
          </div>

          {{-- Pub intermédiaire tous les 3 actus --}}
          @if(($index + 1) % 3 === 0)
              <div class="promo-banner" style="grid-column: span 2;">
                  <h3>Ne manquez pas votre bonus avec <span style="color:#dc2626;">BM40</span></h3>
                  <p>Profitez dès maintenant des meilleurs bookmakers avec le code <strong>BM40</strong>.</p>
                  <a href="/bookmakers/1xbet" style="display:inline-block;margin-top:0.8rem;background:#2563eb;color:#fff;padding:0.4rem 1rem;border-radius:6px;text-decoration:none;">Je m'inscris</a>
              </div>
          @endif

      @empty
          <p style="color:#fff;font-size:1.2rem;">Restez connecter pour ne rater aucune actualité</p>
      @endforelse
  </div>
</div>
@endsection
