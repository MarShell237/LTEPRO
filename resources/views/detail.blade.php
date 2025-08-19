@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 90px; max-width: 1100px; background: #0d0d0e; color: white; padding: 30px; border-radius: 1rem; box-shadow: 0 4px 24px rgba(30,58,138,0.15);">

    <h1 style="text-align: center; color: #facc15; margin-bottom: 20px;"> Guide complet</h1>

    {{-- Partie inscription --}}
    <div class="inscription" style="margin-top: 20px;">
        <h2 style="color: #3b82f6; text-align: center; margin-bottom: 30px;"> Comment s'inscrire ?</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            @for ($i = 1; $i <= 4; $i++)
                <div style="background: #1a1a1a; border-radius: 10px; padding: 10px; text-align: center;">
                    <h3>{{ $i }}️⃣ Étape {{ $i }}</h3>
                    @php
                        $texte = [
                            1 => "Cliquez sur le lien dans le site et téléchargez l'application",
                            2 => "Cliquez sur \"S’inscrire\".",
                            3 => "Remplissez le formulaire.",
                            4 => "Rassurez-vous d'avoir saisi LTE56 comme code promo et validez."
                        ];
                    @endphp
                    <p style="font-size: 14px;">{{ $texte[$i] }}</p>
                    <img src="{{ asset('inscription_captures/'.$i.'.png') }}" alt="Capture Étape {{ $i }}" style="width: 100%; height: auto; border-radius: 8px;">
                </div>
            @endfor
        </div>
    </div>

    {{-- Partie déconnexion --}}
    <div class="deconnexion" style="margin-top: 50px;">
        <h2 style="color: #ef4444; text-align: center; margin-bottom: 30px;"> Se déconnecter d'un ancien compte</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            @for ($i = 1; $i <= 4; $i++)
                <div style="background: #1a1a1a; border-radius: 10px; padding: 10px; text-align: center;">
                    <h3>{{ $i }}️⃣ Étape {{ $i }}</h3>
                    @php
                        $texte = [
                            1 => "Ouvrez l'application de votre bookmaker actuel.",
                            2 => "Allez dans le menu Profil ou Paramètres.",
                            3 => "Sélectionnez l'option Se déconnecter et confirmez.",
                            4 => "Revenez à l'inscription et saisissez LTE56 comme code promo."
                        ];
                    @endphp
                    <p style="font-size: 14px;">{{ $texte[$i] }}</p>
                    <img src="{{ asset('capture_deconnecter/'.$i.'.png') }}" alt="Capture Déconnexion Étape {{ $i }}" style="width: 100%; height: auto; border-radius: 8px;">
                </div>
            @endfor
        </div>
    </div>

    {{-- Partie dépôt --}}
    <div class="depot" style="margin-top: 50px;">
        <h2 style="color: #10b981; text-align: center; margin-bottom: 30px;"> Comment effectuer un dépôt ?</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            @for ($i = 1; $i <= 4; $i++)
                <div style="background: #1a1a1a; border-radius: 10px; padding: 10px; text-align: center;">
                    <h3>{{ $i }}️⃣ Étape {{ $i }}</h3>
                    @php
                        $texte = [
                            1 => "Connectez-vous à votre compte.",
                            2 => "Allez dans la section Dépôt.",
                            3 => "Sélectionnez votre méthode de paiement.",
                            4 => "Saisissez le montant et validez votre dépôt."
                        ];
                    @endphp
                    <p style="font-size: 14px;">{{ $texte[$i] }}</p>
                    <img src="{{ asset('capture_depot/'.$i.'.png') }}" alt="Capture Dépôt Étape {{ $i }}" style="width: 100%; height: auto; border-radius: 8px;">
                </div>
            @endfor
        </div>
    </div>

    {{-- Partie retrait --}}
    <div class="retrait" style="margin-top: 50px;">
        <h2 style="color: #f59e0b; text-align: center; margin-bottom: 30px;"> Comment effectuer un retrait ?</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            @for ($i = 1; $i <= 4; $i++)
                <div style="background: #1a1a1a; border-radius: 10px; padding: 10px; text-align: center;">
                    <h3>{{ $i }}️⃣ Étape {{ $i }}</h3>
                    @php
                        $texte = [
                            1 => "Connectez-vous à votre compte.",
                            2 => "Allez dans la section Retrait.",
                            3 => "Choisissez votre méthode de retrait.",
                            4 => "Saisissez le montant et confirmez le retrait."
                        ];
                    @endphp
                    <p style="font-size: 14px;">{{ $texte[$i] }}</p>
                    <img src="{{ asset('capture_retrait/'.$i.'.png') }}" alt="Capture Retrait Étape {{ $i }}" style="width: 100%; height: auto; border-radius: 8px;">
                </div>
            @endfor
        </div>
    </div>

    {{-- Partie vidéo récapitulative --}}
    <div class="video-recap" style="margin-top: 50px; text-align: center;">
        <h2 style="color: #f472b6; margin-bottom: 20px;"> Vidéo récapitulative</h2>
        <video controls style="width: 80%; max-width: 800px; border-radius: 10px;">
            <source src="{{ asset('videos/recap.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
    </div>

</div>

@endsection
