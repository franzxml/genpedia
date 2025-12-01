<?php

namespace App\Models;

use App\Core\Database;

class User_model {
    private $table = 'characters';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCharacters()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataKarakter($data)
    {
        $query = "INSERT INTO characters (name, element, role) 
                  VALUES (:name, :element, :role)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('element', $data['element']);
        $this->db->bind('role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}