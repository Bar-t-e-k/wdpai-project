<div class="place-detail-page">
    <nav class="place-breadcrumb" aria-label="Okruszki">
        <a href="/places">Katalog miejsc</a>
        <span aria-hidden="true">→</span>
        <span><?= htmlspecialchars($placeName) ?></span>
    </nav>

    <header class="place-detail-heading">
        <div>
            <span class="place-detail-eyebrow"><?= htmlspecialchars($placeCategory) ?></span>
            <h1><?= htmlspecialchars($placeName) ?></h1>
            <p><?= htmlspecialchars($placeLocation) ?></p>
        </div>
        <div class="place-detail-actions">
            <a class="btn-secondary" href="/places">← Powrót</a>
            <button class="btn-primary" type="button">Nawiguj cichą trasą</button>
        </div>
    </header>

    <div class="place-detail-layout">
        <main class="place-detail-main">
            <section class="place-detail-card" aria-labelledby="sensory-heading">
                <div class="place-detail-card__heading">
                    <div>
                        <span class="place-detail-eyebrow">Indeks sensoryczny</span>
                        <h2 id="sensory-heading">Warunki miejsca</h2>
                    </div>
                    <span class="sensory-score"><?= htmlspecialchars($sensoryScore) ?></span>
                </div>

                <dl class="place-detail-metrics">
                    <div>
                        <dt>Natężenie dźwięku</dt>
                        <dd><strong><?= (int)$noiseLevel ?></strong> dB</dd>
                    </div>
                    <div>
                        <dt>Oświetlenie</dt>
                        <dd><?= htmlspecialchars($placeLight) ?></dd>
                    </div>
                    <div>
                        <dt>Zagęszczenie</dt>
                        <dd><?= htmlspecialchars($placeCrowd) ?></dd>
                    </div>
                    <div>
                        <dt>Zapachy</dt>
                        <dd><?= htmlspecialchars($placeScent) ?></dd>
                    </div>
                </dl>
            </section>

            <section class="place-detail-card" aria-labelledby="noise-chart-heading">
                <div class="place-detail-card__heading">
                    <div>
                        <span class="place-detail-eyebrow">Ostatnie pomiary</span>
                        <h2 id="noise-chart-heading">Rozkład hałasu w ciągu dnia</h2>
                    </div>
                    <span class="place-detail-verified">Weryfikacja: <?= htmlspecialchars($lastUpdated) ?></span>
                </div>

                <div class="noise-chart" aria-label="Wykres natężenia hałasu">
                    <?php foreach ($noiseHistory as $index => $value): ?>
                        <div class="noise-chart__column">
                            <?php
                            $noiseHeightClass = 'noise-height-' . max(20, min(60, (int)(ceil($value / 10) * 10)));
                            ?>
                            <span
                                class="noise-chart__bar <?= $noiseHeightClass ?>"
                                title="<?= (int)$value ?> dB"
                            ></span>
                            <?php if ($index % 2 === 0): ?>
                                <small><?= sprintf('%02d:00', 8 + $index) ?></small>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="place-detail-note">
                    Najspokojniejsze godziny: <strong><?= htmlspecialchars($quietHours) ?></strong>
                </p>
            </section>

            <section class="place-detail-card" aria-labelledby="reviews-heading">
                <div class="place-detail-card__heading">
                    <div>
                        <span class="place-detail-eyebrow">Społeczność</span>
                        <h2 id="reviews-heading">Opinie i zgłoszenia</h2>
                    </div>
                </div>
                <article class="place-review">
                    <header>
                        <h3><?= htmlspecialchars($placeReview['author']) ?></h3>
                        <time datetime="<?= htmlspecialchars($placeReview['datetime']) ?>">
                            <?= htmlspecialchars($placeReview['date']) ?>
                        </time>
                    </header>
                    <p><?= htmlspecialchars($placeReview['text']) ?></p>
                </article>
            </section>
        </main>

        <aside class="place-detail-summary">
            <h2>Podsumowanie</h2>
            <div class="place-detail-summary__noise">
                <span>Aktualny poziom</span>
                <strong><?= (int)$noiseLevel ?> dB</strong>
            </div>
            <dl>
                <div><dt>Kategoria</dt><dd><?= htmlspecialchars($placeCategory) ?></dd></div>
                <div><dt>Indeks</dt><dd><?= htmlspecialchars($sensoryScore) ?></dd></div>
                <div><dt>Weryfikacja</dt><dd><?= htmlspecialchars($lastUpdated) ?></dd></div>
            </dl>
            <a class="btn-primary place-detail-summary__action" href="/places">Porównaj inne miejsca</a>
        </aside>
    </div>
</div>