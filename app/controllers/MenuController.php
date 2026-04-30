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
            $gambar = $this->uploadImage($_FILES['gambar']);
            
            $data = [
                'nama' => $_POST['nama'],
                'harga_jual' => $_POST['harga_jual'],
                'gambar' => $gambar,
                'is_best_seller' => isset($_POST['is_best_seller']) ? 1 : 0,
                'is_available' => isset($_POST['is_available']) ? 1 : 0,
                'kategori' => $_POST['kategori'] ?? 'Makanan'
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
            $gambar = $menu['gambar'];
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] !== 4) {
                $new_gambar = $this->uploadImage($_FILES['gambar']);
                if ($new_gambar) {
                    // Hapus gambar lama jika ada
                    if ($gambar && file_exists("public/img/menu/" . $gambar)) {
                        unlink("public/img/menu/" . $gambar);
                    }
                    $gambar = $new_gambar;
                }
            }

            $data = [
                'nama' => $_POST['nama'],
                'harga_jual' => $_POST['harga_jual'],
                'gambar' => $gambar,
                'is_best_seller' => isset($_POST['is_best_seller']) ? 1 : 0,
                'is_available' => isset($_POST['is_available']) ? 1 : 0,
                'kategori' => $_POST['kategori'] ?? 'Makanan'
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

    private function uploadImage($file) {
        if (!isset($file) || $file['error'] === 4) {
            return null;
        }

        $target_dir = "public/img/menu/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $filename = time() . '_' . basename($file["name"]);
        $target_file = $target_dir . $filename;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi gambar
        $check = getimagesize($file["tmp_name"]);
        if($check === false) return null;

        // Validasi ukuran
        if ($file["size"] > 2000000) return null;

        // Validasi format
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
            return null;
        }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $filename;
        }

        return null;
    }

    public function toggleStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $field = $_POST['field']; // 'is_best_seller' or 'is_available'
            $value = $_POST['value'];

            $stmt = $this->menuModel->getConnection()->prepare("UPDATE menus SET $field = ? WHERE id = ?");
            if ($stmt->execute([$value, $id])) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            exit;
        }
    }

    public function delete($id) {
        $menu = $this->menuModel->find($id);
        if ($menu && $menu['gambar'] && file_exists("public/img/menu/" . $menu['gambar'])) {
            unlink("public/img/menu/" . $menu['gambar']);
        }
        
        if ($this->menuModel->delete($id)) {
            $this->setFlash('success', 'Menu berhasil dihapus');
        } else {
            $this->setFlash('error', 'Gagal menghapus menu');
        }
        $this->redirect('menu/index');
    }
}
