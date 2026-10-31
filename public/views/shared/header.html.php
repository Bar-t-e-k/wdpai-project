<header class="site-header">
    <div class="page header-inner">
        <div class="logo-group">
            <span style="color: var(--color-brand); font-size: 1.4rem;">📡</span>
            <h1 class="logo-title">Radar Ciszy</h1>
        </div>

        <nav>
            <ul>
                <li><a href="/" class="<?= ($activePage ?? '') === 'home' ? 'active' : '' ?>">Eksploruj</a></li>
                <li><a href="/places" class="<?= ($activePage ?? '') === 'places' ? 'active' : '' ?>">Korytarze Ciszy</a></li>
                <li><a href="/about" class="<?= ($activePage ?? '') === 'about' ? 'active' : '' ?>">O projekcie</a></li>
                <li><a href="/places/add" class="<?= ($activePage ?? '') === 'add-place' ? 'active' : '' ?>">Decybelomierz Live</a></li>
            </ul>
        </nav>

        <div style="display: flex; align-items: center; gap: var(--space-2);">
            <?php if (($_SESSION['authenticated'] ?? false) === true): ?>
                <a href="/places/add" class="btn-primary">+ Zarejestruj Nowy Obiekt</a>
                <a href="/logout">Wyloguj</a>
            <?php else: ?>
                <a href="/login" class="btn-primary">Zaloguj</a>
            <?php endif; ?>
        </div>
    </div>
</header>
