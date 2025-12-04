<?php
/**
 * Controller Halaman Artefak
 */
class Artifacts extends Controller {
    
    public function index()
    {
        $data['judul'] = 'Genpedia - Artifacts';
        
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        // Arahkan ke folder 'artifacts' (Inggris)
        $this->view('artifacts/index', $data); 
        $this->view('templates/footer');
    }
}