<?php

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Karakter';
        
        // Tambahkan ini supaya View tidak error saat memanggil $data['nama']
        $data['nama'] = 'Traveler'; 
        
        // Panggil model dan method-nya untuk ambil data dari DB
        $data['karakter'] = $this->model('User_model')->getAllCharacters();

        $this->view('home/index', $data);
    }
}