<?php
/**
 * Controller Halaman Senjata
 */
class Weapons extends Controller {
    
    public function index()
    {
        $data['judul'] = 'Genpedia - Weapons';
        
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        // Arahkan ke folder 'weapons' (Inggris)
        $this->view('weapons/index', $data); 
        $this->view('templates/footer');
    }
}