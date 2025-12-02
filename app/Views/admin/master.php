<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Master Data Genpedia</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; padding: 40px; background: #0c0f1d; color: #fff; }
        .container { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; max-width: 1000px; margin: 0 auto; }
        .box { background: rgba(255,255,255,0.05); padding: 30px; border-radius: 15px; border: 1px solid rgba(255,255,255,0.1); }
        h2 { margin-top: 0; color: #d3bc8e; border-bottom: 1px solid #d3bc8e; padding-bottom: 10px; }
        
        input { 
            width: 100%; padding: 10px; margin-bottom: 10px; 
            background: rgba(0,0,0,0.3); border: 1px solid #444; color: #fff; border-radius: 5px;
        }
        button { 
            width: 100%; padding: 10px; background: #fff; border: none; cursor: pointer; 
            font-weight: bold; border-radius: 5px; 
        }
        button:hover { background: #ddd; }

        .list { margin-top: 20px; display: grid; grid-template-columns: repeat(auto-fill, minmax(60px, 1fr)); gap: 10px; }
        .item { text-align: center; font-size: 10px; }
        .item img { width: 50px; height: 50px; border-radius: 5px; background: rgba(0,0,0,0.3); object-fit: cover; }
        
        .nav-link { display: block; margin-bottom: 20px; color: #aaa; text-decoration: none; }
        .nav-link:hover { color: #fff; }
    </style>
</head>
<body>
    <a href="<?= BASEURL; ?>/home" class="nav-link">← Kembali ke Website Utama</a>
    <a href="<?= BASEURL; ?>/admin/create" class="nav-link" style="color: #4fc3f7; font-weight: bold;">+ Buat Karakter Baru &rarr;</a>

    <div class="container">
        <div class="box">
            <h2>Add Weapon</h2>
            <form action="<?= BASEURL; ?>/admin/storeMaster" method="POST">
                <input type="hidden" name="type" value="weapons">
                <input type="text" name="name" placeholder="Nama Senjata (e.g. Homa)" required>
                <input type="text" name="icon_url" placeholder="URL Icon Senjata" required>
                <button type="submit">Tambah Senjata</button>
            </form>
            
            <div class="list">
                <?php foreach($data['weapons'] as $w) : ?>
                    <div class="item">
                        <img src="<?= $w['icon_url']; ?>">
                        <div><?= $w['name']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="box">
            <h2>Add Artifact</h2>
            <form action="<?= BASEURL; ?>/admin/storeMaster" method="POST">
                <input type="hidden" name="type" value="artifacts">
                <input type="text" name="name" placeholder="Nama Artifak (e.g. Crimson)" required>
                <input type="text" name="icon_url" placeholder="URL Icon Artifak" required>
                <button type="submit">Tambah Artifak</button>
            </form>

            <div class="list">
                <?php foreach($data['artifacts'] as $a) : ?>
                    <div class="item">
                        <img src="<?= $a['icon_url']; ?>">
                        <div><?= $a['name']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>