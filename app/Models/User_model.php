<?php

namespace App\Models;

use App\Core\Database;

class User_model {
    private $table = 'characters';
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Instansiasi wrapper DB tadi
    }

    public function getAllCharacters()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}