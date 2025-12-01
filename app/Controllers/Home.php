<?php

namespace App\Controllers;

use App\Core\Controller; // <-- Wajib import ini

class Home extends Controller {
    public function index($nama = 'Traveler')
    {
        // Kita siapkan data yang mau dikirim ke View
        $data['judul'] = 'Home Genpedia';
        $data['nama'] = $nama;

        // Panggil View 'home/index' dan kirim $data
        // File view ini akan kita buat di langkah 3
        $this->view('home/index', $data);
    }
}