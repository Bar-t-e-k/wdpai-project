<section class="page auth-page">
    <section class="auth-card surface-card">
        <header class="auth-heading">
            <span class="auth-eyebrow">Dołącz do społeczności</span>
            <h1>Załóż konto</h1>
            <p>Stwórz konto i pomagaj innym odnajdywać spokojne miejsca w mieście.</p>
        </header>

        <?php if ($error !== null): ?>
            <p class="form-error" role="alert">
                <span aria-hidden="true">!</span>
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <form class="auth-form" action="/register" method="POST">
            <label class="form-field" for="email">
                <span class="form-label">Adres e-mail</span>
                <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required autocomplete="email" placeholder="ty@przyklad.pl">
            </label>
            <label class="form-field" for="password">
                <span class="form-label">Hasło</span>
                <input class="form-control" type="password" id="password" name="password" minlength="6" required autocomplete="new-password" placeholder="Minimum 6 znaków">
            </label>
            <label class="form-field" for="password_confirmation">
                <span class="form-label">Powtórz hasło</span>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" minlength="6" required autocomplete="new-password" placeholder="Wpisz hasło ponownie">
            </label>
            <button class="form-submit btn-primary" type="submit">Utwórz konto <span aria-hidden="true">→</span></button>
        </form>

        <p class="auth-footer">
            Masz już konto?
            <a href="/login">Zaloguj się</a>
        </p>
    </section>
</section>
