<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="page header-inner">
            <h1><?= htmlspecialchars($placeName) ?> (ID: <?= (int)$placeId ?>)</h1>
            <nav>
                <a href="/places">← Powrót do listy</a>
            </nav>
        </div>
    </header>

    <main class="page">
        <article class="project-card">
            <header>
                <h2>Ogólny Indeks Sensoryczny: <?= htmlspecialchars($sensoryScore) ?></h2>
                <p>Ostatnia weryfikacja społeczności: <time><?= htmlspecialchars($lastUpdated) ?></time></p>
            </header>

            <section>
                <h3>Wskaźniki warunków otoczenia</h3>
                <ul>
                    <li><strong>Natężenie dźwięku:</strong> <?= (int)$noiseLevel ?> dB</li>
                    <li><strong>Oświetlenie:</strong> Brak sztucznych pulsujących źródeł światła</li>
                    <li><strong>Zapachy:</strong> Neutralne / Brak intensywnej chemii</li>
                </ul>
            </section>

            <section>
                <h3>Rozkład natężenia hałasu w ciągu dnia</h3>
                <figure>
                    <p>[Wykres natężenia hałasu w godzinach 08:00 - 22:00]</p>
                    <figcaption>Najspokojniejsze godziny: 10:00 – 14:00 oraz po 18:00</figcaption>
                </figure>
            </section>

            <section>
                <h3>Opinie i zgłoszenia użytkowników</h3>
                <article class="project-card" style="margin-top: var(--space-2);">
                    <header>
                        <h4>Użytkownik #402</h4>
                        <time datetime="2026-10-18">18 października 2026</time>
                    </header>
                    <p>Miejsce jest niezwykle ciche. Świetne miejsce na ucieczkę od hałasu miejskiego.</p>
                </article>
            </section>
        </article>
    </main>

    <footer class="page">
        <p>Aplikacja Cichy Azyl</p>
    </footer>
</body>
</html>