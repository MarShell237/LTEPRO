@extends('layouts.app')

@section('content')

<style>

/* Animation pulse */ @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(30,144,255, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(30,144,255, 0); } 100% { box-shadow: 0 0 0 0 rgba(30,144,255, 0); } } .presentation { animation: pulse 3s infinite; display: flex; flex-wrap: wrap; background: {{ $background }}; border-radius: 24px; box-shadow: 0 8px 32px 0 rgba(17, 30, 218, 0.86); padding: 40px 32px; max-width: 900px; width: 100%; gap: 32px; align-items: center; justify-content: center; margin: 40px auto; position: relative; } .presentation-content { flex: 1 1 320px; color: #fff; min-width: 280px; } .presentation-content h1 { font-size: 2.5rem; margin-bottom: 18px; font-weight: 700; letter-spacing: 1px; } .highlight { color: @if($slug === '1xbet') #1e90ff @elseif($slug === 'melbet') #ffcc00 @else #1e90ff @endif; background: #fff; padding: 2px 10px; border-radius: 8px; font-weight: 800; box-shadow: 0 2px 8px rgba(30,144,255,0.10); } .desc { font-size: 1.15rem; margin-bottom: 28px; color: #e0e6f6; } .promo-box { display: flex; flex-wrap: wrap; align-items: center; background: black; border-radius: 12px; padding: 10px 18px; margin-bottom: 22px; gap: 10px; font-size: 1.1rem; box-shadow: 0 2px 8px rgba(30,144,255,0.08); } .promo-label { font-weight: 600; color: #fff; } .promo-code { font-family: 'Courier New', Courier, monospace; font-size: 1.25rem; color: #1e90ff; background: #fff; padding: 2px 12px; border-radius: 6px; margin: 0 6px; font-weight: bold; letter-spacing: 2px; box-shadow: 0 1px 4px rgba(30,144,255,0.10); transition: background 0.2s; } .copy-btn { background: #1e90ff; color: #fff; border: none; border-radius: 6px; padding: 6px 16px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s, box-shadow 0.2s; box-shadow: 0 2px 8px rgba(30,144,255,0.10); } .copy-btn:hover, .copy-btn.copied { background: #0a2e73; color: #fff; box-shadow: 0 4px 16px rgba(30,144,255,0.18); } .cta-btn { display: inline-block; background: linear-gradient(90deg, #1e90ff 60%, #0a2e73 100%); color: #fff; font-size: 1.15rem; font-weight: 700; padding: 12px 32px; border-radius: 8px; text-decoration: none; margin-top: 10px; box-shadow: 0 4px 16px rgba(30,144,255,0.18); transition: background 0.2s, transform 0.2s; } .cta-btn:hover { background: linear-gradient(90deg, #0a2e73 60%, #1e90ff 100%); transform: translateY(-2px) scale(1.04); } .presentation-image { flex: 1 1 220px; display: flex; justify-content: center; align-items: center; min-width: 180px; } .app-image { max-width: 180px; width: 100%; border-radius: 18px; box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25); background: #2a06ca; padding: 10px; } /* --- Responsive --- */ @media(max-width: 1024px) { .presentation { padding: 30px 20px; gap: 20px; } .presentation-content h1 { font-size: 2rem; } .desc { font-size: 1.05rem; } .cta-btn { font-size: 1rem; padding: 10px 28px; } .app-image { max-width: 150px; } } @media(max-width: 768px) { .presentation { flex-direction: column; padding: 25px 20px; gap: 18px; width: 90%; margin-left:-10px; } .presentation-content h1 { font-size: 1.75rem; text-align: center; width: 90%; } .desc { font-size: 1rem; text-align: center; } .promo-box { justify-content: center; } .cta-btn { display: block; margin: 0 auto; } .app-image { max-width: 140px; margin-top: 10px; } } @media(max-width: 480px) { .presentation { padding: 20px 20px; gap: 15px; } .presentation-content h1 { font-size: 1.5rem; } .desc { font-size: 0.95rem; } .promo-box { flex-direction: column; font-size: 0.95rem; padding: 8px 12px; } .promo-code { margin: 4px 0; } .cta-btn { font-size: 1rem; padding: 10px 20px; } .app-image { max-width: 120px; } }

  /* --- Styles carrousel --- */
  .carousel-container {
    max-width: 500px;
    margin: 40px auto;
    position: relative;
    overflow: hidden;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
  }

  .carousel {
    display: flex;
    transition: transform 1s ease-in-out;
    width: 100%;
  }

  .carousel img {
    width: 100%;
    flex: 0 0 100%;
    object-fit: cover;
    border-radius: 18px;
  }

  .carousel-indicators {
    position: absolute;
    bottom: 12px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
  }

  .indicator {
    width: 12px;
    height: 12px;
    background: #fff;
    border-radius: 50%;
    opacity: 0.6;
    cursor: pointer;
    transition: opacity 0.3s;
  }

  .indicator.active {
    opacity: 1;
    background: #1e90ff;
  }

</style>

{{-- SECTION PRESENTATION --}}
<section class="presentation">
  <div class="presentation-content">
    <h1>Bienvenue sur <span class="highlight">{{ $bookmaker['name'] }}</span></h1>
    <p class="desc">{{ $bookmaker['desc'] }}</p>
    <div class="promo-box">
      <span class="promo-label">Code Promo:</span>
      <span class="promo-code" id="promoCode">{{ $bookmaker['code'] }}</span>
      <button class="copy-btn" onclick="copyPromoCode()">Copier</button>
    </div>
    <a href="{{ $bookmaker['link'] }}" class="cta-btn" target="_blank">Telechargez l'appli ou regardez les cotes</a>
  </div>
  <div class="presentation-image">
    <img src="{{ asset('logo.png') }}" alt="{{ $bookmaker['name'] }} logo" class="app-image" />
  </div>
</section>

<!-- {{-- SECTION CARROUSEL --}} -->

<!-- @php
  // Utiliser directement le slug passé par le contrôleur
  $bannierePath = "bannieres/banniere_{$slug}";
  $bannieres = [
      asset("$bannierePath/1.jpg"),
      asset("$bannierePath/2.jpg"),
      asset("$bannierePath/3.jpg"),
      asset("$bannierePath/4.jpg"),
  ];
@endphp -->



<!-- <div class="carousel-container">
  <div class="carousel" id="carousel">
    @foreach($bannieres as $banniere)
      <img src="{{ $banniere }}" alt="Bannière {{ $bookmaker['name'] }}">
    @endforeach
  </div>
  <div class="carousel-indicators" id="indicators">
    @foreach($bannieres as $index => $banniere)
      <div class="indicator {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></div>
    @endforeach
  </div>
</div> -->

<script>
  function copyPromoCode() {
    const code = document.getElementById("promoCode").textContent;
    navigator.clipboard.writeText(code).then(() => {
      const btn = document.querySelector(".copy-btn");
      btn.textContent = "Copié !";
      btn.classList.add("copied");
      setTimeout(() => {
        btn.textContent = "Copier";
        btn.classList.remove("copied");
      }, 2000);
    });
  }

  // --- Carrousel Script ---
  const carousel = document.getElementById("carousel");
  const indicators = document.querySelectorAll(".indicator");
  let currentIndex = 0;
  const totalSlides = indicators.length;

  function goToSlide(index) {
    carousel.style.transform = `translateX(-${index * 100}%)`;
    indicators.forEach((ind, i) => {
      ind.classList.toggle("active", i === index);
    });
    currentIndex = index;
  }

  function nextSlide() {
    let newIndex = (currentIndex + 1) % totalSlides;
    goToSlide(newIndex);
  }

  setInterval(nextSlide, 8000); // change toutes les 8s

  indicators.forEach(ind => {
    ind.addEventListener("click", () => {
      goToSlide(parseInt(ind.dataset.index));
    });
  });

</script>

@endsection
