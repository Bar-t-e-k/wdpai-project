<?php

declare(strict_types=1);

namespace App\Controller;

use App\PlaceRepository;

final class PlaceController extends AppController
{
    private PlaceRepository $places;

    public function __construct()
    {
        $this->places = new PlaceRepository();
    }

    public function list(): void
    {
        $search = trim((string)($_GET['search'] ?? ''));
        $category = (string)($_GET['category'] ?? '');
        $maxNoise = (int)($_GET['max_noise'] ?? 60);
        $maxNoise = max(20, min(60, $maxNoise));
        $filteredPlaces = $this->places->filter($search, $category, $maxNoise);

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
        $place = $this->places->find($id);

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

        $error = null;
        $submitted = [
            'name' => '',
            'category' => '',
            'description' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $submitted = [
                'name' => trim((string)($_POST['name'] ?? '')),
                'category' => (string)($_POST['category'] ?? ''),
                'description' => trim((string)($_POST['description'] ?? '')),
            ];
            $noiseDb = (int)($_POST['noise_db'] ?? 0);

            $allowedCategories = [
                'park' => 'Park / Skwer',
                'kawiarnia' => 'Cicha kawiarnia',
                'biblioteka' => 'Biblioteka / Czytelnia',
                'inne' => 'Inne miejsce',
            ];

            if ($submitted['name'] === '') {
                $error = 'Podaj nazwę miejsca.';
            } elseif (!isset($allowedCategories[$submitted['category']])) {
                $error = 'Wybierz poprawną kategorię.';
            } elseif ($noiseDb < 20 || $noiseDb > 100) {
                $error = 'Podaj poziom hałasu z zakresu 20–100 dB.';
            } else {
                $placeId = $this->places->add([
                    'name' => $submitted['name'],
                    'category' => $allowedCategories[$submitted['category']],
                    'categoryKey' => $submitted['category'],
                    'noiseDb' => $noiseDb,
                    'light' => 'Do weryfikacji',
                    'crowd' => 'Do weryfikacji',
                    'location' => 'Warszawa',
                    'description' => $submitted['description'] !== ''
                        ? $submitted['description']
                        : 'Brak dodatkowego opisu.',
                ]);

                $this->redirect('/places/' . $placeId);
            }
        }

        $this->render('add-place', [
            'pageTitle' => 'Dodaj Nowy Azyl / Zmierz Hałas',
            'maxAllowedNoise' => 55,
            'error' => $error,
            'submitted' => $submitted,
            'activePage' => 'add-place',
        ]);
    }
}