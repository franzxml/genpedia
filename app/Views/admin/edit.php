<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <style>
        body { font-family: sans-serif; padding: 50px; background-color: #f4f4f4; }
        .card { background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        label { display: block; margin: 15px 0 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { margin-top: 20px; width: 100%; padding: 10px; background: #5a4da3; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .back-link { display: block; margin-top: 15px; text-align: center; text-decoration: none; color: #666; }
        .img-preview { margin-top: 10px; max-width: 100px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Ubah Data Karakter</h2>
    
    <form action="/genpedia/public/admin/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['karakter']['id']; ?>">
        
        <input type="hidden" name="fotoLama" value="<?= $data['karakter']['portrait']; ?>">

        <label for="name">Nama Karakter</label>
        <input type="text" id="name" name="name" value="<?= $data['karakter']['name']; ?>" required>

        <label for="element">Vision (Elemen)</label>
        <select id="element" name="element">
            <?php 
                $elements = ['Pyro', 'Hydro', 'Anemo', 'Electro', 'Dendro', 'Cryo', 'Geo'];
                foreach($elements as $el) : 
            ?>
                <option value="<?= $el; ?>" <?= ($data['karakter']['element'] == $el) ? 'selected' : ''; ?>>
                    <?= $el; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="role">Role</label>
        <input type="text" id="role" name="role" value="<?= $data['karakter']['role']; ?>" required>

        <label for="portrait">Foto Karakter</label>
        <div style="margin-bottom: 10px;">
            <img src="/genpedia/public/img/<?= $data['karakter']['portrait']; ?>" alt="Preview" class="img-preview">
            <small style="display:block; color:#666;">Foto saat ini</small>
        </div>
        <input type="file" id="portrait" name="portrait">

        <label for="description">Guide / Deskripsi</label>
        <textarea id="description" name="description" rows="5"><?= $data['karakter']['description']; ?></textarea>

        <button type="submit">Update Data</button>
    </form>

    <a href="/genpedia/public/admin" class="back-link">Batal</a>
</div>

</body>
</html>