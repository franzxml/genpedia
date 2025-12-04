<?php
// Mendapatkan URL saat ini untuk penentuan class 'active'
$uri = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div class="container-fluid nav-wrapper">
        <a href="<?= BASEURL; ?>" class="brand-logo">Genpedia</a>
        
        <ul class="nav-links">
            <li>
                <a href="<?= BASEURL; ?>" 
                   class="<?= ($uri == '/' || strpos($uri, '/home') !== false) ? 'active' : ''; ?>">
                   Beranda
                </a>
            </li>
            
            <li>
                <a href="<?= BASEURL; ?>/karakter" 
                   class="<?= (strpos($uri, '/karakter') !== false) ? 'active' : ''; ?>">
                   Karakter
                </a>
            </li>
            
            <li>
                <a href="<?= BASEURL; ?>/senjata" 
                   class="<?= (strpos($uri, '/senjata') !== false) ? 'active' : ''; ?>">
                   Senjata
                </a>
            </li>
            
            <li>
                <a href="<?= BASEURL; ?>/artefak" 
                   class="<?= (strpos($uri, '/artefak') !== false) ? 'active' : ''; ?>">
                   Artefak
                </a>
            </li>
        </ul>

        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>