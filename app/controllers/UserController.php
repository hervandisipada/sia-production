<?php

class UserController extends BaseController {
    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }

        // Only Admin and Owner can access
        $role = $_SESSION['user']['role'];
        if ($role !== 'admin' && $role !== 'owner') {
            $this->setFlash('error', 'Anda tidak memiliki hak akses ke halaman ini.');
            $this->redirect('dashboard/index');
        }
    }

    public function index() {
        $userModel = new User();
        $users = $userModel->getAll();

        $this->view('user/index', [
            'title' => 'Manajemen Pengguna',
            'users' => $users
        ]);
    }

    public function approve($id) {
        $userModel = new User();
        if ($userModel->updateStatus($id, 'active')) {
            $this->setFlash('success', 'Akun pengguna berhasil disetujui.');
        } else {
            $this->setFlash('error', 'Gagal menyetujui akun.');
        }
        $this->redirect('user/index');
    }

    public function reject($id) {
        $userModel = new User();
        if ($userModel->updateStatus($id, 'rejected')) {
            $this->setFlash('success', 'Akun pengguna berhasil ditolak.');
        } else {
            $this->setFlash('error', 'Gagal menolak akun.');
        }
        $this->redirect('user/index');
    }

    public function delete($id) {
        $userModel = new User();
        if ($userModel->delete($id)) {
            $this->setFlash('success', 'Data pengguna berhasil dihapus.');
        } else {
            $this->setFlash('error', 'Gagal menghapus data pengguna.');
        }
        $this->redirect('user/index');
    }
}
