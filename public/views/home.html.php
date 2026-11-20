<div class="dashboard">
    <div class="system-pulse" aria-label="Stan systemu akustycznego">
        <div class="system-pulse__status">
            <span class="pulse-dot" aria-hidden="true"></span>
            <strong>Radar Ciszy</strong>
            <span>Monitor akustyczny aktywny</span>
        </div>
        <div class="system-pulse__metrics">
            <span><strong>14</strong> aktywnych stref</span>
            <span><strong>42.4 dB</strong> średnia miejska</span>
            <button class="system-pulse__action" type="button">+ Zarejestruj pomiar</button>
        </div>
    </div>

    <div class="dashboard-grid">
        <section class="map-view" id="map-container" aria-label="Mapa cichych miejsc">
            <div class="map-canvas" data-current-layer="azyl">
                <span class="map-canvas__title">Mapa</span>
            </div>
        </section>

        <aside class="sidebar-panel" aria-label="Wyniki dla Warszawy">
            <header class="result-header">
                <div>
                    <h2>Znaleziono azyle w Śródmieściu</h2>
                    <p>Skupisko: Powiśle, Warszawa</p>
                </div>
                <a href="/places" class="filter-link">Filtruj</a>
            </header>

            <article class="place-card place-card--featured">
                <div class="place-card__head">
                    <span class="tag">39 dB · Oaza Ciszy</span>
                    <small>Otwarty do 20:00</small>
                </div>
                <h3>Ogród BUW — Dziedziniec Różany</h3>
                <p class="place-card__meta">Relaks · Nauka · Powiśle</p>
                <dl class="place-card__metrics">
                    <div><dt>Szum fontanny</dt><dd>Tak · 28 dB</dd></div>
                    <div><dt>Cień / światło</dt><dd>85% cienia</dd></div>
                </dl>
                <footer class="place-card__footer">
                    <a href="/places/1" class="btn-primary">Nawiguj cichą trasą</a>
                    <a href="/places/1">Szczegóły →</a>
                </footer>
            </article>

            <article class="place-card">
                <div class="place-card__head">
                    <span class="tag tag-cyan">33 dB · Ultra-cicho</span>
                </div>
                <h3>Czytelnia Główna Biblioteki Rolniczej</h3>
                <p class="place-card__meta">Praca głęboka · Krakowskie Przedmieście</p>
                <p class="place-card__occupancy">Zajętość miejsc: <strong>35%</strong></p>
                <a href="/places/2" class="place-card__details">Zobacz indeks sensoryczny →</a>
            </article>

            <article class="place-card place-card--contribute">
                <h3>Znasz ukrytą oazę ciszy?</h3>
                <p>Pomóż innym odnaleźć spokój w mieście.</p>
                <a href="/places/add" class="btn-primary">+ Zarejestruj nowy obiekt</a>
            </article>
        </aside>
    </div>
</div>