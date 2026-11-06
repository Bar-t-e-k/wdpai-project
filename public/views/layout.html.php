<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Radar Ciszy') ?></title>
    <script>
    (function () {
        const storageKey = 'theme';
        let savedTheme = null;

        try {
            savedTheme = localStorage.getItem(storageKey);
        } catch (error) {
            savedTheme = null;
        }

        const hasSavedTheme = savedTheme === 'light' || savedTheme === 'dark';
        const systemPrefersDark = window.matchMedia(
            '(prefers-color-scheme: dark)'
        ).matches;

        document.documentElement.dataset.theme = hasSavedTheme
            ? savedTheme
            : (systemPrefersDark ? 'dark' : 'light');
    })();
</script>

    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/theme.js" defer></script>
</head>
<body>
    <button
        class="theme-toggle"
        type="button"
        aria-label="Włącz ciemny motyw"
        aria-pressed="false"
        title="Zmień motyw"
    > 
        <span class="theme-toggle__icon" aria-hidden="true">🌙</span>
    </button>
    <?php include __DIR__ . '/shared/header.html.php'; ?>

    <main>
        <?= $content ?>
    </main>

    <footer class="page" style="border-top: 1px solid var(--color-border); margin-top: var(--space-4); padding-top: var(--space-2); color: var(--color-muted); font-size: 0.85rem; display: flex; justify-content: space-between;">
        <p>&copy; 2026 Radar Ciszy — Cyfrowa mapa ukojenia i azyl akustycznych.</p>
        <p>Karta Dobrego Wyciszenia | Standard Sensoryczny PK</p>
    </footer>
</body>
</html>
