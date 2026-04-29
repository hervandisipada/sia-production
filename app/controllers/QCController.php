<?php

class QCController extends BaseController {
    
    private $qcModel;
    private $produksiModel;

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }
        
        require_once __DIR__ . '/../models/QC.php';
        $this->qcModel = new QC();
        
        require_once __DIR__ . '/../models/Produksi.php';
        $this->produksiModel = new Produksi();
    }

    public function input($produksi_id) {
        $produksi = $this->produksiModel->getById($produksi_id);
        if (!$produksi || $produksi['status'] === 'selesai') {
            $this->redirect('produksi/proses');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jumlah_baik = $_POST['jumlah_baik'];
            $jumlah_rusak = $_POST['jumlah_rusak'];

            // 1. Simpan QC
            $this->qcModel->create([
                'produksi_id' => $produksi_id,
                'jumlah_baik' => $jumlah_baik,
                'jumlah_rusak' => $jumlah_rusak
            ]);

            // 2. Update status produksi
            $this->produksiModel->updateStatus($produksi_id, 'selesai');

            // 3. Set Flash message with HPP info
            // For now just success, we calculate HPP in Laporan or we can calculate here.
            $hpp = $this->hitungHPP($produksi['menu_id'], $produksi_id, $jumlah_baik);
            
            $this->setFlash('success', 'QC selesai! HPP untuk batch ini adalah Rp ' . number_format($hpp, 0, ',', '.'));
            $this->redirect('produksi/proses');
        }

        $this->view('qc/input', [
            'title' => 'Input Quality Control',
            'produksi' => $produksi
        ]);
    }

    private function hitungHPP($menu_id, $produksi_id, $jumlah_baik) {
        if ($jumlah_baik <= 0) return 0;

        // Get total biaya bahan from produksi_detail
        $stmt = $this->produksiModel->getConnection()->prepare("
            SELECT sum(pd.qty_terpakai * b.harga_per_unit) as total_biaya 
            FROM produksi_detail pd
            JOIN bahan_baku b ON pd.bahan_id = b.id
            WHERE pd.produksi_id = ?
        ");
        $stmt->execute([$produksi_id]);
        $result = $stmt->fetch();
        
        $total_biaya = $result['total_biaya'] ?? 0;
        
        return $total_biaya / $jumlah_baik;
    }
}
