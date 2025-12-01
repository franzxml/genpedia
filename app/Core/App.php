<?php

namespace App\Core;

class App {
    protected $controller = 'Home'; // Controller default
    protected $method = 'index';    // Method default
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // 1. Cek File Controller
        // Jika url[0] ada (misal: public/admin), cek apakah file controllernya ada?
        if (isset($url[0]) && file_exists('../app/Controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        // Panggil Controller-nya
        require_once '../app/Controllers/' . $this->controller . '.php';
        
        // Instansiasi (Misal: $this->controller = new \App\Controllers\Home)
        // Kita tambah namespace full agar tidak error
        $controllerClass = 'App\\Controllers\\' . $this->controller;
        $this->controller = new $controllerClass;

        // 2. Cek Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. Kelola Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan Controller & Method, kirim params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // Bersihkan URL dari tanda slash di akhir
            $url = rtrim($_GET['url'], '/');
            // Bersihkan URL dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecah URL berdasarkan tanda '/'
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}