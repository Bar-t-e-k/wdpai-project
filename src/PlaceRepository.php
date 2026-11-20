<?php

declare(strict_types=1);

namespace App;

final class PlaceRepository
{
    private array $places = [
        1 => [
            'id' => 1,
            'name' => 'Parkowa Altana Wyciszenia',
            'category' => 'Park / Plener',
            'categoryKey' => 'park',
            'noiseDb' => 28,
            'noiseLevel' => 28,
            'light' => 'Miękkie naturalne światło',
            'crowd' => 'Niski · 1–3 osoby',
            'location' => 'Powiśle, Warszawa',
            'sensoryScore' => 'A+',
            'lastUpdated' => '10 min temu',
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
            'id' => 2,
            'name' => 'Kawiarnia Czytelnia – Strefa Cicha',
            'category' => 'Cicha kawiarnia',
            'categoryKey' => 'cafe',
            'noiseDb' => 42,
            'noiseLevel' => 42,
            'light' => 'Ciepłe, przyciemnione',
            'crowd' => 'Średni',
            'location' => 'Śródmieście, Warszawa',
            'sensoryScore' => 'B',
            'lastUpdated' => '38 min temu',
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
            'id' => 3,
            'name' => 'Mediateka – Czytelnia Sensoryczna',
            'category' => 'Biblioteka',
            'categoryKey' => 'library',
            'noiseDb' => 22,
            'noiseLevel' => 22,
            'light' => 'Regulowane punktowe',
            'crowd' => 'Bardzo niski',
            'location' => 'Krakowskie Przedmieście, Warszawa',
            'sensoryScore' => 'A+',
            'lastUpdated' => '5 min temu',
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

    public function all(): array
    {
        return array_values($this->places);
    }

    public function find(int $id): ?array
    {
        return $this->places[$id] ?? null;
    }

    public function filter(string $search, string $category, int $maxNoise): array
    {
        $search = strtolower(trim($search));

        return array_values(array_filter(
            $this->places,
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

                return str_contains($searchableText, $search);
            }
        ));
    }
}
