<?php

class MenuController extends BaseController {
    
    private $menuModel;
    private $resepModel;
    private $bahanModel;

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }
        $this->menuModel = new Menu();
        $this->resepModel = new Resep();
        
        require_once __DIR__ . '/../models/Bahan.php';
        $this->bahanModel = new Bahan();
    }

    public function index() {
        $menus = $this->menuModel->all();
        $this->view('menu/index', [
            'title' => 'Manajemen Menu',
            'menus' => $menus
        ]);
    }

    public function create() {
        $bahan = $this->bahanModel->all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'harga_jual' => $_POST['harga_jual']
            ];
            
            $menuId = $this->menuModel->create($data);
            if ($menuId) {
                // Simpan resep
                if (isset($_POST['bahan_id']) && is_array($_POST['bahan_id'])) {
                    foreach ($_POST['bahan_id'] as $key => $bahan_id) {
                        $qty = $_POST['qty'][$key];
                        if (!empty($bahan_id) && !empty($qty)) {
                            $this->resepModel->create([
                                'menu_id' => $menuId,
                                'bahan_id' => $bahan_id,
                                'qty' => $qty
                            ]);
                        }
                    }
                }

                $this->setFlash('success', 'Menu dan Resep berhasil ditambahkan');
                $this->redirect('menu/index');
            } else {
                $this->setFlash('error', 'Gagal menambahkan menu');
            }
        }
        
        $this->view('menu/create', [
            'title' => 'Tambah Menu',
            'bahanList' => $bahan
        ]);
    }

    public function edit($id) {
        $menu = $this->menuModel->find($id);
        if (!$menu) {
            $this->redirect('menu/index');
        }

        $bahan = $this->bahanModel->all();
        $resep = $this->resepModel->getByMenu($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'harga_jual' => $_POST['harga_jual']
            ];
            
            if ($this->menuModel->update($id, $data)) {
                // Update resep (hapus semua lalu insert ulang untuk simpelnya)
                $this->resepModel->deleteByMenu($id);
                if (isset($_POST['bahan_id']) && is_array($_POST['bahan_id'])) {
                    foreach ($_POST['bahan_id'] as $key => $bahan_id) {
                        $qty = $_POST['qty'][$key];
                        if (!empty($bahan_id) && !empty($qty)) {
                            $this->resepModel->create([
                                'menu_id' => $id,
                                'bahan_id' => $bahan_id,
                                'qty' => $qty
                            ]);
                        }
                    }
                }

                $this->setFlash('success', 'Menu berhasil diupdate');
                $this->redirect('menu/index');
            } else {
                $this->setFlash('error', 'Gagal mengupdate menu');
            }
        }
        
        $this->view('menu/edit', [
            'title' => 'Edit Menu',
            'menu' => $menu,
            'bahanList' => $bahan,
            'resep' => $resep
        ]);
    }

    public function delete($id) {
        if ($this->menuModel->delete($id)) {
            $this->setFlash('success', 'Menu berhasil dihapus');
        } else {
            $this->setFlash('error', 'Gagal menghapus menu');
        }
        $this->redirect('menu/index');
    }
}
