<div class="moderation-page">
    <header class="moderation-heading">
        <div>
            <span class="moderation-eyebrow">Administracja systemu</span>
            <h1>Centrum Weryfikacji Akustycznej</h1>
            <p>Zarządzanie zgłoszeniami, pomiarami i treściami społeczności.</p>
        </div>
        <div class="moderation-status">
            <span class="pulse-dot" aria-hidden="true"></span>
            System działa
        </div>
    </header>

    <section class="moderation-metrics" aria-label="Statystyki moderacji">
        <article>
            <span>Zgłoszenia oczekujące</span>
            <strong>14</strong>
            <small>+3 od ostatniej sesji</small>
        </article>
        <article>
            <span>Weryfikowane pomiary</span>
            <strong>5</strong>
            <small>2 wymagają ponownego pomiaru</small>
        </article>
        <article>
            <span>Alerty akustyczne</span>
            <strong>18</strong>
            <small>W 3 lokalizacjach</small>
        </article>
        <article>
            <span>Treści do przeglądu</span>
            <strong>7</strong>
            <small>Forum i opinie</small>
        </article>
    </section>

    <div class="moderation-layout">
        <main class="moderation-queue">
            <header class="moderation-section-heading">
                <div>
                    <h2>Kolejka weryfikacyjna</h2>
                    <p>Zgłoszenia wymagające działania moderatora</p>
                </div>
                <span>14 aktywnych</span>
            </header>

            <article class="moderation-item">
                <header>
                    <span class="moderation-badge moderation-badge--danger">Pomiar bez krytyczny</span>
                    <time datetime="2026-11-20T11:12:00">20 min temu</time>
                </header>
                <h3>Kawiarnia „Cicha Przystań” — wartości poza zakresem</h3>
                <p>Użytkownik zgłosił średni poziom 26 dB, ale ostatni pomiar przekroczył 68 dB.</p>
                <footer>
                    <span>Miejsce #48</span>
                    <span>Zgłaszający: użytkownik #402</span>
                    <div>
                        <button class="btn-secondary" type="button">Odrzuć</button>
                        <button class="btn-primary" type="button">Zatwierdź ponowny pomiar</button>
                    </div>
                </footer>
            </article>

            <article class="moderation-item">
                <header>
                    <span class="moderation-badge moderation-badge--warning">Weryfikacja obiektu</span>
                    <time datetime="2026-11-20T10:48:00">44 min temu</time>
                </header>
                <h3>Nowy obiekt „Ogród przy ul. Siennej”</h3>
                <p>Zgłoszono lokalizację, kategorię i opis sensoryczny; potrzebna jest weryfikacja danych.</p>
                <footer>
                    <span>Miejsce nowego zgłoszenia</span>
                    <span>Zgłaszający: użytkownik #315</span>
                    <div>
                        <button class="btn-secondary" type="button">Poproś o dane</button>
                        <button class="btn-primary" type="button">Zatwierdź obiekt</button>
                    </div>
                </footer>
            </article>

            <article class="moderation-item">
                <header>
                    <span class="moderation-badge">Treść społeczności</span>
                    <time datetime="2026-11-20T09:20:00">2 h temu</time>
                </header>
                <h3>Post o pomiarach w bibliotece — wymagane przeglądnięcie</h3>
                <p>Treść zawiera dane adresowe i mogła ujawniać informacje o konkretnej osobie.</p>
                <footer>
                    <span>Forum / Badania i pomiary</span>
                    <span>Zgłoszenie moderacyjne</span>
                    <div>
                        <button class="btn-secondary" type="button">Ukryj wpis</button>
                        <button class="btn-primary" type="button">Oznacz jako bezpieczny</button>
                    </div>
                </footer>
            </article>
        </main>

        <aside class="moderation-sidebar">
            <section>
                <header>
                    <h2>Aktywność systemu</h2>
                    <span>Na żywo</span>
                </header>
                <div class="moderation-activity">
                    <div><strong>128</strong><span>dzisiejszych pomiarów</span></div>
                    <div><strong>96%</strong><span>udane przesłania</span></div>
                    <div><strong>18</strong><span>aktywne alerty</span></div>
                </div>
            </section>

            <section>
                <header>
                    <h2>Ostatnie decyzje</h2>
                </header>
                <ul class="moderation-decisions">
                    <li><span>Zatwierdzono</span><strong>Nowa lokalizacja #44</strong></li>
                    <li><span>Zweryfikowano</span><strong>Pomiar #1208</strong></li>
                    <li><span>Ukryto</span><strong>Treść #731</strong></li>
                </ul>
            </section>
        </aside>
    </div>
</div>
