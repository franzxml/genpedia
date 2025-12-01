<?php

// 1. Mulai Session (Penting untuk login admin nanti)
if (!session_id()) session_start();

// 2. Load Composer Autoloader
// Ini otomatis memanggil class yang ada di folder app/
require_once __DIR__ . '/../vendor/autoload.php';

// 3. Panggil Class Utama (App)
// Menggunakan namespace yang sudah kita atur di composer.json
use App\Core\App;

// Jalankan aplikasi
$app = new App();