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
        // Gabungkan $_POST dengan hasil upload foto
        $data = $_POST;
        $data['portrait'] = $this->uploadFoto(); // Panggil fungsi upload

        if (!$data['portrait']) return; // Jika upload gagal (salah ekstensi dll)

        if ($this->model('User_model')->tambahDataKarakter($data) > 0) {
            header('Location: /genpedia/public/admin');
            exit;
        }
    }

    public function delete($id)
    {
        // Hapus juga filenya (opsional, tahap lanjut)
        if ($this->model('User_model')->hapusDataKarakter($id) > 0) {
            header('Location: /genpedia/public/admin');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Karakter';
        $data['karakter'] = $this->model('User_model')->getCharacterById($id);
        $this->view('admin/edit', $data);
    }

    public function update()
    {
        $data = $_POST;
        $fotoLama = $_POST['fotoLama'];

        // Cek apakah user pilih gambar baru atau tidak
        if ($_FILES['portrait']['error'] === 4) {
            $data['portrait'] = $fotoLama; // Pakai foto lama
        } else {
            $data['portrait'] = $this->uploadFoto(); // Upload foto baru
        }

        if ($this->model('User_model')->ubahDataKarakter($data) > 0) {
            header('Location: /genpedia/public/admin');
            exit;
        } else {
            // Tetap redirect meski tidak ada row yg berubah
            header('Location: /genpedia/public/admin');
            exit;
        }
    }

    // --- Fungsi Tambahan untuk Upload Gambar ---
    public function uploadFoto()
    {
        $namaFile = $_FILES['portrait']['name'];
        $ukuranFile = $_FILES['portrait']['size'];
        $error = $_FILES['portrait']['error'];
        $tmpName = $_FILES['portrait']['tmp_name'];

        // Cek apakah ada gambar yg diupload (untuk create)
        if ($error === 4) {
            // Set default image jika user tidak upload saat create
            return 'default.png'; 
        }

        // Cek ekstensi file
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Yang anda upload bukan gambar!');</script>";
            return false;
        }

        // Cek ukuran (Max 2MB)
        if ($ukuranFile > 2000000) {
            echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
            return false;
        }

        // Generate nama baru agar tidak duplikat
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Pindahkan ke folder public/img
        move_uploaded_file($tmpName, '../public/img/' . $namaFileBaru);

        return $namaFileBaru;
    }
}