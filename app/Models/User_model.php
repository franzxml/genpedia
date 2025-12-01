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

    public function getCharacterById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataKarakter($data)
    {
        // Query disesuaikan dengan kolom baru
        $query = "INSERT INTO characters (name, element, role, portrait, description) 
                  VALUES (:name, :element, :role, :portrait, :description)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('element', $data['element']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('portrait', $data['portrait']);
        $this->db->bind('description', $data['description']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKarakter($data)
    {
        $query = "UPDATE characters SET
                    name = :name,
                    element = :element,
                    role = :role,
                    portrait = :portrait,
                    description = :description
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('element', $data['element']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('portrait', $data['portrait']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);

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