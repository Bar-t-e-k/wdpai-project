<section class="page auth-page">
    <section class="auth-card project-card">
        <header class="auth-heading">
            <span class="auth-eyebrow">Witaj ponownie</span>
            <h1>Logowanie</h1>
            <p>Zaloguj się, aby odkrywać ciche miejsca i dodawać własne pomiary.</p>
        </header>

        <?php if ($error !== null): ?>
            <p class="form-error" role="alert">
                <span aria-hidden="true">!</span>
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <form class="auth-form" action="/login" method="POST">
            <label class="form-field" for="email">
                <span class="form-label">Adres e-mail</span>
                <input class="form-control" type="email" id="email" name="email" required autocomplete="email" placeholder="ty@przyklad.pl">
            </label>
            <label class="form-field" for="password">
                <span class="form-label">Hasło</span>
                <input class="form-control" type="password" id="password" name="password" required autocomplete="current-password" placeholder="Wpisz swoje hasło">
            </label>
            <button class="form-submit btn-primary" type="submit">Zaloguj się <span aria-hidden="true">→</span></button>
        </form>

        <p class="auth-footer">
            Nie masz jeszcze konta?
            <a href="/register">Zarejestruj się</a>
        </p>
    </section>
</section>
