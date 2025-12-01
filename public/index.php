<?php

// 1. Mulai Session
if (!session_id()) session_start();

// 2. Load Composer Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// 3. Load Config Database
// PENTING: Wajib dipanggil SEBELUM class App dijalankan
require_once __DIR__ . '/../config/database.php';

// 4. Panggil Class Utama (App)
use App\Core\App;

// 5. Jalankan aplikasi
$app = new App();