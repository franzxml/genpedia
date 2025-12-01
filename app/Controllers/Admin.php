<?php

namespace App\Controllers;

use App\Core\Controller;

class Admin extends Controller {
    
    public function index()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['karakter'] = $this->model('User_model')->getAllCharacters();
        $this->view('admin/index', $data);
    }

    public function create()
    {
        $data['judul'] = 'Tambah Karakter Baru';
        $this->view('admin/create', $data);
    }

    public function store()
    {
        if ($this->model('User_model')->tambahDataKarakter($_POST) > 0) {
            header('Location: /genpedia/public/admin');
            exit;
        }
    }

    // --- FITUR BARU ---

    // Hapus Data
    public function delete($id)
    {
        if ($this->model('User_model')->hapusDataKarakter($id) > 0) {
            header('Location: /genpedia/public/admin');
            exit;
        }
    }

    // Tampilkan Halaman Edit
    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Karakter';
        $data['karakter'] = $this->model('User_model')->getCharacterById($id);
        $this->view('admin/edit', $data);
    }

    // Proses Update Data
    public function update()
    {
        if ($this->model('User_model')->ubahDataKarakter($_POST) > 0) {
            header('Location: /genpedia/public/admin');
            exit;
        } else {
            // Kalau tidak ada perubahan, tetap kembalikan ke admin
            header('Location: /genpedia/public/admin');
            exit;
        }
    }
}