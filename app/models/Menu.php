<?php

class Menu extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'menus';
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (nama, harga_jual) VALUES (?, ?)");
        $stmt->execute([$data['nama'], $data['harga_jual']]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET nama = ?, harga_jual = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['harga_jual'], $id]);
    }
}
