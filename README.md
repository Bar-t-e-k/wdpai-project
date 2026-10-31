## Tech stack

| Warstwa | Technologie |
|---|---|
| Backend | PHP 8.3 |
| Serwer HTTP | Nginx |
| Konteneryzacja | Docker Compose |

## Szybki start

```bash
git clone https://github.com/Bar-t-e-k/wdpai-project.git
cd wdpai-project
docker compose up --build -d
```

Aplikacja: http://localhost:8080

## 🛠️ Architektura i Komponenty

Aplikacja charakteryzuje się czystym podziałem odpowiedzialności (*Separation of Concerns*):

1. **Front Controller (`public/index.php`)**
   - Jedyny punkt wejścia do aplikacji.
   - Inicjalizuje autoloader Composera (`PSR-4`).
   - Przekazuje żądanie do systemu routingu.

2. **Warstwa Logiki (`src/`)**
   - **`Routing.php`**: Autorski system mapowania adresów URL z obsługą parametrów dynamicznych (np. `{id}`).
   - **`AppController.php`**: Abstrakcyjna klasa bazowa zapewniająca metodę `render()` do wstrzykiwania zmiennych i renderowania widoków.
   - **Kontrolery (`src/controllers/`)**: Klasy biznesowe (np. `PlaceController`, `DefaultController`) przetwarzające zapytania.

3. **Warstwa Prezentacji (`public/views/`)**
   - Szablony widoków z rozszerzeniem `.html.php`.
   - Odseparowana struktura HTML korzystająca ze stylów z `public/css/`.

4. **Infrastruktura Docker (`docker/`, `docker-compose.yaml`)**
   - **Nginx**: Serwer WWW przekazujący żądania HTTP do PHP-FPM.
   - **PHP-FPM**: Kontener wykonawczy z interpreterem PHP.
   - **Database**: Kontener bazodanowy.

## 📁 Struktura Projektu

```text
.
├── docker/              # Konfiguracja kontenerów (Dockerfile, nginx.conf)
├── public/              # Pliki publicznie dostępne
│   ├── css/             # Arkusze stylów CSS
│   ├── views/           # Szablony widoków (.html.php)
│   └── index.php        # Front Controller
├── src/                 # Kod źródłowy aplikacji (App\)
│   ├── controllers/     # Kontrolery MVC
│   ├── AppController.php# Bazowy kontroler
│   └── Routing.php      # Engine routingu
├── AGENTS.md            # Instrukcje i wytyczne dla agentów AI
├── docker-compose.yaml  # Definicja usług Docker
└── composer.json        # Zarządzanie zależnościami i autoloading PSR-4
```

## Zasady developmentu

- Sekrety wyłącznie w .env.

## Autor

- Bartłomiej Zięcina