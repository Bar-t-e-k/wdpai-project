<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Radar Ciszy') ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/shared/header.html.php'; ?>

    <main class="page dashboard-grid">

        <section class="map-view" id="map-container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div class="map-badge">
                    <span>📍 Warszawa — Powiśle & Śródmieście</span>
                </div>
                <div class="map-badge">
                    <span style="color: var(--color-brand);">LIVE MONITOR AKUSTYCZNY</span>
                </div>
            </div>

            <div id="osm-map-placeholder" style="text-align: center; margin-block: auto;">
                <p style="color: var(--color-muted); font-size: 1.1rem;">[ Interaktywna Mapa Radar Ciszy — OpenStreetMap / Leaflet ]</p>
                <span class="tag">35 dB Czysta cisza</span>
                <span class="tag tag-cyan">36-45 dB Oaza</span>
            </div>

            <div class="map-badge" style="width: 100%; justify-content: space-between;">
                <span>Średnia w rejonie: <strong>42.4 dB</strong></span>
                <span style="color: var(--color-brand);">-18% normy miejskiej</span>
            </div>
        </section>

        <aside class="sidebar-panel">
            <div class="project-card" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="font-size: 1.1rem; margin: 0;">Znaleziono azyle w Śródmieściu</h2>
                    <p style="color: var(--color-muted); font-size: 0.85rem; margin: 0;">Skupisko: Powiśle, Warszawa</p>
                </div>
                <a href="/places" class="tag tag-cyan">Filtruj</a>
            </div>

            <article class="project-card">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                    <span class="tag">39 dB avg • Oaza Ciszy</span>
                    <small style="color: var(--color-muted);">Otwarty do 20:00</small>
                </div>
                <h3>Ogród BUW — Dziedziniec Różany</h3>
                <p style="color: var(--color-muted); font-size: 0.9rem;">Relaks • Nauka • Warszawa Powiśle, ul. Dobra 56</p>
                
                <dl style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; font-size: 0.85rem; margin-block: 1rem;">
                    <div>
                        <dt style="color: var(--color-muted);">Szum fontanny:</dt>
                        <dd style="margin: 0; font-weight: 600;">Tak (28 dB)</dd>
                    </div>
                    <div>
                        <dt style="color: var(--color-muted);">Cień / Światło:</dt>
                        <dd style="margin: 0; font-weight: 600;">85% Cienia</dd>
                    </div>
                </dl>

                <footer style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                    <a href="/places/1" class="btn-primary" style="font-size: 0.85rem; padding: 0.4rem 1rem;">Nawiguj Cichą trasą</a>
                    <a href="/places/1" style="font-size: 0.85rem;">Szczegóły &rarr;</a>
                </footer>
            </article>

            <article class="project-card">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                    <span class="tag tag-cyan">33 dB • Ultra-cicho</span>
                </div>
                <h3>Czytelnia Główna Biblioteki Rolniczej</h3>
                <p style="color: var(--color-muted); font-size: 0.9rem;">Praca Głęboka • Krakowskie Przedmieście</p>
                <p style="font-size: 0.85rem;">Zajętość miejsc: <strong>35%</strong> | Ergonomiczne fotele, pętla indukcyjna</p>
                <a href="/places/2" style="font-size: 0.85rem;">Zobacz indeks sensoryczny &rarr;</a>
            </article>

            <article class="project-card" style="border-style: dashed; text-align: center;">
                <h3>Znasz ukrytą oazę ciszy?</h3>
                <p style="color: var(--color-muted); font-size: 0.85rem;">Pomóż innym odnaleźć spokój w mieście. Dodaj nowy pomiar.</p>
                <a href="/places/add" class="btn-primary" style="margin-top: 0.5rem;">+ Zarejestruj Nowy Obiekt</a>
            </article>
        </aside>
    </main>

    <footer class="page" style="border-top: 1px solid var(--color-border); margin-top: var(--space-4); padding-top: var(--space-2); color: var(--color-muted); font-size: 0.85rem; display: flex; justify-content: space-between;">
        <p>&copy; 2026 Radar Ciszy — Cyfrowa mapa ukojenia i azyl akustycznych.</p>
        <p>Karta Dobrego Wyciszenia | Standard Sensoryczny PK</p>
    </footer>
</body>
</html>