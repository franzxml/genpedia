<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; margin: 0; padding: 0; }
        
        /* Navbar Sederhana */
        .navbar { background: #5a4da3; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { margin: 0; font-size: 24px; }
        .navbar a { color: white; text-decoration: none; background: rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 5px; }

        /* Container Grid */
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }

        /* Card Style */
        .card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        
        .card-img { width: 100%; height: 250px; object-fit: cover; background: #eee; }
        
        .card-body { padding: 15px; }
        .card-title { margin: 0 0 5px; font-size: 18px; color: #333; }
        .card-badge { display: inline-block; padding: 3px 8px; font-size: 12px; border-radius: 4px; color: white; margin-bottom: 10px; }
        
        /* Warna Element */
        .bg-Pyro { background-color: #ff5722; }
        .bg-Hydro { background-color: #03a9f4; }
        .bg-Anemo { background-color: #4caf50; }
        .bg-Electro { background-color: #9c27b0; }
        .bg-Dendro { background-color: #8bc34a; }
        .bg-Cryo { background-color: #00bcd4; }
        .bg-Geo { background-color: #ffc107; color: #333; }

        .btn-detail { display: block; width: 100%; text-align: center; background: #5a4da3; color: white; text-decoration: none; padding: 8px 0; border-radius: 5px; margin-top: 10px; }
        .btn-detail:hover { background: #473b85; }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Genpedia</h1>
        <a href="/genpedia/public/admin">Login Admin</a>
    </div>

    <div class="container">
        <h2 style="color: #444;">Daftar Karakter</h2>
        
        <div class="grid">
            <?php foreach ($data['karakter'] as $char) : ?>
                <div class="card">
                    <img src="/genpedia/public/img/<?= $char['portrait']; ?>" alt="<?= $char['name']; ?>" class="card-img" onerror="this.src='https://via.placeholder.com/200x250?text=No+Image'">
                    
                    <div class="card-body">
                        <span class="card-badge bg-<?= $char['element']; ?>">
                            <?= $char['element']; ?>
                        </span>

                        <h3 class="card-title"><?= $char['name']; ?></h3>
                        <p style="margin: 0; color: #666; font-size: 14px;"><?= $char['role']; ?></p>
                        
                        <a href="/genpedia/public/home/detail/<?= $char['id']; ?>" class="btn-detail">Lihat Guide</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>