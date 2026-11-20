<div class="places-page">
    <header class="places-heading">
        <div>
            <span class="places-eyebrow">Wyszukiwarka i porównywarka</span>
            <h1><?= htmlspecialchars($pageTitle) ?></h1>
        </div>
        <a class="btn-primary" href="/places/add">+ Zarejestruj pomiar</a>
    </header>

    <form class="places-search" action="/places" method="GET">
        <label class="places-search__query" for="search">
            <span>Szukaj miejsca</span>
            <input
                type="search"
                id="search"
                name="search"
                value="<?= htmlspecialchars($search) ?>"
                placeholder="Nazwa, dzielnica lub kategoria"
            >
        </label>

        <label for="category">
            <span>Kategoria</span>
            <select id="category" name="category">
                <option value="" <?= $category === '' ? 'selected' : '' ?>>Wszystkie</option>
                <option value="park" <?= $category === 'park' ? 'selected' : '' ?>>Parki i natura</option>
                <option value="cafe" <?= $category === 'cafe' ? 'selected' : '' ?>>Ciche kawiarnie</option>
                <option value="library" <?= $category === 'library' ? 'selected' : '' ?>>Biblioteki i uczelnie</option>
            </select>
        </label>

        <label for="max-noise">
            <span>Maksymalny hałas</span>
            <div class="places-search__range">
                <input type="range" id="max-noise" name="max_noise" min="20" max="60" value="<?= (int)$maxNoise ?>">
                <output for="max-noise"><?= (int)$maxNoise ?> dB</output>
            </div>
        </label>

        <button class="btn-primary places-search__submit" type="submit">Zastosuj filtry</button>
    </form>

    <section class="places-results" aria-label="Odnalezione strefy wyciszenia">
        <header class="places-results__header">
            <div>
                <h2>Odnalezione strefy</h2>
                <p><?= count($placesList) ?> miejsc dopasowanych do kryteriów</p>
            </div>
            <div class="places-view-toggle" aria-label="Tryb widoku">
                <span class="active" aria-current="page">Lista</span>
            </div>
        </header>

        <div class="places-layout">
            <div class="places-list">
                <?php foreach ($placesList as $place): ?>
                    <article class="place-result">
                        <div class="place-result__main">
                            <div class="place-result__head">
                                <span class="tag <?= (int)$place['noiseDb'] <= 30 ? 'tag-cyan' : '' ?>">
                                    <?= (int)$place['noiseDb'] ?> dB
                                </span>
                                <span class="place-result__category"><?= htmlspecialchars($place['category']) ?></span>
                            </div>
                            <h3><?= htmlspecialchars($place['name']) ?></h3>
                            <p><?= htmlspecialchars($place['location']) ?></p>

                            <dl class="place-result__metrics">
                                <div>
                                    <dt>Światło</dt>
                                    <dd><?= htmlspecialchars($place['light']) ?></dd>
                                </div>
                                <div>
                                    <dt>Zagęszczenie</dt>
                                    <dd><?= htmlspecialchars($place['crowd']) ?></dd>
                                </div>
                            </dl>
                        </div>

                        <footer class="place-result__footer">
                            <label>
                                <input type="checkbox" name="compare_place[]" value="<?= (int)$place['id'] ?>">
                                Dodaj do porównania
                            </label>
                            <a href="/places/<?= (int)$place['id'] ?>">Zobacz szczegóły →</a>
                        </footer>
                    </article>
                <?php endforeach; ?>

                <?php if ($placesList === []): ?>
                    <p class="places-empty">Nie znaleziono miejsc spełniających wybrane kryteria.</p>
                <?php endif; ?>
            </div>

            <aside class="places-compare" aria-label="Porównywarka miejsc">
                <div class="places-compare__heading">
                    <h2>Porównanie</h2>
                    <span>0 miejsc</span>
                </div>
                <p>Dodaj co najmniej dwa miejsca, aby porównać ich parametry sensoryczne.</p>
            </aside>
        </div>
    </section>
</div>