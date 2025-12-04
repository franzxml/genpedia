<?php
class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Beranda';
        
        // Urutan pemanggilan views yang baru:
        $this->view('templates/header', $data); // 1. Head & Body start
        $this->view('templates/navbar');        // 2. Navbar Component
        $this->view('home/index', $data);       // 3. Main Content
        $this->view('templates/footer');        // 4. Footer & Scripts
    }
}