<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meilleur Code Promo</title>
    <link rel="icon" type="image/png" href="{{ asset('ball-icon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

    <style>
        link[rel="icon"] {
            transform: scale(12);
        }
        .carousel-section {
        width: 100%;
        max-width: 400px;
        margin: auto;
        padding: 10px;
        }

        .carousel-container {
        position: relative;
        width: 100%;
        height: 850px;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .carousel-images-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        }

        .carousel-image {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.6s ease-in-out;
        opacity: 0;
        }

        .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 30px;
        font-weight: bold;
        background-color: rgba(0,0,0,0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 2;
        border-radius: 5px;
        }

        .carousel-btn-left {
        left: 10px;
        }

        .carousel-btn-right {
        right: 10px;
        }

    </style>
</head>
<body class="bg-gray-100 min-h-screen" style="margin:0;padding:0;">
   <nav style="background:#1e3a8a;color:#fff;padding:0.3rem 2rem;box-shadow:0 2px 8px rgba(30,58,138,0.1);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;margin-top:0;">
        <div style="display:flex;align-items:center;gap:24px;margin-left:22px;">
            <img src="{{ asset('logo.png') }}" alt="Logo" style="height:100px;transform:scale(2.5);transition:transform 0.4s;">
        </div>

        <div style="display:flex;align-items:center;gap:18px;">
            @php
                $navLinks = [    
                    'news' => 'Code promo',
                    'home' => 'Matchs',
                    'calendar' => 'Calendrier',
                    'leagues' => 'Classements',
                ];
            @endphp

            @foreach($navLinks as $route => $label)
                <a href="{{ route($route) }}"
                    style="
                        color:#fff;
                        font-weight:600;
                        font-size:1.1rem;
                        padding:6px 16px;
                        border-radius:6px;
                        text-decoration:none;
                        transition:background 0.2s;
                        {{ request()->routeIs($route) ? 'background:#2563eb;color:#fff;' : '' }}
                    ">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <div class="heure" style="font-size:2.0rem;margin-left: 0;">
            Chargement...
            <script>
                function updateHeureLocale() {
                    const heureElement = document.querySelector('.heure');
                    const maintenant = new Date();
                    const options = {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false
                    };
                    const heureLocale = maintenant.toLocaleTimeString(undefined, options);
                    heureElement.textContent = heureLocale;
                }
                setInterval(updateHeureLocale, 1000);
                updateHeureLocale();
            </script>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <footer style="background-color: #111; color: #fff; padding: 40px 20px; text-align: center; font-family: Arial, sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="margin-bottom: 20px;">Nos partenaires bookmakers</h2>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 30px;">
        <a href="{{ route('bookmaker.show', '1xbet') }}" style="text-decoration: none; padding: 10px 20px; background-color: #0052cc; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">1XBET</a>
        <a href="{{ route('bookmaker.show', 'melbet') }}" style="text-decoration: none; padding: 10px 20px; background-color: #ff9900; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">MELBET</a>
        <a href="{{ route('bookmaker.show', 'betwinner') }}" style="text-decoration: none; padding: 10px 20px; background-color: #008000; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">BETWINNER</a>
        <a href="{{ route('bookmaker.show', 'mostbet') }}" style="text-decoration: none; padding: 10px 20px; background-color: #ff4d4d; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">MOSTBET</a>
        <a href="{{ route('bookmaker.show', 'megapari') }}" style="text-decoration: none; padding: 10px 20px; background-color: #222; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">MEGAPARI</a>
        <a href="{{ route('bookmaker.show', 'betandyou') }}" style="text-decoration: none; padding: 10px 20px; background-color: #0066cc; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">BETANDYOU</a>
        <a href="{{ route('bookmaker.show', 'linebet') }}" style="text-decoration: none; padding: 10px 20px; background-color: #444; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">LINEBET</a>
        <a href="{{ route('bookmaker.show', 'paripesa') }}" style="text-decoration: none; padding: 10px 20px; background-color: #9900cc; color: white; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">PARIPESA</a>
        </div>

        </div>

        <div style="margin-top: 20px;">
        <p>Contactez-nous via :</p>
        <p>Email : <a href="mailto:arielfodopfx@gmail.com" style="color: #4CAF50;">arielfodopfx@gmail.com</a></p>
        <p>Télégram : <a href="https://t.me/tonchannel" target="_blank" style="color: #4CAF50;">@tonchannel</a></p>
        </div>

        <div style="margin-top: 30px; font-size: 14px; color: #aaa;">
        © {{ date('Y') }} Ariel Fodop | Tous droits réservés.
        </div>
    </div>
    </footer>


    <script>
    const images = document.querySelectorAll('.carousel-image');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    let currentIndex = 0;
    let autoSlideInterval;

    function showImage(index) {
        images.forEach((img, i) => {
        img.style.opacity = (i === index) ? '1' : '0';
        });
        currentIndex = index;
    }

    function showNextImage() {
        const nextIndex = (currentIndex + 1) % images.length;
        showImage(nextIndex);
    }

    function showPrevImage() {
        const prevIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(prevIndex);
    }

    prevBtn.addEventListener('click', () => {
        showPrevImage();
        resetAutoSlide();
    });

    nextBtn.addEventListener('click', () => {
        showNextImage();
        resetAutoSlide();
    });

    function startAutoSlide() {
        autoSlideInterval = setInterval(showNextImage, 6000); // 6 secondes
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Démarrer automatiquement au chargement
    showImage(0);
    startAutoSlide();
    </script>

</body>
</html>
