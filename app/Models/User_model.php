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

    // Ambil 1 data berdasarkan ID (Untuk Edit)
    public function getCharacterById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
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

    public function ubahDataKarakter($data)
    {
        $query = "UPDATE characters SET
                    name = :name,
                    element = :element,
                    role = :role
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('element', $data['element']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('id', $data['id']); // ID dikirim dari hidden input

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataKarakter($id)
    {
        $query = "DELETE FROM characters WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}