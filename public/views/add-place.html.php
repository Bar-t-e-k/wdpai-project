<div class="page hero">
        <h1>Zgłoś nową strefę / Przeprowadź pomiar live</h1>
        <section class="surface-card">
            <h2>Pomiar hałasu otoczenia (Web Audio API)</h2>
            <p>Dopuszczalna prosta norma dla cichej strefy: <strong><?= (int)$maxAllowedNoise ?> dB</strong></p>
            
            <p><button type="button" id="start-mic">Uruchom mikrofon i zmierz dB</button></p>
            <p><meter id="noise-meter" min="0" max="100" low="35" high="55" optimum="25" value="0">0 dB</meter></p>
            <output id="noise-value">Kliknij przycisk, aby rozpocząć pomiar...</output>
        </section>

        <section class="surface-card">
            <h2>Formularz dodawania mikrolokalizacji</h2>
            <form action="/places/add" method="POST">
                <?php if ($error !== null): ?>
                    <p class="form-error" role="alert"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <p>
                    <label for="name">Nazwa azylu:</label><br>
                    <input class="form-control-full" type="text" id="name" name="name" required value="<?= htmlspecialchars($submitted['name']) ?>" placeholder="np. Zakątek w Ogrodzie Botanicznym">
                </p>

                <p>
                    <label for="category">Kategoria:</label><br>
                    <select class="form-control-full" id="category" name="category" required>
                        <option value="">Wybierz kategorię</option>
                        <option value="park" <?= $submitted['category'] === 'park' ? 'selected' : '' ?>>Park / Skwer</option>
                        <option value="kawiarnia" <?= $submitted['category'] === 'kawiarnia' ? 'selected' : '' ?>>Cicha kawiarnia</option>
                        <option value="biblioteka" <?= $submitted['category'] === 'biblioteka' ? 'selected' : '' ?>>Biblioteka / Czytelnia</option>
                        <option value="inne" <?= $submitted['category'] === 'inne' ? 'selected' : '' ?>>Inne miejsce</option>
                    </select>
                </p>

                <p>
                    <label for="noise-db">Poziom hałasu (dB):</label><br>
                    <input class="form-control-full" type="number" id="noise-db" name="noise_db" min="20" max="100" required value="<?= (int)($_POST['noise_db'] ?? 35) ?>">
                </p>

                <p>
                    <label for="description">Opis właściwości sensorycznych:</label><br>
                    <textarea class="form-control-full" id="description" name="description" rows="4" placeholder="Opisz oświetlenie, poziom hałasu, obecność tłumu..."><?= htmlspecialchars($submitted['description']) ?></textarea>
                </p>

                <button type="submit">Zapisz zgłoszenie</button>
            </form>
        </section>
</div>