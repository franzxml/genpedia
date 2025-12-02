<?php

namespace App\Controllers;

use App\Core\Controller;

class Admin extends Controller {
    
    public function index()
    {
        header('Location: ' . BASEURL . '/admin/master');
        exit;
    }

    public function master()
    {
        $data['judul'] = 'Master Data - Genpedia';
        $data['weapons'] = $this->model('User_model')->getAllWeapons();
        $data['artifacts'] = $this->model('User_model')->getAllArtifacts();
        $data['roles'] = $this->model('User_model')->getAllRoles(); // Ambil data role
        $this->view('admin/master', $data);
    }

    public function storeMaster()
    {
        $type = $_POST['type']; // 'weapons', 'artifacts', atau 'roles'
        if (in_array($type, ['weapons', 'artifacts', 'roles'])) {
            $this->model('User_model')->tambahMaster($type, $_POST);
        }
        header('Location: ' . BASEURL . '/admin/master');
        exit;
    }

    public function create()
    {
        $data['judul'] = 'Tambah Karakter Baru';
        $data['weapons'] = $this->model('User_model')->getAllWeapons();
        $data['artifacts'] = $this->model('User_model')->getAllArtifacts();
        $data['roles'] = $this->model('User_model')->getAllRoles(); // Kirim role
        $data['characters'] = $this->model('User_model')->getAllCharacters();
        
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
        
        $data['weapons'] = $this->model('User_model')->getAllWeapons();
        $data['artifacts'] = $this->model('User_model')->getAllArtifacts();
        $data['roles'] = $this->model('User_model')->getAllRoles(); // Kirim role
        $data['characters'] = $this->model('User_model')->getAllCharacters();

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