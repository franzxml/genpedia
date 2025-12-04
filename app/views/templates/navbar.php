<?php
/**
 * Komponen Navbar
 * PHP Logic di atas digunakan untuk mendeteksi halaman aktif
 */
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
                <a href="<?= BASEURL; ?>/characters" 
                   class="<?= (strpos($uri, '/characters') !== false) ? 'active' : ''; ?>">
                   Karakter
                </a>
            </li>
            
            <li>
                <a href="<?= BASEURL; ?>/weapons" 
                   class="<?= (strpos($uri, '/weapons') !== false) ? 'active' : ''; ?>">
                   Senjata
                </a>
            </li>
            
            <li>
                <a href="<?= BASEURL; ?>/artifacts" 
                   class="<?= (strpos($uri, '/artifacts') !== false) ? 'active' : ''; ?>">
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