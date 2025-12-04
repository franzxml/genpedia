<?php
/**
 * File Inisialisasi (Bootstrapping)
 * Memuat semua file core dan konfigurasi yang dibutuhkan aplikasi
 */

// Memuat konfigurasi database dan konstanta URL
// Menggunakan '../' karena init.php dipanggil dari public/index.php
require_once '../config/config.php'; 

// Memuat kelas-kelas inti pembentuk MVC
require_once '../core/App.php';
require_once '../core/Controller.php';