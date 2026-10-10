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

## Struktura projektu

- public/ – punkt wejścia aplikacji (index.php) oraz zasoby statyczne (CSS, JS, uploady)

- src/ – obiektowa struktura backendu (kontrolery, serwisy, repozytoria)

- docker/ – pliki konfiguracyjne dla Nginx i PHP

## Zasady developmentu

- Sekrety wyłącznie w .env.

## Autor

- Bartłomiej Zięcina