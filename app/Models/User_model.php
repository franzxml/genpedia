<?php

namespace App\Models;

use App\Core\Database;

class User_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // --- BAGIAN KARAKTER ---
    public function getAllCharacters()
    {
        $this->db->query('SELECT * FROM characters ORDER BY name ASC');
        return $this->db->resultSet();
    }

    public function getCharacterById($id)
    {
        // 1. Ambil Data Utama
        $this->db->query('SELECT * FROM characters WHERE id=:id');
        $this->db->bind('id', $id);
        $char = $this->db->single();

        if (!$char) return false;

        // 2. Ambil Relasi Senjata
        $this->db->query("SELECT w.* FROM weapons w 
                          JOIN rel_weapons r ON w.id = r.weapon_id 
                          WHERE r.character_id = :id");
        $this->db->bind('id', $id);
        $char['weapons'] = $this->db->resultSet();

        // 3. Ambil Relasi Artifak
        $this->db->query("SELECT a.* FROM artifacts a 
                          JOIN rel_artifacts r ON a.id = r.artifact_id 
                          WHERE r.character_id = :id");
        $this->db->bind('id', $id);
        $char['artifacts'] = $this->db->resultSet();

        // 4. Ambil Relasi Tim (Join ke tabel characters lagi)
        $this->db->query("SELECT c.id, c.name, c.icon_url, c.element FROM characters c 
                          JOIN rel_teams r ON c.id = r.teammate_id 
                          WHERE r.character_id = :id");
        $this->db->bind('id', $id);
        $char['teams'] = $this->db->resultSet();

        return $char;
    }

    public function tambahDataKarakter($data)
    {
        // Insert Data Utama
        $query = "INSERT INTO characters (name, element, role, icon_url, namecard_url, description) 
                  VALUES (:name, :element, :role, :icon_url, :namecard_url, :description)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('element', $data['element']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('icon_url', $data['icon_url']);
        $this->db->bind('namecard_url', $data['namecard_url']);
        $this->db->bind('description', $data['description']);
        
        $this->db->execute();
        
        // Ambil ID karakter yang baru dibuat
        $charId = $this->db->dbh->lastInsertId();

        // Simpan Relasi
        $this->simpanRelasi($charId, $data);

        return 1;
    }

    public function ubahDataKarakter($data)
    {
        $query = "UPDATE characters SET
                    name = :name, element = :element, role = :role,
                    icon_url = :icon_url, namecard_url = :namecard_url, description = :description
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('element', $data['element']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('icon_url', $data['icon_url']);
        $this->db->bind('namecard_url', $data['namecard_url']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        // Hapus relasi lama dulu, baru insert ulang (cara paling gampang update many-to-many)
        $this->db->query("DELETE FROM rel_weapons WHERE character_id = :id");
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        $this->db->query("DELETE FROM rel_artifacts WHERE character_id = :id");
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        $this->db->query("DELETE FROM rel_teams WHERE character_id = :id");
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        // Simpan Relasi Baru
        $this->simpanRelasi($data['id'], $data);

        return 1;
    }

    public function hapusDataKarakter($id)
    {
        // Hapus data utama (Relasi bisa di-cascade di SQL sebenarnya, tapi manual lebih aman di PHP native)
        $this->db->query("DELETE FROM rel_weapons WHERE character_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        $this->db->query("DELETE FROM rel_artifacts WHERE character_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        $this->db->query("DELETE FROM rel_teams WHERE character_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        $query = "DELETE FROM characters WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // --- HELPER UNTUK RELASI ---
    private function simpanRelasi($charId, $data) {
        // 1. Weapons
        if (isset($data['weapons'])) {
            foreach($data['weapons'] as $weaponId) {
                $this->db->query("INSERT INTO rel_weapons VALUES (:cid, :wid)");
                $this->db->bind('cid', $charId);
                $this->db->bind('wid', $weaponId);
                $this->db->execute();
            }
        }
        // 2. Artifacts
        if (isset($data['artifacts'])) {
            foreach($data['artifacts'] as $artifactId) {
                $this->db->query("INSERT INTO rel_artifacts VALUES (:cid, :aid)");
                $this->db->bind('cid', $charId);
                $this->db->bind('aid', $artifactId);
                $this->db->execute();
            }
        }
        // 3. Teams (Karakter lain)
        if (isset($data['teams'])) {
            foreach($data['teams'] as $teammateId) {
                $this->db->query("INSERT INTO rel_teams VALUES (:cid, :tid)");
                $this->db->bind('cid', $charId);
                $this->db->bind('tid', $teammateId);
                $this->db->execute();
            }
        }
    }

    // --- MASTER DATA ---
    public function getAllWeapons() {
        $this->db->query("SELECT * FROM weapons ORDER BY name ASC");
        return $this->db->resultSet();
    }
    public function getAllArtifacts() {
        $this->db->query("SELECT * FROM artifacts ORDER BY name ASC");
        return $this->db->resultSet();
    }
    public function tambahMaster($table, $data) {
        $query = "INSERT INTO $table (name, icon_url) VALUES (:name, :icon_url)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('icon_url', $data['icon_url']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}