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

        $this->render('add-place', [
            'pageTitle' => 'Dodaj Nowy Azyl / Zmierz Hałas',
            'maxAllowedNoise' => 55,
            'activePage' => 'add-place',
        ]);
    }
}