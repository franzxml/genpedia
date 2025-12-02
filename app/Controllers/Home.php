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

    // Method Baru: Halaman Detail
    public function detail($id)
    {
        $data['karakter'] = $this->model('User_model')->getCharacterById($id);
        
        // Cek jika data tidak ditemukan (misal ID ngawur)
        if (!$data['karakter']) {
            header('Location: ' . BASEURL);
            exit;
        }

        $data['judul'] = $data['karakter']['name'] . ' Build Guide - Genpedia';
        $this->view('home/detail', $data);
    }
}