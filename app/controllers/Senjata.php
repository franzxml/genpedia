<?php
class Senjata extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Senjata';
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('senjata/index', $data);
        $this->view('templates/footer');
    }
}