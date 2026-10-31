<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/shared/header.html.php'; ?>

    <main class="page">
        <h1><?= htmlspecialchars($pageTitle) ?></h1>
        <section style="margin-bottom: var(--space-3);">
            <h2>Filtruj przestrzenie</h2>
            <form action="/places" method="GET">
                <fieldset class="actions">
                    <legend>Kryteria sensoryczne</legend>
                    
                    <label for="category">Kategoria:</label>
                    <select id="category" name="category">
                        <option value="">Wszystkie</option>
                        <option value="park">Parki i Natura</option>
                        <option value="cafe">Ciche Kawiarnie</option>
                        <option value="library">Biblioteki i Uczelnie</option>
                    </select>

                    <label for="max-noise">Maksymalny hałas (dB):</label>
                    <input type="range" id="max-noise" name="max_noise" min="20" max="60" value="40">

                    <button type="submit">Zastosuj filtry</button>
                </fieldset>
            </form>
        </section>

        <section>
            <h2>Odnalezione strefy wyciszenia</h2>

            <div class="projects">
                <?php foreach ($placesList as $place): ?>
                    <article class="project-card">
                        <header>
                            <h3><?= htmlspecialchars($place['name']) ?></h3>
                            <p><small><?= htmlspecialchars($place['category']) ?></small></p>
                        </header>
                        
                        <dl>
                            <dt>Poziom hałasu:</dt>
                            <dd><strong><?= htmlspecialchars($place['noise']) ?></strong></dd>
                            
                            <dt>Światło:</dt>
                            <dd><?= htmlspecialchars($place['light']) ?></dd>
                            
                            <dt>Zagęszczenie ludzi:</dt>
                            <dd><?= htmlspecialchars($place['crowd']) ?></dd>
                        </dl>

                        <footer>
                            <a href="/places/<?= (int)$place['id'] ?>">Zobacz historię pomiarów i szczegóły</a>
                        </footer>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="page">
        <p>Cichy Azyl – Filtrowanie wielokryterialne dla komfortu psychicznego.</p>
    </footer>
</body>
</html>