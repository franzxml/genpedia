<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- RESET & BASIC --- */
        * { box-sizing: border-box; }
        body { 
            font-family: 'Nunito', sans-serif; margin: 0; padding: 0;
            background-color: #0c0f1d;
            background-image: 
                radial-gradient(white 1px, transparent 1px),
                radial-gradient(rgba(255,255,255,0.5) 1px, transparent 1px);
            background-size: 550px 550px, 350px 350px; 
            background-position: 0 0, 40px 60px;
            background-attachment: fixed;
            color: #ece5d8; min-height: 100vh;
        }
        
        /* Navbar */
        .navbar { 
            position: sticky; top: 0; z-index: 100; padding: 20px 60px; 
            display: flex; justify-content: space-between; align-items: center; 
            background: rgba(12, 15, 29, 0.95); backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05); 
        }
        
        .logo { 
            font-family: 'Cinzel', serif; font-size: 28px; 
            color: #fff; letter-spacing: 2px; font-weight: 700;
            text-decoration: none;
        }

        .btn-edit { 
            background: #fff; color: #0c0f1d; padding: 10px 25px; 
            text-decoration: none; border-radius: 50px; font-weight: 700; 
            font-size: 13px; text-transform: uppercase; letter-spacing: 1px;
            transition: all 0.2s ease; border: none;
        }
        .btn-edit:hover { background: #e2e8f0; transform: translateY(-1px); }

        /* --- HERO SECTION --- */
        .hero {
            position: relative; height: 400px;
            overflow: hidden; display: flex; align-items: flex-end; padding-bottom: 60px;
        }
        
        .hero-bg {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover; background-position: center;
            filter: blur(12px) brightness(0.5);
            z-index: 0; transform: scale(1.1);
        }
        
        .hero-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to top, #0c0f1d 10%, transparent 100%);
            z-index: 1;
        }

        .container { max-width: 900px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2; }

        .hero-content { display: flex; align-items: center; gap: 40px; }
        
        .hero-icon {
            width: 160px; height: 160px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.3);
            background: transparent; object-fit: cover;
            box-shadow: 0 0 30px rgba(0,0,0,0.3);
        }

        .hero-text h1 { margin: 0; font-family: 'Cinzel', serif; font-size: 56px; line-height: 1; color: #fff; }
        .hero-text .role { 
            font-size: 18px; color: #94a3b8; font-weight: 700; 
            text-transform: uppercase; letter-spacing: 3px; margin-top: 10px; display: block;
        }
        
        .element-pill {
            display: inline-block; margin-top: 20px;
            padding: 8px 20px; border-radius: 50px;
            background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
            font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px;
            color: #fff; backdrop-filter: blur(5px);
        }

        /* --- CONTENT GUIDE --- */
        .guide-container { margin-top: 50px; margin-bottom: 100px; }

        .guide-box {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px; padding: 40px; margin-bottom: 40px;
            backdrop-filter: blur(5px);
        }

        .guide-header {
            display: flex; align-items: center; gap: 15px;
            margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 15px;
        }

        .guide-icon-img { width: 28px; height: 28px; opacity: 0.9; }

        .guide-title {
            font-family: 'Cinzel', serif; font-size: 24px; color: #fff; margin: 0;
            letter-spacing: 1px; font-weight: 700;
        }

        .guide-text {
            line-height: 1.8; color: #cbd5e1; font-size: 16px; 
            white-space: pre-line; text-align: justify;
        }

        /* --- ITEM GRID (Tampilan Baru untuk Weapon/Artifact/Team) --- */
        .item-grid {
            display: grid; 
            /* Otomatis atur kolom, minimal lebar 100px */
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); 
            gap: 20px;
        }

        .item-card {
            background: rgba(0,0,0,0.3);
            border-radius: 10px; padding: 10px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.05);
            transition: transform 0.2s;
        }
        .item-card:hover { transform: translateY(-5px); background: rgba(255,255,255,0.05); }

        .item-img {
            width: 60px; height: 60px; object-fit: cover;
            border-radius: 8px; margin-bottom: 10px;
            /* Filter drop shadow biar icon-nya pop */
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.5));
        }
        
        .item-name {
            display: block; font-size: 12px; color: #fff; font-weight: 700; line-height: 1.3;
        }

        .empty-msg { color: #666; font-style: italic; }

        @media (max-width: 768px) {
            .hero-content { flex-direction: column; text-align: center; gap: 20px; }
            .navbar { padding: 15px 20px; }
            .hero-text h1 { font-size: 40px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="<?= BASEURL; ?>" class="logo">GENPEDIA</a>
        <a href="<?= BASEURL; ?>/admin/edit/<?= $data['karakter']['id']; ?>" class="btn-edit">Edit Guide</a>
    </nav>

    <div class="hero">
        <div class="hero-bg" style="background-image: url('<?= $data['karakter']['namecard_url']; ?>');"></div>
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <img src="<?= $data['karakter']['icon_url']; ?>" class="hero-icon" alt="Icon">
            
            <div class="hero-text">
                <h1><?= $data['karakter']['name']; ?></h1>
                <span class="role"><?= $data['karakter']['role']; ?></span>
                
                <span class="element-pill">
                    <?= $data['karakter']['element']; ?>
                </span>
            </div>
        </div>
    </div>

    <div class="container guide-container">
        
        <div class="guide-box">
            <div class="guide-header">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/sword.png" class="guide-icon-img" alt="Weapon">
                <h3 class="guide-title">Weapons</h3>
            </div>
            
            <div class="item-grid">
                <?php if (!empty($data['karakter']['weapons'])) : ?>
                    <?php foreach ($data['karakter']['weapons'] as $w) : ?>
                        <div class="item-card">
                            <img src="<?= $w['icon_url']; ?>" class="item-img" alt="<?= $w['name']; ?>">
                            <span class="item-name"><?= $w['name']; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="empty-msg">No weapon data available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="guide-box">
            <div class="guide-header">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/flower.png" class="guide-icon-img" alt="Artifact">
                <h3 class="guide-title">Artifacts</h3>
            </div>
            
            <div class="item-grid">
                <?php if (!empty($data['karakter']['artifacts'])) : ?>
                    <?php foreach ($data['karakter']['artifacts'] as $a) : ?>
                        <div class="item-card">
                            <img src="<?= $a['icon_url']; ?>" class="item-img" alt="<?= $a['name']; ?>">
                            <span class="item-name"><?= $a['name']; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="empty-msg">No artifact data available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="guide-box">
            <div class="guide-header">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/conference-call.png" class="guide-icon-img" alt="Team">
                <h3 class="guide-title">Teams</h3>
            </div>
            
            <div class="item-grid">
                <?php if (!empty($data['karakter']['teams'])) : ?>
                    <?php foreach ($data['karakter']['teams'] as $t) : ?>
                        <a href="<?= BASEURL; ?>/home/detail/<?= $t['id']; ?>" class="item-card" style="text-decoration:none;">
                            <img src="<?= $t['icon_url']; ?>" class="item-img" style="border-radius:50%;" alt="<?= $t['name']; ?>">
                            <span class="item-name"><?= $t['name']; ?></span>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="empty-msg">No team data available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="guide-box">
            <div class="guide-header">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/info.png" class="guide-icon-img" alt="Info">
                <h3 class="guide-title">Overview</h3>
            </div>
            <div class="guide-text">
                <?= $data['karakter']['description'] ? $data['karakter']['description'] : '<em>No description available.</em>'; ?>
            </div>
        </div>

    </div>

</body>
</html>