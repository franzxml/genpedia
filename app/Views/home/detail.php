<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['karakter']['name']; ?> - Genpedia Guide</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; margin: 0; padding: 20px; }
        
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        
        .header { display: flex; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 20px; margin-bottom: 20px; }
        .portrait { width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 5px solid #5a4da3; margin-right: 20px; }
        
        .info h1 { margin: 0 0 5px; font-size: 32px; color: #333; }
        .badge { padding: 5px 10px; border-radius: 5px; color: white; font-weight: bold; font-size: 14px; }
        
        /* Warna sama dengan index */
        .bg-Pyro { background-color: #ff5722; }
        .bg-Hydro { background-color: #03a9f4; }
        .bg-Anemo { background-color: #4caf50; }
        .bg-Electro { background-color: #9c27b0; }
        .bg-Dendro { background-color: #8bc34a; }
        .bg-Cryo { background-color: #00bcd4; }
        .bg-Geo { background-color: #ffc107; color: #333; }

        .content { line-height: 1.6; color: #444; font-size: 16px; white-space: pre-wrap; } 
        
        .btn-back { display: inline-block; margin-top: 30px; text-decoration: none; color: #5a4da3; font-weight: bold; }
        .btn-back:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="/genpedia/public/img/<?= $data['karakter']['portrait']; ?>" class="portrait" onerror="this.src='https://via.placeholder.com/150'">
            
            <div class="info">
                <h1><?= $data['karakter']['name']; ?></h1>
                <span class="badge bg-<?= $data['karakter']['element']; ?>">
                    Vision: <?= $data['karakter']['element']; ?>
                </span>
                <p><strong>Role:</strong> <?= $data['karakter']['role']; ?></p>
            </div>
        </div>

        <div class="content">
            <h3>Guide & Analisis</h3>
            <p><?= $data['karakter']['description'] ? $data['karakter']['description'] : '<em>Belum ada guide untuk karakter ini.</em>'; ?></p>
        </div>

        <a href="/genpedia/public" class="btn-back">← Kembali ke Daftar Karakter</a>
    </div>

</body>
</html>