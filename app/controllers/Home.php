<?php
class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Genpedia - Database Genshin Impact';
        // Memanggil file view di folder views/home/index.php
        $this->view('home/index', $data);
    }
}