<?php
/**
 * Kelas Utama Controller
 * Kelas induk yang mewarisi fitur ke semua controller lain
 */
class Controller {
    
    /**
     * Method untuk memanggil tampilan (View)
     * @param string $view Lokasi file view (misal: 'home/index')
     * @param array $data Data yang ingin dikirim ke view
     */
    public function view($view, $data = [])
    {
        // Cek apakah file view ada sebelum di-require (opsional, untuk debugging)
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // Hentikan proses jika view tidak ditemukan
            die("View '$view' tidak ditemukan.");
        }
    }
}