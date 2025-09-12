@extends('layouts.app')
@section('content')

<style>
    .bonus-container {
        border-radius: 1rem;
        margin: 50px auto;
        width: 50%;
        background: #0d0d0eff;
        padding: 20px;
        box-shadow: 0 4px 24px rgba(30, 58, 138, 0.15);
    }

    .bonus-header {
        background: #4875cfff;
        padding: 5px;
        text-align: center;
        color: #f9fafcff;
    }

    .bonus-body {
        margin-top: 20px;
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background: #0d0d0eff;
        box-shadow: 0 4px 24px rgba(30, 58, 138, 0.15);
        text-align: center;
    }

    .bonus-body h1 {
        color: #f9fafcff;
        font-size: 2rem;
        word-wrap: break-word;
    }

    .bonus-footer {
        background: #4875cfff;
        padding: 20px;
        text-align: center;
        color: #f7f8faff;
    }

    /* Section promo */
    .promo-users-container {
        border-radius: 1rem;
        margin: 30px auto;
        width: 50%;
        background: #111f3e;
        padding: 20px;
        box-shadow: 0 4px 24px rgba(30, 58, 138, 0.2);
        text-align: center;
    }

    .promo-users-container h2 {
        color: #f9fafc;
        font-size: 1.8rem;
        margin-bottom: 10px;
    }

    .promo-users-container p {
        font-size: 1.5rem;
        font-weight: bold;
        color: #00e676;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .bonus-container, .promo-users-container { width: 70%; }
    }
    @media (max-width: 768px) {
        .bonus-container, .promo-users-container { width: 90%; margin: 20px auto; padding: 15px; }
        .bonus-body h1, .promo-users-container p { font-size: 1.5rem; }
    }
    @media (max-width: 480px) {
        .bonus-container, .promo-users-container { width: 95%; margin: 20px auto; padding: 10px; }
        .bonus-header h1, .bonus-body h1, .promo-users-container p { font-size: 1.2rem; }
    }
</style>

<div class="bonus-container">
    <div class="bonus-header">
        <h1>Total de tous les bonus disponibles:</h1>
    </div>

    <div class="bonus-body">
        <h1 id="bonus-amount">0 $</h1>
    </div>

    <div class="bonus-footer">
        <div class="detail-content">
            <p>Inscris-toi maintenant avec le code promo et fais partie des gagnants..</p>
        </div>
    </div>
</div>

<!-- Nouvelle section: utilisateurs promo -->
<div class="promo-users-container">
    <h2>Nombre de parieurs utilisant le code LTEPRO:</h2>
    <p id="promo-users-count">201,587</p>
</div>

<script>
    // Animation bonus existante
    function getRandomBonus() {
        return Math.floor(Math.random() * (100000000 - 99000 + 1)) + 99000;
    }

    function getRandomInterval() {
        return Math.floor(Math.random() * 60 + 1) * 60 * 10;
    }

    function animateNumber(element, start, end, duration) {
        let startTime = null;
        function step(currentTime) {
            if (!startTime) startTime = currentTime;
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value.toLocaleString() + ' $';
            if (progress < 1) {
                requestAnimationFrame(step);
            }
        }
        requestAnimationFrame(step);
    }

    function updateBonus() {
        const bonusElement = document.getElementById('bonus-amount');
        const newBonus = getRandomBonus();
        const currentBonus = parseInt(bonusElement.textContent.replace(/\D/g,'')) || 0;
        animateNumber(bonusElement, currentBonus, newBonus, 2000);
        setTimeout(updateBonus, getRandomInterval());
    }

    updateBonus();

    // Animation compteur promo (incrémente chaque jour)
    const promoElement = document.getElementById('promo-users-count');
    let baseCount = 201587; // valeur initiale
    function updatePromoUsers() {
        const today = new Date();
        const startDate = new Date("2025-08-25"); // date de départ
        const daysElapsed = Math.floor((today - startDate) / (1000*60*60*24));
        const currentCount = baseCount + daysElapsed;
        promoElement.textContent = currentCount.toLocaleString();
    }
    updatePromoUsers();
</script>

@endsection
