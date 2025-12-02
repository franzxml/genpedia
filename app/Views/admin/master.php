<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Master Data Genpedia</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; padding: 40px; background: #0c0f1d; color: #fff; }
        /* Grid 3 Kolom biar muat Role */
        .container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; }
        .box { background: rgba(255,255,255,0.05); padding: 25px; border-radius: 15px; border: 1px solid rgba(255,255,255,0.1); }
        h2 { margin-top: 0; color: #d3bc8e; border-bottom: 1px solid #d3bc8e; padding-bottom: 10px; font-size: 18px; }
        
        input { 
            width: 100%; padding: 10px; margin-bottom: 10px; 
            background: rgba(0,0,0,0.3); border: 1px solid #444; color: #fff; border-radius: 5px; box-sizing: border-box;
        }
        button { 
            width: 100%; padding: 10px; background: #fff; border: none; cursor: pointer; 
            font-weight: bold; border-radius: 5px; color: #000;
        }
        button:hover { background: #ddd; }

        .list { margin-top: 20px; max-height: 300px; overflow-y: auto; }
        
        /* List Item dengan Gambar */
        .item-img { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; font-size: 13px; }
        .item-img img { width: 30px; height: 30px; border-radius: 4px; background: #333; object-fit: cover; }
        
        /* List Item Teks Saja (Role) */
        .item-text { 
            padding: 8px; border-bottom: 1px solid rgba(255,255,255,0.05); font-size: 13px; 
        }
        
        .nav-link { display: block; margin-bottom: 20px; color: #aaa; text-decoration: none; }
        .nav-link:hover { color: #fff; }
    </style>
</head>
<body>
    <div style="display:flex; justify-content:space-between; max-width:1200px; margin:0 auto;">
        <a href="<?= BASEURL; ?>/home" class="nav-link">← Kembali ke Website</a>
        <a href="<?= BASEURL; ?>/admin/create" class="nav-link" style="color: #4fc3f7; font-weight: bold;">+ Buat Karakter &rarr;</a>
    </div>

    <div class="container">
        <div class="box">
            <h2>Manage Roles</h2>
            <form action="<?= BASEURL; ?>/admin/storeMaster" method="POST">
                <input type="hidden" name="type" value="roles">
                <input type="text" name="name" placeholder="Nama Role (e.g. Sub-DPS)" required autocomplete="off">
                <button type="submit">Tambah Role</button>
            </form>
            <div class="list">
                <?php foreach($data['roles'] as $r) : ?>
                    <div class="item-text">
                        <?= $r['name']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="box">
            <h2>Manage Weapons</h2>
            <form action="<?= BASEURL; ?>/admin/storeMaster" method="POST">
                <input type="hidden" name="type" value="weapons">
                <input type="text" name="name" placeholder="Nama Senjata" required autocomplete="off">
                <input type="text" name="icon_url" placeholder="URL Icon" required>
                <button type="submit">Tambah Senjata</button>
            </form>
            <div class="list">
                <?php foreach($data['weapons'] as $w) : ?>
                    <div class="item-img">
                        <img src="<?= $w['icon_url']; ?>">
                        <span><?= $w['name']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="box">
            <h2>Manage Artifacts</h2>
            <form action="<?= BASEURL; ?>/admin/storeMaster" method="POST">
                <input type="hidden" name="type" value="artifacts">
                <input type="text" name="name" placeholder="Nama Artifak" required autocomplete="off">
                <input type="text" name="icon_url" placeholder="URL Icon" required>
                <button type="submit">Tambah Artifak</button>
            </form>
            <div class="list">
                <?php foreach($data['artifacts'] as $a) : ?>
                    <div class="item-img">
                        <img src="<?= $a['icon_url']; ?>">
                        <span><?= $a['name']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>