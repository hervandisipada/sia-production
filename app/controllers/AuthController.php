<?php

class AuthController extends BaseController {
    
    public function index() {
        if (isset($_SESSION['user'])) {
            $this->redirect('dashboard/index');
        }
        
        // Generate CSRF Token if not exists
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $this->view('auth/login', [
            'title' => 'Login - SIA RM Pawon'
        ]);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF
            if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                die('Invalid CSRF Token');
            }

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                $this->redirect('dashboard/index');
            } else {
                $this->setFlash('error', 'Email atau Password salah.');
                $this->redirect('auth/index');
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "auth/index");
        exit;
    }
}
