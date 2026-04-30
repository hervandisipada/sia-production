<?php

class Database {
    private static $instance = null;
    private $pdo;

    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset = 'utf8mb4';

    private function __construct() {
        // DETEKSI ENVIRONMENT
        if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
            // Local Settings (XAMPP)
            $this->host = '127.0.0.1';
            $this->db   = 'rm_pawon';
            $this->user = 'root';
            $this->pass = '';
        } else {
            // Online Settings (InfinityFree)
            // SILAKAN ISI SESUAI DATA DI PANEL INFINITYFREE ANDA
            $this->host = 'sqlXXX.infinityfree.com'; // Contoh: sql123.infinityfree.com
            $this->db   = 'if0_XXXXXX_sia';           // Contoh: if0_378412_sia
            $this->user = 'if0_XXXXXX';              // Contoh: if0_378412
            $this->pass = 'PASSWORD_ANDA';           // Password vPanel
        }

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            // Pada server online, sebaiknya error detail tidak ditampilkan ke publik
            if ($_SERVER['HTTP_HOST'] === 'localhost') {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            } else {
                die("Koneksi Database Gagal. Silakan cek konfigurasi database online Anda.");
            }
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
