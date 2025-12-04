<?php
class Karakter extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Karakter';
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('karakter/index', $data);
        $this->view('templates/footer');
    }
}