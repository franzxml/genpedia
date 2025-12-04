<main class="home-page">
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Selamat Datang di Genpedia</h1>
            <p class="hero-subtitle">
                Database lokal pribadi Anda untuk mengelola data Genshin Impact.<br>
                Akses informasi Karakter, Senjata, dan Artefak dengan cepat dan mudah.
            </p>
        </div>
    </section>

    <section class="category-section">
        <div class="container">
            <div class="category-grid">
                
                <a href="<?= BASEURL; ?>/karakter" class="category-card">
                    <div class="card-icon">👤</div>
                    <div class="card-content">
                        <h3>Karakter</h3>
                        <p>Kelola data karakter, vision, dan role party.</p>
                    </div>
                    <div class="card-arrow">→</div>
                </a>

                <a href="<?= BASEURL; ?>/senjata" class="category-card">
                    <div class="card-icon">⚔️</div>
                    <div class="card-content">
                        <h3>Senjata</h3>
                        <p>Daftar senjata, tipe, dan statistik dasar.</p>
                    </div>
                    <div class="card-arrow">→</div>
                </a>

                <a href="<?= BASEURL; ?>/artefak" class="category-card">
                    <div class="card-icon">🏆</div>
                    <div class="card-content">
                        <h3>Artefak</h3>
                        <p>Set artefak, bonus set, dan rekomendasi build.</p>
                    </div>
                    <div class="card-arrow">→</div>
                </a>

            </div>
        </div>
    </section>
</main>