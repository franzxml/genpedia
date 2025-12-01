<?php

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Database Genshin Impact';
        $data['karakter'] = $this->model('User_model')->getAllCharacters();
        $this->view('home/index', $data);
    }

    // Fitur Baru: Menampilkan halaman detail/guide
    public function detail($id)
    {
        $data['judul'] = 'Detail Karakter';
        $data['karakter'] = $this->model('User_model')->getCharacterById($id);
        
        // Jika ID ngawur/tidak ditemukan, kembalikan ke home
        if (!$data['karakter']) {
            header('Location: /genpedia/public');
            exit;
        }

        $this->view('home/detail', $data);
    }
}