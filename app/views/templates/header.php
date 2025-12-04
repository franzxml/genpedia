<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <div class="container nav-wrapper">
        <a href="<?= BASEURL; ?>" class="brand-logo">Genpedia</a>
        
        <ul class="nav-links">
            <li><a href="<?= BASEURL; ?>" class="active">Beranda</a></li>
            <li><a href="#">Karakter</a></li>
            <li><a href="#">Senjata</a></li>
            <li><a href="#">Artefak</a></li>
        </ul>

        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>