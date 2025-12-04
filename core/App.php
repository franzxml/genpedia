<?php
/**
 * Kelas App (Router)
 * Bertugas membedah URL dan menentukan Controller, Method, serta Parameter mana yang akan dijalankan
 */
class App {
    // Properti default jika URL kosong
    protected $controller = 'Home'; 
    protected $method = 'index';    
    protected $params = [];

    public function __construct()
    {
        // 1. Ambil URL yang sudah diparsing
        $url = $this->parseURL();

        // 2. Cek Controller (Segmen URL pertama)
        // Jika file controller ada, set sebagai controller saat ini
        if( isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . '.php') ) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        // Panggil file controller tersebut
        require_once '../app/controllers/' . $this->controller . '.php';
        
        // Instansiasi objek controller (misal: new Home())
        $this->controller = new $this->controller;

        // 3. Cek Method (Segmen URL kedua)
        if( isset($url[1]) ) {
            // Cek apakah method tersebut ada di dalam controller
            if( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 4. Kelola Parameter (Sisa segmen URL)
        if( !empty($url) ) {
            $this->params = array_values($url);
        }

        // Jalankan Controller & Method, serta kirim params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Fungsi untuk memecah URL menjadi array
     * Contoh: genpedia.test/characters/detail/1 -> ['characters', 'detail', '1']
     */
    public function parseURL()
    {
        if( isset($_GET['url']) ) {
            // Hapus tanda slash di akhir URL
            $url = rtrim($_GET['url'], '/');
            // Bersihkan URL dari karakter aneh (keamanan)
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecah string menjadi array berdasarkan slash
            $url = explode('/', $url);
            return $url;
        }
    }
}