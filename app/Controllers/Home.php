<?php

namespace App\Controllers;

class Home {
    public function index($nama = 'Traveler', $pekerjaan = 'Adventurer')
    {
        echo "<h1>Halo, $nama!</h1>";
        echo "<p>Job kamu adalah: $pekerjaan</p>";
        echo "<p>Ini adalah method index di Home controller.</p>";
    }
    
    public function test() {
        echo "<h1>Ini halaman Test</h1>";
    }
}