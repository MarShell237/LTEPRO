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

    /* Responsive */
    @media (max-width: 1024px) {
        .bonus-container {
            width: 70%;
        }
    }

    @media (max-width: 768px) {
        .bonus-container {
            width: 90%;
            margin: 20px auto;
            padding: 15px;
        }
        .bonus-body h1 {
            font-size: 1.5rem;
        }
        .bonus-footer p {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .bonus-container {
            width: 95%;
            margin: 20px auto;
            padding: 10px;
        }
        .bonus-header h1 {
            font-size: 1.2rem;
        }
        .bonus-body h1 {
            font-size: 1.2rem;
        }
        .bonus-footer p {
            font-size: 0.85rem;
        }
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

<script>
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
</script>

@endsection
