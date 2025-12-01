<?php

namespace App\Controllers;

use App\Core\Controller;

class Admin extends Controller {
    
    // Halaman Utama Admin (Dashboard)
    public function index()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['karakter'] = $this->model('User_model')->getAllCharacters();
        $this->view('admin/index', $data);
    }

    // Halaman Form Tambah Data
    public function create()
    {
        $data['judul'] = 'Tambah Karakter Baru';
        $this->view('admin/create', $data);
    }

    // Proses Simpan Data (Action dari Form)
    public function store()
    {
        if ($this->model('User_model')->tambahDataKarakter($_POST) > 0) {
            // Jika berhasil, redirect kembali ke dashboard admin
            header('Location: /genpedia/public/admin');
            exit;
        } else {
            // Jika gagal (bisa ditambahkan flash message nanti)
            header('Location: /genpedia/public/admin');
            exit;
        }
    }
}