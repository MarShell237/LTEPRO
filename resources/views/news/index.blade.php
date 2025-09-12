@extends('layouts.app')
@section('content')

<style>
.container{
  margin: 0 auto;
  padding-left: 2rem;
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
  text-align: left;
  width: 400px;
  height: auto;
  margin-left:-110px;
  margin-bottom: 120px;
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

     /* Animation effet machine à écrire */
    .animated-text {
        font-size: 1.4rem;
        font-weight: bold;
        width: 100%;
        padding: 10px;
        white-space: nowrap;
        overflow: hidden;
        border-right: 2px solid;
        animation: typing 5s steps(50, end), blink .7s step-end infinite;
        text-align: center;
    }

    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }

    @keyframes blink {
        from, to { border-color: transparent }
        50% { border-color: black }
    }

    /* Bouton */
    .copy-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        display: block;
        margin-left: auto;
        margin-right: auto;
        transition: background 0.3s ease;
    }

    .copy-btn:hover {
        background: #1d4ed8;
    }

    @media(max-width: 768px) {
      .container{
        margin: 0 auto;
        padding-left: 1rem;
      }
    h1 {
      font-size: 1.8rem !important;
      margin-left: 0 !important;
      text-align: center;
    }
    .promo-banner {
      margin: auto;
      width: 90%;
      text-align: left;

    }

    .text{
      width: 50%;
      height: 100px;
      transform:scale(0.5);
      max-width: 520px;
      background: rgba(255, 255, 255, 0.85);
      border-radius: 1rem;
      padding: 0;
      margin-top: 1rem;
      box-shadow: 0 4px 24px rgba(30,58,138,0.15);
    }
    .animated-text{
      font-size: 1.43rem;
      margin-left:-12px;
    }
    .copy-btn{
      transform:scale(1.6);
      height: 40px;
    }
    .section-flex {
      flex-direction: column;
      align-items: center;
    }
    .right {
      text-align: center;
      margin: auto !important;
      margin-right:-7000px;
    }
    .photo{
      margin-top: 5px;
      margin-left:-90px;
      transform:scale(0.8);
    }
  }
   
</style>

<script>
  document.body.classList.add('football-bg');
</script>

<div class="football-ball"></div>
<div class="container">

  <h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem; margin-left: -110px;">
    Comment ça marche ?
  </h1>

  <!-- Bannière publicitaire principale -->
  <div class="promo-banner ">
     
      <p style="font-size: 20px;"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Choisissez le code promo LTEPRO pour toute catégorie qui vous intéresse</p>
      <p style="font-size: 20px;"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Pour  Saisissez le montant des fonds bonus et appuyez sur le bouton « Obtenir le code »</p>
      <P style="font-size: 20px;"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Placez un pari et attendez votre gain !</P>
      <a href="news/detail" style="text-decoration:none; color:#2563eb; font-size:1.2rem;"><p style="font-size: 20px;color:#2563eb;"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Cliquez ici pour en savoir plus sur comment ça marche.</p></a>
      <a href="news/LTEPRO" style="text-decoration:none; color:#2563eb; font-size:1.2rem;"><p style="font-size: 20px;color:#2563eb;"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Cliquez ici pour plus savoir sur les avantages du code promo LTEPRO</p></a>
  </div>

  <div class="text" style="margin-left: -110px; width: 500px;background: rgba(255, 255, 255, 0.85); border-radius: 1rem; padding: 1.2rem; margin-bottom: 15rem; box-shadow: 0 4px 24px rgba(30,58,138,0.15);">
     
    <div class="animated-text">
        Active ton bonus avec le code promo <span style="color:#2563eb; font-size:25px;">LTEPRO</span>
    </div>
      <button class="copy-btn" onclick="copyText()" style="margin-left: 40%;">Copier <i class="fa fa-clone" aria-hidden="true"></i></button>
  </div>
  
  <div class="right" style="margin-left: 700px; margin-top: -700px;">
    <h1 style="color: white; ">JOUEZ AVEZ LE MEILLEUR</h1>
    <h1 style="color: white; margin-left: 110px;">CODE PROMO</h1>
    <img src="../logo.png"  alt="logo" class="photo" style="margin-top:-200px;">
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
                  <h3>Ne manquez pas votre bonus avec <span style="color:#dc2626;">LTEPRO</span></h3>
                  <p>Profitez dès maintenant des meilleurs bookmakers avec le code <strong>LTEPRO</strong>.</p>
                  <a href="/bookmakers/1xbet" style="display:inline-block;margin-top:0.8rem;background:#2563eb;color:#fff;padding:0.4rem 1rem;border-radius:6px;text-decoration:none;">Je m'inscris</a>
              </div>
          @endif

      @empty
          <p style="color:#fff;font-size:1.2rem;">Restez connecter pour ne rater aucune actualité</p>
      @endforelse
  </div>
</div>

<script>
    function copyText() {
        let text = "LTEPRO"; // Seul ce mot sera copié
        navigator.clipboard.writeText(text).then(() => {
            alert("Code promo copié avec succès !");
        }).catch(err => {
            console.error("Erreur de copie", err);
        });
    }
</script>

@endsection
