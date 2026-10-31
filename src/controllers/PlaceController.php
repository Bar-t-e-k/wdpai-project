<?php

declare(strict_types=1);

namespace App\Controller;

final class PlaceController extends AppController
{
    public function index(): void
    {
        $this->render('home', [
            'pageTitle' => 'Cichy Azyl – Mapa Przestrzeni Sensorycznych',
            'activeZonesCount' => 14,
            'avgCityNoise' => '38 dB (Spokojnie)',
            'activePage' => 'home',
        ]);
    }

    public function list(): void
    {
        $places = [
            [
                'id' => 1,
                'name' => 'Parkowa Altana Wyciszenia',
                'category' => 'Park / Plener',
                'noise' => '28 dB',
                'light' => 'Miękkie naturalne',
                'crowd' => 'Niski (1-3 osoby)',
            ],
            [
                'id' => 2,
                'name' => 'Kawiarnia Czytelnia – Strefa Cicha',
                'category' => 'Kawiarnia',
                'noise' => '42 dB',
                'light' => 'Ciepłe, przyciemnione',
                'crowd' => 'Średni',
            ],
            [
                'id' => 3,
                'name' => 'Mediateka – Czytelnia Sensoryczna',
                'category' => 'Biblioteka',
                'noise' => '22 dB',
                'light' => 'Regulowane punktowe',
                'crowd' => 'Bardzo niski',
            ],
        ];

        $this->render('places', [
            'pageTitle' => 'Katalog Cichych Stref',
            'placesList' => $places,
            'activePage' => 'places',
        ]);
    }

    public function show(int $id): void
    {
        $this->render('place', [
            'pageTitle' => 'Szczegóły Azylu',
            'placeId' => $id,
            'placeName' => 'Parkowa Altana Wyciszenia',
            'noiseLevel' => 28,
            'sensoryScore' => 'A+ (Doskonałe)',
            'lastUpdated' => '10 min temu',
            'activePage' => 'places',
        ]);
    }

    public function add(): void
    {
        $this->requireAuthentication();

        $this->render('add-place', [
            'pageTitle' => 'Dodaj Nowy Azyl / Zmierz Hałas',
            'maxAllowedNoise' => 55,
            'activePage' => 'add-place',
        ]);
    }
}