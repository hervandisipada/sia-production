<?php

class BaseController {
    protected function view($view, $data = []) {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        
        if (file_exists($viewFile)) {
            // Kita akan selalu menyertakan layout main.php, dan view spesifik akan dirender di dalamnya
            // Caranya dengan menangkap output view ke dalam variabel $content
            ob_start();
            require $viewFile;
            $content = ob_get_clean();
            
            // Require main layout jika bukan view yang tidak butuh layout (misal login)
            if (strpos($view, 'auth/') !== false) {
                echo $content;
            } else {
                require __DIR__ . '/../views/layouts/main.php';
            }
        } else {
            die("View {$view} not found!");
        }
    }

    protected function redirect($url) {
        header("Location: " . BASE_URL . $url);
        exit;
    }

    protected function setFlash($type, $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }
}
