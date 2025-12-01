<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; }
        h1 { color: #5a4da3; }
        .card { border: 1px solid #ddd; padding: 20px; display: inline-block; border-radius: 10px; margin: 10px; vertical-align: top; }
        ul { text-align: left; }
    </style>
</head>
<body>

    <div class="card">
        <h1>Welcome to Genpedia</h1>
        <p>Halo, <strong><?= $data['nama']; ?></strong>!</p>
        <p>Aplikasi Database Genshin Impact</p>
    </div>

    <div class="card">
        <h1>Daftar Karakter</h1>
        <ul>
            <?php foreach ($data['karakter'] as $char) : ?>
                <li>
                    <strong><?= $char['name']; ?></strong> 
                    (<?= $char['element']; ?>) - <?= $char['role']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>
</html>