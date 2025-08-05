<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Live</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav style="background:#1e3a8a;color:#fff;padding:1rem 2rem;box-shadow:0 2px 8px rgba(30,58,138,0.1);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;">
        <div style="display:flex;align-items:center;gap:24px;">
            <img src="{{ asset('favicon.ico') }}" alt="Logo" style="width:32px;height:32px;margin-right:12px;">
            <span style="font-size:1.5rem;font-weight:bold;letter-spacing:1px;">Football Live</span>
        </div>
        <div style="display:flex;align-items:center;gap:18px;">
            <a href="{{ route('home') }}" style="color:#fff;font-weight:600;font-size:1.1rem;padding:6px 16px;border-radius:6px;text-decoration:none;transition:background 0.2s;"{{ request()->routeIs('home') ? ' style=\'background:#2563eb;color:#fff;\'' : '' }}>Accueil</a>
            <a href="{{ route('calendar') }}" style="color:#fff;font-weight:600;font-size:1.1rem;padding:6px 16px;border-radius:6px;text-decoration:none;transition:background 0.2s;"{{ request()->routeIs('calendar') ? ' style=\'background:#2563eb;color:#fff;\'' : '' }}>Calendrier</a>
            <a href="{{ route('news') }}" style="color:#fff;font-weight:600;font-size:1.1rem;padding:6px 16px;border-radius:6px;text-decoration:none;transition:background 0.2s;"{{ request()->routeIs('news') ? ' style=\'background:#2563eb;color:#fff;\'' : '' }}>Actualités</a>
            <a href="{{ route('leagues') }}" style="color:#fff;font-weight:600;font-size:1.1rem;padding:6px 16px;border-radius:6px;text-decoration:none;transition:background 0.2s;"{{ request()->routeIs('leagues') ? ' style=\'background:#2563eb;color:#fff;\'' : '' }}>Classements</a>
        </div>
    </nav>
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>
