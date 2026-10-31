# AGENTS.md

## Cel i Architektura Projektu
Aplikacja internetowa oparta na własnym wzorcu **MVC (Model-View-Controller)** uruchamiana w środowisku **Docker** (Nginx + PHP-FPM + Baza danych).

## Struktura Katalogów
- `public/index.php` — **Front Controller**; punkt wejścia aplikacji, inicjalizuje autoloader i routing.
- `public/views/*.html.php` — **Warstwa Prezentacji**; szablony HTML z osadzonym PHP (tylko wyświetlanie danych).
- `public/css/` — Pliki ze stylami CSS.
- `src/Routing.php` — Autorski silnik routingu (dopasowuje adresy URL i parametry dynamiczne, np. `{id}`).
- `src/controllers/AppController.php` — Klasa bazowa kontrolerów z metodą `render()`.
- `src/controllers/` — Kontrolery aplikacji (np. `DefaultController`, `PlaceController`).
- `docker/` — Konfiguracja kontenerów (Dockerfile, Nginx, itp.).

## Konwencje i Zasady Kodowania
- **Strict Types:** Zawsze dodawaj `declare(strict_types=1);` na początku każdego pliku PHP w `src/`.
- **Namespace:** Główna przestrzeń nazw to `App\` (zgodna z PSR-4 i `composer.json`).
- **Bezpieczeństwo:** 
  - Dane przekazywane do widoków i wyświetlane w HTML zabezpieczaj przez `htmlspecialchars()`.
  - Nigdy nie ujawniaj ani nie zapisuj haseł, tokenów ani danych z `.env`.
- **Czystość Architektury (Separation of Concerns):**
  - Widoki (`.html.php`) służą **wyłącznie** do prezentacji. Nie umieszczaj w nich logiki biznesowej.
  - Kontrolery dziedziczą po `AppController` i przekazują dane do widoków za pomocą metody `render()`.
  - Nie dodawaj zewnętrznych frameworków ani paczek przez Composera bez mojej wyraźnej zgody.

## Zasady Pracy dla Agenta AI
1. **Podejście iteracyjne:** Najpierw przedstaw krótki plan zmian (3–5 kroków) i wskaż pliki, które zmodyfikujesz. Niczego nie zmieniaj przed akceptacją.
2. **Minimalny diff:** Modyfikuj tylko pliki niezbędne do realizacji zadania.
3. **Instrukcje weryfikacji:** Po wygenerowaniu kodu zaproponuj komendy do przetestowania zmian (np. sprawdzanie składni PHP, testowanie tras w przeglądarce, `git diff`).

## Polecenia Robocze
- **Uruchomienie środowiska:** `docker compose up -d`
- **Sprawdzenie składni PHP:** `docker compose exec php php -l ścieżka/do/pliku.php`
- **Podgląd statusu Git:** `git status` / `git diff`

## Bezpieczeństwo
- Nie odczytuj ani nie commituj sekretów z `.env`.
- Nie wykonuj destrukcyjnych poleceń bez potwierdzenia.
- Nie zmieniaj wygenerowanych plików w `vendor/`.