<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>Genpedia</h1>
            <p>Database Lokal Genshin Impact Anda</p>
        </header>

        <main>
            <div class="welcome-box">
                <h2>Selamat Datang Traveler!</h2>
                <p>Aplikasi ini masih dalam tahap pengembangan.</p>
                <button id="btn-explore">Mulai Jelajahi</button>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 Genpedia Project</p>
        </footer>
    </div>

    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>