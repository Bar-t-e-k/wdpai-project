<header class="site-header">
    <div class="page header-inner">
        <a class="logo-group" href="/" aria-label="Radar Ciszy — strona główna">
            <span class="logo-mark" aria-hidden="true"></span>
            <span class="logo-title">Radar Ciszy</span>
        </a>

        <nav class="main-nav" aria-label="Główna nawigacja">
            <ul class="main-nav__list">
                <li><a class="main-nav__link <?= ($activePage ?? '') === 'home' ? 'active' : '' ?>" href="/">Eksploruj</a></li>
                <li><a class="main-nav__link <?= ($activePage ?? '') === 'places' ? 'active' : '' ?>" href="/places">Korytarze Ciszy</a></li>
                <li><a class="main-nav__link <?= ($activePage ?? '') === 'community' ? 'active' : '' ?>" href="/community">Społeczność</a></li>
                <li><a class="main-nav__link <?= ($activePage ?? '') === 'about' ? 'active' : '' ?>" href="/about">O projekcie</a></li>
                <li><a class="main-nav__link <?= ($activePage ?? '') === 'add-place' ? 'active' : '' ?>" href="/places/add">Decybelomierz Live</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <?php if (($_SESSION['authenticated'] ?? false) === true): ?>
                <a href="/places/add" class="btn-primary header-actions__primary">+ Zarejestruj obiekt</a>
                <a class="header-actions__link" href="/logout">Wyloguj</a>
            <?php else: ?>
                <a href="/login" class="btn-primary header-actions__primary">Zaloguj</a>
                <a class="header-actions__link" href="/register">Rejestracja</a>
            <?php endif; ?>
        </div>
    </div>
</header>
