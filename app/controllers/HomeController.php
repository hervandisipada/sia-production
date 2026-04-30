<?php

class HomeController extends BaseController {
    
    private $menuModel;

    public function __construct() {
        $this->menuModel = new Menu();
    }

    public function index() {
        // Fetch menus to display to customers
        $menus = $this->menuModel->all();

        $data = [
            'title' => 'Selamat Datang di Pawon Selaras',
            'menus' => $menus,
            'about_link' => '<a href="' . BASE_URL . 'home/about" class="btn-secondary shadow-sm">Tentang Kami</a>'
        ];
        
        // We will use a separate view file for guests
        // If we want to use the main layout, we need to handle sidebar visibility
        $this->view('home/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'Tim Pengembang - Pawon Selaras'
        ];
        $this->view('home/about', $data);
    }
}
