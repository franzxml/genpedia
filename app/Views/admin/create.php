<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <style>
        body { font-family: sans-serif; padding: 50px; background-color: #f4f4f4; }
        .card { background: white; padding: 30px; border-radius: 10px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #5a4da3; }
        label { display: block; margin: 15px 0 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { margin-top: 20px; width: 100%; padding: 10px; background: #5a4da3; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #473b85; }
        .back-link { display: block; margin-top: 15px; text-align: center; text-decoration: none; color: #666; }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Karakter Baru</h2>
    
    <form action="/genpedia/public/admin/store" method="POST">
        
        <label for="name">Nama Karakter</label>
        <input type="text" id="name" name="name" required placeholder="Contoh: Raiden Shogun">

        <label for="element">Vision (Elemen)</label>
        <select id="element" name="element">
            <option value="Pyro">Pyro (Api)</option>
            <option value="Hydro">Hydro (Air)</option>
            <option value="Anemo">Anemo (Angin)</option>
            <option value="Electro">Electro (Listrik)</option>
            <option value="Dendro">Dendro (Tumbuhan)</option>
            <option value="Cryo">Cryo (Es)</option>
            <option value="Geo">Geo (Tanah)</option>
        </select>

        <label for="role">Role / Job</label>
        <input type="text" id="role" name="role" required placeholder="Contoh: Main DPS / Battery">

        <button type="submit">Simpan Data</button>
    </form>

    <a href="/genpedia/public/admin" class="back-link">Kembali ke Dashboard</a>
</div>

</body>
</html>