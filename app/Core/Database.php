<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // Database Handler
    private $stmt; // Statement

    public function __construct()
    {
        // Data Source Name (DSN)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        // Opsi untuk optimasi koneksi
        $options = [
            PDO::ATTR_PERSISTENT => true, // Koneksi terjaga (lebih cepat)
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Mode error
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die('Koneksi Database Gagal: ' . $e->getMessage());
        }
    }

    // Persiapkan Query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Binding Data (Mencegah SQL Injection)
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi Query
    public function execute()
    {
        $this->stmt->execute();
    }

    // Ambil Banyak Data (Result Set) -> Mengembalikan Array of Object/Assoc
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil Satu Data (Single)
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Hitung baris yang berubah (untuk Insert/Update/Delete)
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}