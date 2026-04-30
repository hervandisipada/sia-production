<?php

class BahanController extends BaseController {

    private $bahanModel;

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }
        require_once __DIR__ . '/../models/Bahan.php';
        $this->bahanModel = new Bahan();
    }

    public function tambah() {
        // Alias ke create() untuk akses cepat dashboard
        $this->create();
    }


    public function index() {
        $bahan = $this->bahanModel->all();
        $this->view('bahan/index', [
            'title' => 'Manajemen Bahan Baku',
            'bahan' => $bahan
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'stok' => $_POST['stok'],
                'satuan' => $_POST['satuan'],
                'harga_per_unit' => $_POST['harga_per_unit']
            ];

            if ($this->bahanModel->create($data)) {
                $this->setFlash('success', 'Bahan baku berhasil ditambahkan');
                $this->redirect('bahan/index');
            } else {
                $this->setFlash('error', 'Gagal menambahkan bahan baku');
            }
        }

        $this->view('bahan/create', [
            'title' => 'Tambah Bahan Baku'
        ]);
    }

    public function edit($id) {
        $bahan = $this->bahanModel->find($id);
        if (!$bahan) {
            $this->redirect('bahan/index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'stok' => $_POST['stok'],
                'satuan' => $_POST['satuan'],
                'harga_per_unit' => $_POST['harga_per_unit']
            ];

            if ($this->bahanModel->update($id, $data)) {
                $this->setFlash('success', 'Bahan baku berhasil diupdate');
                $this->redirect('bahan/index');
            } else {
                $this->setFlash('error', 'Gagal mengupdate bahan baku');
            }
        }

        $this->view('bahan/edit', [
            'title' => 'Edit Bahan Baku',
            'bahan' => $bahan
        ]);
    }

    public function delete($id) {
        if ($this->bahanModel->delete($id)) {
            $this->setFlash('success', 'Bahan baku berhasil dihapus');
        } else {
            $this->setFlash('error', 'Gagal menghapus bahan baku');
        }
        $this->redirect('bahan/index');
    }
}