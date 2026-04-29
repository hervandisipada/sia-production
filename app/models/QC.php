<?php

class QC extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'qc';
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (produksi_id, jumlah_baik, jumlah_rusak) VALUES (?, ?, ?)");
        $stmt->execute([$data['produksi_id'], $data['jumlah_baik'], $data['jumlah_rusak']]);
        return $this->db->lastInsertId();
    }

    public function getByProduksi($produksi_id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE produksi_id = ?");
        $stmt->execute([$produksi_id]);
        return $stmt->fetch();
    }
}
