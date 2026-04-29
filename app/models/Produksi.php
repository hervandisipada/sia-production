<?php

class Produksi extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'produksi';
    }

    public function all() {
        $stmt = $this->db->query("
            SELECT p.*, m.nama as nama_menu 
            FROM {$this->table} p 
            JOIN menus m ON p.menu_id = m.id 
            ORDER BY p.id DESC
        ");
        return $stmt->fetchAll();
    }

    public function getPending() {
        $stmt = $this->db->query("
            SELECT p.*, m.nama as nama_menu 
            FROM {$this->table} p 
            JOIN menus m ON p.menu_id = m.id 
            WHERE p.status != 'selesai'
            ORDER BY p.id DESC
        ");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT p.*, m.nama as nama_menu 
            FROM {$this->table} p 
            JOIN menus m ON p.menu_id = m.id 
            WHERE p.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (tanggal, menu_id, jumlah_rencana, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['tanggal'], $data['menu_id'], $data['jumlah_rencana'], $data['status']]);
        return $this->db->lastInsertId();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function createDetail($produksi_id, $bahan_id, $qty_terpakai) {
        $stmt = $this->db->prepare("INSERT INTO produksi_detail (produksi_id, bahan_id, qty_terpakai) VALUES (?, ?, ?)");
        return $stmt->execute([$produksi_id, $bahan_id, $qty_terpakai]);
    }
}
