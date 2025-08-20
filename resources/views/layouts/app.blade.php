<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ __('messages.title') }}</title>
<link rel="icon" type="image/png" href="{{ asset('ball-icon.png') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" crossorigin="anonymous">

<style>
/* Reset global */
body, html { margin:0; padding:0; font-family: Arial, sans-serif; overflow-x:hidden; }

/* Navbar */
nav {
    background:#1e3a8a;
    color:#fff;
    padding:0.5rem 2.4rem;
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    box-shadow:0 2px 8px rgba(30,58,138,0.1);
    position: relative;
}
nav .logo img { height:60px; transition: transform 0.4s; margin-left:80px;transform:scale(5);}
nav .nav-links { display:flex; gap:12px; align-items:center; flex-wrap:wrap; transition: all 0.3s ease-in-out; }
nav .nav-links a { 
    color:#fff; font-weight:600; font-size:1rem; padding:6px 12px; 
    border-radius:6px; text-decoration:none; 
    transition: all 0.3s ease; 
}
nav .nav-links a:hover { background:#2563eb; transform: translateY(-2px); }
nav .nav-links a:active { transform: scale(0.95); }
nav .nav-links a.active { background:#2563eb; color:#fff; }
nav .nav-toggle { display:none; font-size:1.8rem; cursor:pointer; color:#fff; transition: transform 0.3s; }
nav .nav-toggle:hover { transform: rotate(90deg); }

/* Dropdown Bookmakers (mobile) */
.dropdown-mobile { position: relative; display: none; }
.dropdown-mobile button {
    background:#2563eb;
    color:#fff;
    border:none;
    padding:8px 12px;
    font-weight:bold;
    cursor:pointer;
    border-radius:6px;
    transition: background 0.3s, transform 0.2s;
}
.dropdown-mobile button:hover { background:#1d4ed8; transform: scale(1.05); }

.dropdown-mobile .dropdown-content {
    display:none;
    position:absolute;
    top:100%;
    left:0;
    width:auto;
    border-bottom-left-radius:10px;
    border-bottom-right-radius:10px;
    z-index:999;
    animation: fadeIn 0.3s ease-in-out;
}
.dropdown-mobile .dropdown-content a {
    display:block;
    padding:10px;
    color:#fff;
    text-decoration:none;
    font-weight:bold;
    transition: background 0.3s ease, padding-left 0.2s;
    font-size: 0.8rem;
    width: 100%;
}
.dropdown-mobile .dropdown-content a:hover {
    background:#2563eb;
    padding-left:15px;
}

/* Bookmakers inline (desktop) */
.bookmakers-inline {
    display:none;
    padding:10px;
    text-align:center;
}
.bookmakers-inline a {
    display:inline-block;
    margin:5px 10px;
    padding:10px 18px;
    border-radius:30px;
    font-weight:bold;
    text-decoration:none;
    color:white;
    transition: transform 0.3s ease, box-shadow 0.3s;
    position: relative;
    overflow: hidden;
}
.bookmakers-inline a::after {
    content:"";
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.1);
    transition: all 0.4s ease;
}
.bookmakers-inline a:hover::after { left:0; }
.bookmakers-inline a:hover { transform: translateY(-3px) scale(1.05); box-shadow:0 6px 15px rgba(0,0,0,0.3); }

/* Footer */
footer {
    background:#111;
    color:#fff;
    padding:50px 20px;
    text-align:center;
}
footer h2 {
    margin-bottom:25px;
    font-size:1.8rem;
    font-weight:bold;
    color:#fff;
    text-transform: uppercase;
    letter-spacing:1px;
}
footer .bookmaker-btns {
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:15px;
}
footer .bookmaker-btns a {
    display:inline-block;
    padding:12px 22px;
    border-radius:30px;
    font-weight:bold;
    color:#fff;
    text-decoration:none;
    font-size:1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
}
footer .bookmaker-btns a::after {
    content:"";
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.1);
    transition: all 0.4s ease;
}
footer .bookmaker-btns a:hover::after { left:0; }
footer .bookmaker-btns a:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow:0 6px 18px rgba(255,255,255,0.3);
}

/* Animations */
@keyframes fadeIn {
    from { opacity:0; transform: translateY(-10px); }
    to { opacity:1; transform: translateY(0); }
}

/* Responsive */
@media(max-width:768px){
    nav .nav-links { display:none; flex-direction:column; width:100%; background:#1e3a8a; position:absolute; top:100%; left:0; padding:10px 0; z-index:1000; border-radius:0 0 10px 10px; }
    nav .nav-links.show { display:flex; animation: fadeIn 0.3s ease-in-out; }
    nav .nav-links a { width:100%; text-align:center; padding:10px 0; }
    nav .nav-toggle { display:block; }
    nav .logo img{ transform:scale(2.4); margin-left:7px;  }
    .dropdown-mobile { display:block; }
}

/* Desktop : afficher inline et cacher dropdown */
@media(min-width:992px){
    .bookmakers-inline { display:block; }
    .dropdown-mobile { display:none !important; }
}
</style>
</head>
<body>

<!-- Navbar -->
<nav>
    <div class="logo"><a href="/"><img src="{{ asset('logo.png') }}" alt="Logo"></a></div>

    <!-- Dropdown Mobile -->
    <div class="dropdown-mobile">
        <button id="dropdownBtn">{{ __('messages.nav.bookmakers') }} <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content" id="dropdownContent">
            @foreach(__('messages.bookmakers') as $key => $label)
                <a href="{{ route('bookmaker.show', $key) }}" 
                   style="background:{{ $loop->index == 0 ? '#0052cc' : ($loop->index == 1 ? '#ff9900' : ($loop->index == 2 ? '#008000' : ($loop->index == 3 ? '#ff4d4d' : ($loop->index == 4 ? '#222' : ($loop->index == 5 ? '#0066cc' : ($loop->index == 6 ? '#444' : '#9900cc')))))) }};">
                   {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="nav-toggle"><i class="fa fa-bars"></i></div>
    <div class="nav-links">
        @php $navLinks = ['news','home','calendar','leagues']; @endphp
        @foreach($navLinks as $route)
            <a href="{{ route($route) }}" class="{{ request()->routeIs($route)?'active':'' }}">
                {{ __('messages.nav.'.$route) }}
            </a>
        @endforeach
        <a href="/Bonus" style="color:yellow;"><i class="fa fa-gift"></i> {{ __('messages.nav.bonus') }}</a>
    </div>
</nav>

<!-- Bookmakers inline (desktop) -->
<div class="bookmakers-inline">
    @foreach(__('messages.bookmakers') as $key => $label)
        <a href="{{ route('bookmaker.show', $key) }}" 
           style="background:{{ $loop->index == 0 ? '#0052cc' : ($loop->index == 1 ? '#ff9900' : ($loop->index == 2 ? '#008000' : ($loop->index == 3 ? '#ff4d4d' : ($loop->index == 4 ? '#222' : ($loop->index == 5 ? '#0066cc' : ($loop->index == 6 ? '#444' : '#9900cc')))))) }};">
           {{ $label }}
        </a>
    @endforeach
</div>

<!-- Main content -->
<main class="container mx-auto p-4">
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <h2>{{ __('messages.footer.partners') }}</h2>
    <div class="bookmaker-btns">
        @foreach(__('messages.bookmakers') as $key => $label)
            <a href="{{ route('bookmaker.show', $key) }}" 
               style="background:{{ $loop->index == 0 ? '#0052cc' : ($loop->index == 1 ? '#ff9900' : ($loop->index == 2 ? '#008000' : ($loop->index == 3 ? '#ff4d4d' : ($loop->index == 4 ? '#222' : ($loop->index == 5 ? '#0066cc' : ($loop->index == 6 ? '#444' : '#9900cc')))))) }};">
               {{ $label }}
            </a>
        @endforeach
    </div>
</footer>

<script>
// Navbar toggle
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelector('.nav-links');

navToggle.addEventListener('click', (e)=>{
    e.stopPropagation();
    navLinks.classList.toggle('show');
});

// Dropdown Bookmakers
const dropdownBtn = document.getElementById('dropdownBtn');
const dropdownContent = document.getElementById('dropdownContent');

dropdownBtn.addEventListener('click', (e)=>{
    e.stopPropagation();
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
});

// Fermer dropdown si clic ailleurs
document.addEventListener('click', (e)=>{
    if(!dropdownBtn.contains(e.target) && !dropdownContent.contains(e.target)){
        dropdownContent.style.display = 'none';
    }
});

// Fermer nav-links si clic ailleurs
document.addEventListener('click', (e)=>{
    if(navLinks.classList.contains('show') && !navLinks.contains(e.target) && !navToggle.contains(e.target)){
        navLinks.classList.remove('show');
    }
});
</script>

</body>
</html>
