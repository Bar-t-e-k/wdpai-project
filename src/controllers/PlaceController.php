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
                'categoryKey' => 'park',
                'noiseDb' => 28,
                'light' => 'Miękkie naturalne',
                'crowd' => 'Niski (1-3 osoby)',
                'location' => 'Powiśle, Warszawa',
            ],
            [
                'id' => 2,
                'name' => 'Kawiarnia Czytelnia – Strefa Cicha',
                'category' => 'Kawiarnia',
                'categoryKey' => 'cafe',
                'noiseDb' => 42,
                'light' => 'Ciepłe, przyciemnione',
                'crowd' => 'Średni',
                'location' => 'Śródmieście, Warszawa',
            ],
            [
                'id' => 3,
                'name' => 'Mediateka – Czytelnia Sensoryczna',
                'category' => 'Biblioteka',
                'categoryKey' => 'library',
                'noiseDb' => 22,
                'light' => 'Regulowane punktowe',
                'crowd' => 'Bardzo niski',
                'location' => 'Krakowskie Przedmieście, Warszawa',
            ],
        ];

        $search = trim((string)($_GET['search'] ?? ''));
        $category = (string)($_GET['category'] ?? '');
        $maxNoise = (int)($_GET['max_noise'] ?? 60);
        $maxNoise = max(20, min(60, $maxNoise));

        $filteredPlaces = array_values(array_filter(
            $places,
            static function (array $place) use ($search, $category, $maxNoise): bool {
                if ($place['noiseDb'] > $maxNoise) {
                    return false;
                }

                if ($category !== '' && $place['categoryKey'] !== $category) {
                    return false;
                }

                if ($search === '') {
                    return true;
                }

                $searchableText = strtolower(
                    implode(' ', [$place['name'], $place['category'], $place['location']])
                );

                return str_contains($searchableText, strtolower($search));
            }
        ));

        $this->render('places', [
            'pageTitle' => 'Katalog Cichych Stref',
            'placesList' => $filteredPlaces,
            'search' => $search,
            'category' => $category,
            'maxNoise' => $maxNoise,
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