<?php
class Artefak extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Artefak';
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('artefak/index', $data);
        $this->view('templates/footer');
    }
}