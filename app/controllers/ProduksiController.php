<?php

class ProduksiController extends BaseController {
    
    private $produksiModel;
    private $menuModel;
    private $resepModel;
    private $bahanModel;

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }
        $this->produksiModel = new Produksi();
        
        require_once __DIR__ . '/../models/Menu.php';
        $this->menuModel = new Menu();
        
        require_once __DIR__ . '/../models/Resep.php';
        $this->resepModel = new Resep();
        
        require_once __DIR__ . '/../models/Bahan.php';
        $this->bahanModel = new Bahan();
    }
    
    public function tambah() {
        // Alias ke rencana() untuk akses cepat dari dashboard
        $this->rencana();
    }

    // Tampilkan daftar produksi yang sedang berjalan atau rencana
    public function rencana() {
        $menus = $this->menuModel->all();

        // Jika submit form rencana
        $kebutuhan = [];
        $menu_id = null;
        $jumlah_rencana = 0;
        $bisa_produksi = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cek_rencana'])) {
            $menu_id = $_POST['menu_id'];
            $jumlah_rencana = $_POST['jumlah_rencana'];

            if ($menu_id && $jumlah_rencana > 0) {
                $resep = $this->resepModel->getByMenu($menu_id);
                foreach ($resep as $r) {
                    $butuh = $r['qty'] * $jumlah_rencana;
                    $bahan = $this->bahanModel->find($r['bahan_id']);
                    
                    $status_cukup = $bahan['stok'] >= $butuh;
                    if (!$status_cukup) {
                        $bisa_produksi = false;
                    }

                    $kebutuhan[] = [
                        'bahan_id' => $r['bahan_id'],
                        'nama_bahan' => $bahan['nama'],
                        'satuan' => $bahan['satuan'],
                        'stok_saat_ini' => $bahan['stok'],
                        'kebutuhan' => $butuh,
                        'cukup' => $status_cukup
                    ];
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mulai_produksi'])) {
            $menu_id = $_POST['menu_id'];
            $jumlah_rencana = $_POST['jumlah_rencana'];
            
            // Re-validate
            $resep = $this->resepModel->getByMenu($menu_id);
            $valid = true;
            $kebutuhan_final = [];

            foreach ($resep as $r) {
                $butuh = $r['qty'] * $jumlah_rencana;
                $bahan = $this->bahanModel->find($r['bahan_id']);
                if ($bahan['stok'] < $butuh) {
                    $valid = false;
                    break;
                }
                $kebutuhan_final[] = [
                    'bahan_id' => $r['bahan_id'],
                    'butuh' => $butuh,
                    'sisa_stok' => $bahan['stok'] - $butuh
                ];
            }

            if ($valid) {
                // 1. Kurangi stok
                foreach ($kebutuhan_final as $kf) {
                    $this->bahanModel->update($kf['bahan_id'], [
                        'nama' => $this->bahanModel->find($kf['bahan_id'])['nama'], // needed by update method
                        'stok' => $kf['sisa_stok'],
                        'satuan' => $this->bahanModel->find($kf['bahan_id'])['satuan'],
                        'harga_per_unit' => $this->bahanModel->find($kf['bahan_id'])['harga_per_unit']
                    ]);
                }

                // 2. Insert produksi
                $produksi_id = $this->produksiModel->create([
                    'tanggal' => date('Y-m-d'),
                    'menu_id' => $menu_id,
                    'jumlah_rencana' => $jumlah_rencana,
                    'status' => 'produksi'
                ]);

                // 3. Insert produksi detail
                foreach ($kebutuhan_final as $kf) {
                    $this->produksiModel->createDetail($produksi_id, $kf['bahan_id'], $kf['butuh']);
                }

                $this->setFlash('success', 'Produksi dimulai. Stok bahan baku telah dikurangi.');
                $this->redirect('produksi/proses');
            } else {
                $this->setFlash('error', 'Stok bahan tidak mencukupi untuk produksi.');
            }
        }

        $this->view('produksi/rencana', [
            'title' => 'Perencanaan Produksi',
            'menus' => $menus,
            'kebutuhan' => $kebutuhan,
            'menu_id' => $menu_id,
            'jumlah_rencana' => $jumlah_rencana,
            'bisa_produksi' => $bisa_produksi
        ]);
    }

    public function proses() {
        $produksi_list = $this->produksiModel->getPending();
        
        $this->view('produksi/proses', [
            'title' => 'Proses Produksi',
            'produksi_list' => $produksi_list
        ]);
    }
}
