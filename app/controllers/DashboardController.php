<?php

class DashboardController extends BaseController {
    
    public function __construct() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('auth/index');
        }
    }

    public function index() {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query("SELECT COUNT(*) FROM menus");
        $total_menu = $stmt->fetchColumn();

        $stmt = $db->query("SELECT COUNT(*) FROM bahan_baku WHERE stok < 10");
        $total_bahan_warning = $stmt->fetchColumn();

        $stmt = $db->prepare("SELECT COUNT(*) FROM produksi WHERE tanggal = ?");
        $stmt->execute([date('Y-m-d')]);
        $total_produksi_hari_ini = $stmt->fetchColumn();

        $data = [
            'title' => 'Dashboard',
            'total_menu' => $total_menu,
            'total_bahan_warning' => $total_bahan_warning,
            'total_produksi' => $total_produksi_hari_ini
        ];
        
        $this->view('dashboard/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'Team Developers'
        ];
        $this->view('home/about', $data);
    }
}
