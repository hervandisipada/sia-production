<?php

class LaporanController extends BaseController {
    
    private $produksiModel;
    private $bahanModel;

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }
        
        require_once __DIR__ . '/../models/Produksi.php';
        $this->produksiModel = new Produksi();
        
        require_once __DIR__ . '/../models/Bahan.php';
        $this->bahanModel = new Bahan();
    }

    public function produksi() {
        $dari = $_GET['dari'] ?? date('Y-m-01');
        $sampai = $_GET['sampai'] ?? date('Y-m-d');

        $stmt = $this->produksiModel->getConnection()->prepare("
            SELECT p.*, m.nama as nama_menu, q.jumlah_baik, q.jumlah_rusak 
            FROM produksi p 
            JOIN menus m ON p.menu_id = m.id 
            LEFT JOIN qc q ON p.id = q.produksi_id
            WHERE p.tanggal >= ? AND p.tanggal <= ?
            ORDER BY p.tanggal DESC
        ");
        $stmt->execute([$dari, $sampai]);
        $data = $stmt->fetchAll();

        if (isset($_GET['export']) && $_GET['export'] === 'csv') {
            $this->exportProduksiCsv($data, $dari, $sampai);
        }

        $this->view('laporan/produksi', [
            'title' => 'Laporan Produksi',
            'data' => $data,
            'dari' => $dari,
            'sampai' => $sampai
        ]);
    }

    public function bahan() {
        $bahan = $this->bahanModel->all();
        $this->view('laporan/bahan', [
            'title' => 'Laporan Stok Bahan Baku',
            'bahan' => $bahan
        ]);
    }

    public function hpp() {
        $dari = $_GET['dari'] ?? date('Y-m-01');
        $sampai = $_GET['sampai'] ?? date('Y-m-d');

        $stmt = $this->produksiModel->getConnection()->prepare("
            SELECT p.id as produksi_id, p.tanggal, m.nama as nama_menu, q.jumlah_baik,
                   (SELECT sum(pd.qty_terpakai * b.harga_per_unit) 
                    FROM produksi_detail pd 
                    JOIN bahan_baku b ON pd.bahan_id = b.id 
                    WHERE pd.produksi_id = p.id) as total_biaya
            FROM produksi p 
            JOIN menus m ON p.menu_id = m.id 
            JOIN qc q ON p.id = q.produksi_id
            WHERE p.status = 'selesai' AND p.tanggal >= ? AND p.tanggal <= ?
            ORDER BY p.tanggal DESC
        ");
        $stmt->execute([$dari, $sampai]);
        $data = $stmt->fetchAll();

        $this->view('laporan/hpp', [
            'title' => 'Laporan HPP',
            'data' => $data,
            'dari' => $dari,
            'sampai' => $sampai
        ]);
    }

    public function waste() {
        $dari = $_GET['dari'] ?? date('Y-m-01');
        $sampai = $_GET['sampai'] ?? date('Y-m-d');

        $stmt = $this->produksiModel->getConnection()->prepare("
            SELECT p.tanggal, m.nama as nama_menu, q.jumlah_rusak
            FROM produksi p 
            JOIN menus m ON p.menu_id = m.id 
            JOIN qc q ON p.id = q.produksi_id
            WHERE q.jumlah_rusak > 0 AND p.tanggal >= ? AND p.tanggal <= ?
            ORDER BY p.tanggal DESC
        ");
        $stmt->execute([$dari, $sampai]);
        $data = $stmt->fetchAll();

        $this->view('laporan/waste', [
            'title' => 'Laporan Waste (Produk Rusak)',
            'data' => $data,
            'dari' => $dari,
            'sampai' => $sampai
        ]);
    }

    private function exportProduksiCsv($data, $dari, $sampai) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Laporan_Produksi_' . $dari . '_sd_' . $sampai . '.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Tanggal', 'Item Menu', 'Rencana', 'Hasil Baik', 'Waste', 'Status']);
        
        foreach ($data as $row) {
            fputcsv($output, [
                date('Y-m-d', strtotime($row['tanggal'])),
                $row['nama_menu'],
                $row['jumlah_rencana'],
                $row['jumlah_baik'] !== null ? $row['jumlah_baik'] : 0,
                $row['jumlah_rusak'] !== null ? $row['jumlah_rusak'] : 0,
                $row['status']
            ]);
        }
        fclose($output);
        exit;
    }
}
