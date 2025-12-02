<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data['judul']; ?></title>
    <style>
        body { font-family: sans-serif; padding: 50px; background-color: #f4f4f4; }
        .card { background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #5a4da3; }
        label { display: block; margin: 15px 0 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { margin-top: 20px; width: 100%; padding: 10px; background: #5a4da3; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .back-link { display: block; margin-top: 15px; text-align: center; text-decoration: none; color: #666; }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Karakter (Mode Online)</h2>
    
    <form action="<?= BASEURL; ?>/admin/store" method="POST">
        
        <label>Nama Karakter</label>
        <input type="text" name="name" required placeholder="Contoh: Nefer">

        <label>Vision</label>
        <select name="element">
            <option value="Pyro">Pyro</option>
            <option value="Hydro">Hydro</option>
            <option value="Anemo">Anemo</option>
            <option value="Electro">Electro</option>
            <option value="Dendro">Dendro</option>
            <option value="Cryo">Cryo</option>
            <option value="Geo">Geo</option>
        </select>

        <label>Role</label>
        <input type="text" name="role" required placeholder="Contoh: DPS">

        <label>Link Icon (URL)</label>
        <input type="text" name="icon_url" required placeholder="https://.../Nefer_Icon.png">
        
        <label>Link Namecard (URL)</label>
        <input type="text" name="namecard_url" required placeholder="https://.../Namecard_Background.png">

        <label>Guide</label>
        <textarea name="description" rows="5"></textarea>

        <button type="submit">Simpan Data</button>
    </form>
    <a href="<?= BASEURL; ?>" class="back-link">Batal</a>
</div>
</body>
</html>