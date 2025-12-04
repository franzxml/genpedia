<?php
/**
 * Controller Halaman Utama (Beranda)
 */
class Home extends Controller {
    
    // Method default (index)
    public function index()
    {
        // Menyiapkan data untuk dikirim ke view
        $data['judul'] = 'Genpedia - Beranda';
        
        // Memuat komponen tampilan secara berurutan
        $this->view('templates/header', $data); // Head HTML & CSS
        $this->view('templates/navbar');        // Navigasi Atas
        $this->view('home/index', $data);       // Konten Utama
        $this->view('templates/footer');        // Footer & Scripts
    }
}