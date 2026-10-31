<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Radar Ciszy — O projekcie') ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="page header-inner">
            <div class="logo-group">
                <span style="color: var(--color-brand); font-size: 1.4rem;">📡</span>
                <h1 class="logo-title">Radar Ciszy</h1>
            </div>

            <nav>
                <ul>
                    <li><a href="/">Eksploruj</a></li>
                    <li><a href="/places">Korytarze Ciszy</a></li>
                    <li><a href="/about" class="active">O projekcie</a></li>
                </ul>
            </nav>

            <div style="display: flex; align-items: center; gap: var(--space-2);">
                <a href="/places/add" class="btn-primary">+ Zarejestruj Nowy Obiekt</a>
            </div>
        </div>
    </header>

    <main class="page">
        <section class="project-card" style="max-width: 800px; margin: var(--space-4) auto;">
            <h1>O projekcie Radar Ciszy</h1>
            <p style="font-size: 1.1rem; color: var(--color-muted); margin-bottom: var(--space-3);">
                Radar Ciszy to inicjatywa mająca na celu mapowanie oaz spokoju w zgiełku współczesnych miast. 
                Wierzymy, że dostęp do ciszy jest fundamentalnym prawem każdego mieszkańca, wpływającym na zdrowie psychiczne i kreatywność.
            </p>

            <div style="display: grid; gap: var(--space-3); grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); margin-block: var(--space-4);">
                <article>
                    <h3 style="color: var(--color-brand);">Nasza Misja</h3>
                    <p style="color: var(--color-muted);">Dostarczanie precyzyjnych danych o natężeniu dźwięku w miejscach publicznych, abyś mógł znaleźć idealne miejsce do pracy, nauki lub odpoczynku.</p>
                </article>
                <article>
                    <h3 style="color: var(--color-cyan);">Technologia</h3>
                    <p style="color: var(--color-muted);">Wykorzystujemy pomiary w czasie rzeczywistym oraz dane od społeczności, tworząc unikalny indeks sensoryczny dla każdej lokalizacji.</p>
                </article>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--color-border); margin-block: var(--space-3);">

            <h2>Standard Sensoryczny PK</h2>
            <p>
                Wszystkie obiekty w naszej bazie są oceniane według rygorystycznych kryteriów natężenia dźwięku, oświetlenia oraz komfortu termicznego, 
                zgodnie z wytycznymi Standardu Sensorycznego Politechniki Krakowskiej.
            </p>

            <div style="margin-top: var(--space-4);">
                <a href="/" class="btn-primary">Wróć do mapy</a>
            </div>
        </section>
    </main>

    <footer class="page" style="border-top: 1px solid var(--color-border); margin-top: var(--space-4); padding-top: var(--space-2); color: var(--color-muted); font-size: 0.85rem; display: flex; justify-content: space-between;">
        <p>&copy; 2026 Radar Ciszy — Cyfrowa mapa ukojenia i azyl akustycznych.</p>
        <p>Karta Dobrego Wyciszenia | Standard Sensoryczny PK</p>
    </footer>
</body>
</html>
