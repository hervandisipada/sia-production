<?php

class Resep extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'resep';
    }

    public function getByMenu($menu_id) {
        $stmt = $this->db->prepare("
            SELECT r.*, b.nama as nama_bahan, b.satuan 
            FROM {$this->table} r 
            JOIN bahan_baku b ON r.bahan_id = b.id 
            WHERE r.menu_id = ?
        ");
        $stmt->execute([$menu_id]);
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (menu_id, bahan_id, qty) VALUES (?, ?, ?)");
        return $stmt->execute([$data['menu_id'], $data['bahan_id'], $data['qty']]);
    }

    public function deleteByMenu($menu_id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE menu_id = ?");
        return $stmt->execute([$menu_id]);
    }
}
