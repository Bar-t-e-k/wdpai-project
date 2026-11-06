<div class="page">
        <section class="project-card" style="max-width: 32rem; margin: var(--space-4) auto;">
            <h1>Logowanie</h1>
            <p style="color: var(--color-muted);">
                Zaloguj się, aby przejść do panelu dodawania miejsc.
            </p>

            <?php if ($error !== null): ?>
                <p style="color: var(--color-danger);" role="alert">
                    <?= htmlspecialchars($error) ?>
                </p>
            <?php endif; ?>

            <form action="/login" method="POST">
                <p>
                    <label for="email">Adres e-mail:</label><br>
                    <input type="email" id="email" name="email" required autocomplete="email" style="width: 100%;">
                </p>
                <p>
                    <label for="password">Hasło:</label><br>
                    <input type="password" id="password" name="password" required autocomplete="current-password" style="width: 100%;">
                </p>
                <button type="submit">Zaloguj</button>
            </form>
        </section>
</div>
