<?php

namespace App\Controllers;

use App\Core\Controller;

class Admin extends Controller {
    
    public function index()
    {
        // Redirect ke halaman Master Data dulu biar Admin ngisi itu
        header('Location: ' . BASEURL . '/admin/master');
        exit;
    }

    // --- HALAMAN UTAMA ADMIN: MASTER DATA ---
    public function master()
    {
        $data['judul'] = 'Master Data - Genpedia';
        $data['weapons'] = $this->model('User_model')->getAllWeapons();
        $data['artifacts'] = $this->model('User_model')->getAllArtifacts();
        $this->view('admin/master', $data);
    }

    // Action Tambah Master Data (Weapon/Artifact)
    public function storeMaster()
    {
        $type = $_POST['type']; // 'weapons' atau 'artifacts'
        // Validasi simpel
        if ($type == 'weapons' || $type == 'artifacts') {
            $this->model('User_model')->tambahMaster($type, $_POST);
        }
        header('Location: ' . BASEURL . '/admin/master');
        exit;
    }

    // --- CREATE CHARACTER ---
    public function create()
    {
        $data['judul'] = 'Tambah Karakter Baru';
        // Kirim data master ke view biar bisa dipilih
        $data['weapons'] = $this->model('User_model')->getAllWeapons();
        $data['artifacts'] = $this->model('User_model')->getAllArtifacts();
        $data['characters'] = $this->model('User_model')->getAllCharacters(); // Untuk pilih tim
        
        $this->view('admin/create', $data);
    }

    public function store()
    {
        if ($this->model('User_model')->tambahDataKarakter($_POST) > 0) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Karakter';
        $data['karakter'] = $this->model('User_model')->getCharacterById($id);
        
        // Kirim data master juga
        $data['weapons'] = $this->model('User_model')->getAllWeapons();
        $data['artifacts'] = $this->model('User_model')->getAllArtifacts();
        $data['characters'] = $this->model('User_model')->getAllCharacters();

        // Mapping ID yang sudah terpilih biar checkbox tercentang
        $data['selected_weapons'] = array_column($data['karakter']['weapons'], 'id');
        $data['selected_artifacts'] = array_column($data['karakter']['artifacts'], 'id');
        $data['selected_teams'] = array_column($data['karakter']['teams'], 'id');

        $this->view('admin/edit', $data);
    }

    public function update()
    {
        if ($this->model('User_model')->ubahDataKarakter($_POST) > 0) {
            header('Location: ' . BASEURL . '/home/detail/' . $_POST['id']);
            exit;
        } else {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('User_model')->hapusDataKarakter($id) > 0) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}