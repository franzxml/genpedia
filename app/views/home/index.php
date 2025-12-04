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
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="card-content">
                        <h3>Karakter</h3>
                        <p>Kelola data karakter, vision, dan role party.</p>
                    </div>
                    <div class="card-arrow">→</div>
                </a>

                <a href="<?= BASEURL; ?>/senjata" class="category-card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="14.5" y1="17.5" x2="17.5" y2="14.5"></line>
                            <line x1="6.5" y1="9.5" x2="9.5" y2="6.5"></line>
                            <line x1="6.5" y1="14.5" x2="17.5" y2="3.5"></line>
                            <line x1="17.5" y1="9.5" x2="6.5" y2="20.5"></line>
                        </svg>
                    </div>
                    <div class="card-content">
                        <h3>Senjata</h3>
                        <p>Daftar senjata, tipe, dan statistik dasar.</p>
                    </div>
                    <div class="card-arrow">→</div>
                </a>

                <a href="<?= BASEURL; ?>/artefak" class="category-card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 2h8a2 2 0 0 1 2 2v2.5a5.5 5.5 0 0 1-5.5 5.5h-5A5.5 5.5 0 0 1 2 6.5V4a2 2 0 0 1 2-2z"></path>
                            <line x1="12" y1="12" x2="12" y2="18"></line>
                            <line x1="8" y1="18" x2="16" y2="18"></line>
                        </svg>
                    </div>
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