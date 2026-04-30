<?php

class Menu extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'menus';
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY is_available DESC, is_best_seller DESC, id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (nama, harga_jual, gambar, is_best_seller, is_available, kategori) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['nama'], 
            $data['harga_jual'], 
            $data['gambar'] ?? null, 
            $data['is_best_seller'] ?? 0,
            $data['is_available'] ?? 1,
            $data['kategori'] ?? 'Makanan'
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET nama = ?, harga_jual = ?, gambar = ?, is_best_seller = ?, is_available = ?, kategori = ? WHERE id = ?");
        return $stmt->execute([
            $data['nama'], 
            $data['harga_jual'], 
            $data['gambar'], 
            $data['is_best_seller'],
            $data['is_available'],
            $data['kategori'],
            $id
        ]);
    }
}
