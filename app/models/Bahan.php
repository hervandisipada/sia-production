<?php

class Bahan extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'bahan_baku';
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (nama, stok, satuan, harga_per_unit) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nama'], $data['stok'], $data['satuan'], $data['harga_per_unit']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET nama = ?, stok = ?, satuan = ?, harga_per_unit = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['stok'], $data['satuan'], $data['harga_per_unit'], $id]);
    }
}
