<div class="community-page">
    <header class="community-heading">
        <div>
            <span class="community-eyebrow">Społeczność</span>
            <h1>Doświadczenia i baza wiedzy</h1>
            <p>Wymieniaj wiedzę o cichych miejscach i akustycznym dobrostanie przestrzeni.</p>
        </div>
        <button class="btn-primary" type="button">+ Nowy wpis</button>
    </header>

    <form class="community-search" action="/community" method="GET">
        <label for="community-query">Szukaj w dyskusjach i bazie wiedzy</label>
        <input
            type="search"
            id="community-query"
            name="q"
            placeholder="Np. hałas, higiena snu, wyciszanie..."
        >
        <button class="btn-primary" type="submit">Szukaj</button>
    </form>

    <div class="community-layout">
        <aside class="community-categories" aria-label="Kategorie społeczności">
            <h2>Kategorie</h2>
            <nav>
                <a class="active" href="/community">Wszystkie wpisy <span>24</span></a>
                <a href="/community?category=places">Ciche miejsca <span>12</span></a>
                <a href="/community?category=research">Badania i pomiary <span>7</span></a>
                <a href="/community?category=accessibility">Dostępność <span>5</span></a>
                <a href="/community?category=guides">Poradniki <span>6</span></a>
            </nav>

            <div class="community-tip">
                <strong>Przestrzeń opinii</strong>
                <p>Dziel się obserwacją tylko na podstawie własnego, spokojnego pomiaru.</p>
            </div>
        </aside>

        <main class="community-feed">
            <header class="community-feed__header">
                <div>
                    <h2>Najnowsze dyskusje</h2>
                    <p>Aktualne rozmowy społeczności Radar Ciszy</p>
                </div>
                <span>Sortuj: Najnowsze</span>
            </header>

            <article class="community-post community-post--featured">
                <header>
                    <span class="tag">Badania i pomiary</span>
                    <time datetime="2026-11-20T10:30:00">Dzisiaj, 10:30</time>
                </header>
                <h3>Jak przedstawić nagłe piki hałasu bez zniekształcania średniego poziomu?</h3>
                <p>Warto rozdzielić średnią, percentyl 95 i liczbę zdarzeń przekraczających 55 dB...</p>
                <footer>
                    <span>Autor: Marta Z.</span>
                    <span>12 odpowiedzi</span>
                    <span>34 obserwujące</span>
                </footer>
            </article>

            <article class="community-post">
                <header>
                    <span class="tag tag-cyan">Ciche miejsca</span>
                    <time datetime="2026-11-19T16:10:00">Wczoraj, 16:10</time>
                </header>
                <h3>Czy ogród w centrum może być cichy także w godzinach popołudniowych?</h3>
                <p>Dziś wykonaliśmy serię pomiarów przy południowej granicy ogrodu...</p>
                <footer>
                    <span>Autor: Adam K.</span>
                    <span>8 odpowiedzi</span>
                    <span>21 obserwujących</span>
                </footer>
            </article>

            <article class="community-post">
                <header>
                    <span class="tag">Poradniki</span>
                    <time datetime="2026-11-18T09:45:00">18 listopada, 09:45</time>
                </header>
                <h3>Co sprawdzić przed publikacją pomiaru z telefonu?</h3>
                <p>Pozycja urządzenia, odległość od źródła dźwięku i kalibracja mają kluczowe znaczenie...</p>
                <footer>
                    <span>Autor: Zespół Weryfikacji</span>
                    <span>15 odpowiedzi</span>
                    <span>42 obserwujących</span>
                </footer>
            </article>
        </main>

        <aside class="community-knowledge" aria-label="Baza wiedzy">
            <h2>Baza wiedzy</h2>

            <a href="/about">
                <span>Artykuł</span>
                <strong>Jak czytać indeks sensoryczny?</strong>
                <small>5 min czytania</small>
            </a>
            <a href="/about">
                <span>Przewodnik</span>
                <strong>Prawidłowy pomiar natężenia hałasu</strong>
                <small>7 min czytania</small>
            </a>
            <a href="/about">
                <span>Standard</span>
                <strong>Standard Sensoryczny PK</strong>
                <small>Dokument informacyjny</small>
            </a>

            <section class="community-stat">
                <strong>84%</strong>
                <span>pomiarów społeczności potwierdzonych ponownie</span>
            </section>
        </aside>
    </div>
</div>
