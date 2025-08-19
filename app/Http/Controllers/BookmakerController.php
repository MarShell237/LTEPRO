<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmakerController extends Controller
{

   // Exemple dans BookmakerController.php show()

public function show($slug)
{
        $bookmakers = [
            '1xbet' => [
                'name' => '1XBET',
                'desc' => 'Profitez de la meilleure expérience de paris sportifs et de jeux en ligne avec l’application 1XBET ! Inscrivez-vous dès maintenant et bénéficiez d’un bonus exclusif grâce à notre code promo.',
                'code' => 'LTE56',
                'link' => 'https://1xbet.com/fr/',
            ],
            'melbet' => [
                'name' => 'MELBET',
                'desc' => 'Rejoignez MELBET pour profiter des meilleures cotes, promotions régulières et une interface intuitive pour tous vos paris sportifs.',
                'code' => 'LTE56',
                'link' => 'https://melbet.com/fr/',
            ],
            'betwinner' => [
                'name' => 'BETWINNER',
                'desc' => 'Pariez en toute confiance sur BETWINNER, avec une large gamme de sports et une expérience utilisateur optimale.',
                'code' => 'LTE56',
                'link' => 'https://betwinner.com/fr/',
            ],
            'mostbet' => [
                'name' => 'MOSTBET',
                'desc' => 'Découvrez MOSTBET, la plateforme de paris avec des offres spéciales et une large sélection de jeux.',
                'code' => 'LTE56',
                'link' => 'https://mostbet.com/fr/',
            ],
            'megapari' => [
                'name' => 'MEGAPARI',
                'desc' => 'MEGAPARI vous offre une expérience complète de paris sportifs et casino en ligne avec des bonus attractifs.',
                'code' => 'LTE56',
                'link' => 'https://megapari.com/fr/',
            ],
            'betandyou' => [
                'name' => 'BETANDYOU',
                'desc' => 'BETANDYOU propose des cotes compétitives et un service client réactif pour vos paris sportifs.',
                'code' => 'LTE56',
                'link' => 'https://betandyou.com/fr/',
            ],
            'linebet' => [
                'name' => 'LINEBET',
                'desc' => 'LINEBET est la plateforme idéale pour les amateurs de paris en direct et d’évènements sportifs variés.',
                'code' => 'LTE56',
                'link' => 'https://linebet.com/fr/',
            ],
            'paripesa' => [
                'name' => 'PARIPESA',
                'desc' => 'PARIPESA vous permet de parier facilement sur vos sports favoris avec des bonus attractifs et des options diverses.',
                'code' => 'LTE56',
                'link' => 'https://paripesa.com/fr/',
            ],
        ];

        $backgrounds = [
            '1xbet' => '#13b0e9ff',
            'melbet' => 'black',
            'betwinner' => 'rgba(0, 128, 0, 0.9)',
            'mostbet' => 'rgba(51, 20, 224, 0.88)',
            'megapari' => 'rgba(250, 8, 8, 0.73)',
            'betandyou' => 'rgba(20, 20, 20, 0.78)',
            'linebet' => 'rgba(0, 100, 0, 0.74)',
            'paripesa' => 'rgba(0, 90, 187, 0.77)',
        ];

        $bookmaker = $bookmakers[$slug] ?? abort(404);
        $background = $backgrounds[$slug] ?? 'rgba(255,255,255,0.07)';

        return view('bookmakers.show', compact('bookmaker', 'background', 'slug'));
    }


        public function Bonus()
    {
    
        return view('Bonus');
    }
        public function detail()
    {

        return view('detail');
    }
        public function LTE56()
    {

        return view('LTE56');
    }

}

