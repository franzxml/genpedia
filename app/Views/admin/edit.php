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
    <h2>Ubah Data Karakter</h2>
    
    <form action="/genpedia/public/admin/update" method="POST">
        <input type="hidden" name="id" value="<?= $data['karakter']['id']; ?>">

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

        <label for="role">Role / Job</label>
        <input type="text" id="role" name="role" value="<?= $data['karakter']['role']; ?>" required>

        <button type="submit">Update Data</button>
    </form>

    <a href="/genpedia/public/admin" class="back-link">Batal</a>
</div>

</body>
</html>