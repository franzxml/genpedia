<?php
class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Beranda';
        
        // Memanggil Header
        $this->view('templates/header', $data);
        // Memanggil Isi Halaman
        $this->view('home/index', $data);
        // Memanggil Footer
        $this->view('templates/footer');
    }
}