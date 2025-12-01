<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title> <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; }
        h1 { color: #5a4da3; }
        .card { border: 1px solid #ddd; padding: 20px; display: inline-block; border-radius: 10px; }
    </style>
</head>
<body>

    <div class="card">
        <h1>Welcome to Genpedia</h1>
        <p>Halo, <strong><?= $data['nama']; ?></strong>!</p>
        <p>Aplikasi Database Genshin Impact</p>
    </div>

</body>
</html>