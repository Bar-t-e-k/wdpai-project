<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
</head>
<body>
    <header>
        <h1>Zgłoś nową strefę / Przeprowadź pomiar live</h1>
        <nav>
            <a href="/">← Powrót na stronę główną</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Pomiar hałasu otoczenia (Web Audio API)</h2>
            <p>Dopuszczalna prosta norma dla cichej strefy: <strong><?= (int)$maxAllowedNoise ?> dB</strong></p>
            
            <button type="button" id="start-mic">Uruchom mikrofon i zmierz dB</button>
            <meter id="noise-meter" min="0" max="100" low="35" high="55" optimum="25" value="0">0 dB</meter>
            <output id="noise-value">Kliknij przycisk, aby rozpocząć pomiar...</output>
        </section>

        <section>
            <h2>Formularz dodawania mikrolokalizacji</h2>
            <form action="/places/add" method="POST">
                <p>
                    <label for="name">Nazwa azylu:</label><br>
                    <input type="text" id="name" name="name" required placeholder="np. Zakątek w Ogrodzie Botanicznym">
                </p>

                <p>
                    <label for="category">Kategoria:</label><br>
                    <select id="category" name="category" required>
                        <option value="park">Park / Skwer</option>
                        <option value="kawiarnia">Kawiarnia</option>
                        <option value="biblioteka">Biblioteka / Czytelnia</option>
                        <option value="inne">Inne miejsce</option>
                    </select>
                </p>

                <p>
                    <label for="description">Opis właściwości sensorycznych:</label><br>
                    <textarea id="description" name="description" rows="4" placeholder="Opisz oświetlenie, poziom hałasu, obecność tłumu..."></textarea>
                </p>

                <button type="submit">Zapisz zgłoszenie</button>
            </form>
        </section>
    </main>

    <footer>
        <p>Wszystkie pomiary są anonimowe i służą weryfikacji warunków otoczenia.</p>
    </footer>
</body>
</html>