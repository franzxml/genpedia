<?php
/**
 * Controller Halaman Karakter
 * Menangani logika untuk daftar dan detail karakter
 */
class Characters extends Controller {
    
    public function index()
    {
        $data['judul'] = 'Genpedia - Characters';
        
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        // Arahkan ke folder 'characters' (Inggris)
        $this->view('characters/index', $data); 
        $this->view('templates/footer');
    }
}