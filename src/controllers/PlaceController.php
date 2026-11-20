<?php

declare(strict_types=1);

namespace App\Controller;

final class PlaceController extends AppController
{
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
        $details = [
            1 => [
                'name' => 'Parkowa Altana Wyciszenia',
                'category' => 'Park / Plener',
                'location' => 'Powiśle, Warszawa',
                'noiseLevel' => 28,
                'sensoryScore' => 'A+',
                'lastUpdated' => '10 min temu',
                'light' => 'Miękkie naturalne światło',
                'crowd' => 'Niski · 1–3 osoby',
                'scent' => 'Neutralny',
                'quietHours' => '10:00–14:00 oraz po 18:00',
                'noiseHistory' => [31, 29, 28, 26, 24, 25, 27, 30, 33, 32, 29, 28],
                'review' => [
                    'author' => 'Użytkownik #402',
                    'date' => '18 października 2026',
                    'datetime' => '2026-10-18',
                    'text' => 'Miejsce jest niezwykle ciche. Świetne miejsce na ucieczkę od hałasu miejskiego.',
                ],
            ],
            2 => [
                'name' => 'Kawiarnia Czytelnia – Strefa Cicha',
                'category' => 'Cicha kawiarnia',
                'location' => 'Śródmieście, Warszawa',
                'noiseLevel' => 42,
                'sensoryScore' => 'B',
                'lastUpdated' => '38 min temu',
                'light' => 'Ciepłe, przyciemnione',
                'crowd' => 'Średni',
                'scent' => 'Lekko kawowy',
                'quietHours' => '08:00–10:00 oraz 15:00–17:00',
                'noiseHistory' => [38, 36, 39, 42, 45, 44, 43, 41, 40, 43, 42, 39],
                'review' => [
                    'author' => 'Użytkownik #315',
                    'date' => '12 października 2026',
                    'datetime' => '2026-10-12',
                    'text' => 'Dobra atmosfera do spokojnej pracy, a personel respektuje strefę ciszy.',
                ],
            ],
            3 => [
                'name' => 'Mediateka – Czytelnia Sensoryczna',
                'category' => 'Biblioteka',
                'location' => 'Krakowskie Przedmieście, Warszawa',
                'noiseLevel' => 22,
                'sensoryScore' => 'A+',
                'lastUpdated' => '5 min temu',
                'light' => 'Regulowane punktowe',
                'crowd' => 'Bardzo niski',
                'scent' => 'Neutralny',
                'quietHours' => '09:00–12:00 oraz 16:00–20:00',
                'noiseHistory' => [27, 25, 23, 21, 20, 22, 24, 23, 21, 20, 22, 25],
                'review' => [
                    'author' => 'Użytkownik #286',
                    'date' => '21 października 2026',
                    'datetime' => '2026-10-21',
                    'text' => 'Jedno z najspokojniejszych miejsc do koncentracji i czytania.',
                ],
            ],
        ];

        $place = $details[$id] ?? null;

        if ($place === null) {
            http_response_code(404);
            $this->render('not-found', [
                'pageTitle' => 'Nie znaleziono miejsca',
                'activePage' => 'places',
            ]);
            return;
        }

        $this->render('place', [
            'pageTitle' => $place['name'],
            'placeId' => $id,
            'placeName' => $place['name'],
            'placeCategory' => $place['category'],
            'placeLocation' => $place['location'],
            'noiseLevel' => $place['noiseLevel'],
            'sensoryScore' => $place['sensoryScore'],
            'lastUpdated' => $place['lastUpdated'],
            'placeLight' => $place['light'],
            'placeCrowd' => $place['crowd'],
            'placeScent' => $place['scent'],
            'quietHours' => $place['quietHours'],
            'noiseHistory' => $place['noiseHistory'],
            'placeReview' => $place['review'],
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