<?php

namespace App\Core;

class Controller {
    // Method untuk memanggil View
    public function view($view, $data = [])
    {
        // $view adalah nama file di folder app/Views (misal: 'home/index')
        // $data adalah array data yang ingin dikirim ke view
        require_once '../app/Views/' . $view . '.php';
    }

    // Method untuk memanggil Model (Disiapkan untuk nanti)
    public function model($model)
    {
        require_once '../app/Models/' . $model . '.php';
        // Namespace model harus sesuai
        $modelClass = 'App\\Models\\' . $model;
        return new $modelClass;
    }
}