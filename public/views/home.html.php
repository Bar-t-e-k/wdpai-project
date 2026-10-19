<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
</head>
<body>
    <header>
        <h1>Cichy Azyl</h1>
        <nav>
            <ul>
                <li><a href="/">Mapa żywa</a></li>
                <li><a href="/places">Katalog miejsc</a></li>
                <li><a href="/places/add">Dodaj strefę / Zmierz hałas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="map-container">
            <h2>Mapa nasycenia sensorycznego</h2>
            <p>Aktywne strefy w mieście: <strong><?= (int)$activeZonesCount ?></strong> | Średni poziom hałasu: <strong><?= htmlspecialchars($avgCityNoise) ?></strong></p>
            <div id="osm-map-placeholder">
                <!-- Podpięcie OpenStreetMap / Leaflet na kolejnych laboratoriach -->
                <p>[Interaktywna Mapa OpenStreetMap]</p>
            </div>
        </section>

        <aside>
            <h2>Podgląd wybranego miejsca</h2>
            <article>
                <h3>Parkowa Altana Wyciszenia</h3>
                <dl>
                    <dt>Aktualny poziom hałasu:</dt>
                    <dd>28 dB</dd>
                    <dt>Natężenie światła:</dt>
                    <dd>Cień / Naturalne</dd>
                    <dt>Tłok:</dt>
                    <dd>Znikomy</dd>
                </dl>
                <a href="/places/1">Otwórz pełny indeks sensoryczny</a>
            </article>
        </aside>
    </main>

    <footer>
        <p>&copy; 2026 Cichy Azyl – System monitorowania przebodźcowania.</p>
    </footer>
</body>
</html>