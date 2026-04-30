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
                if ($user['status'] !== 'active') {
                    $this->setFlash('error', 'Akun Anda belum aktif atau telah dinonaktifkan. Silakan hubungi Admin.');
                    $this->redirect('auth/index');
                    return;
                }

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

    public function register() {
        if (isset($_SESSION['user'])) {
            $this->redirect('dashboard/index');
        }

        // Generate CSRF Token if not exists
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $this->view('auth/register', [
            'title' => 'Register - SIA RM Pawon'
        ]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF
            if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                die('Invalid CSRF Token');
            }

            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'staff'; // Default role

            $userModel = new User();

            // Check if email already exists
            if ($userModel->existsByEmail($email)) {
                $this->setFlash('error', 'Email sudah terdaftar.');
                $this->redirect('auth/register');
                return;
            }

            // Create User
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role,
                'status' => 'pending' // New users are pending by default
            ];

            if ($userModel->create($data)) {
                $this->setFlash('success', 'Registrasi berhasil! Akun Anda sedang menunggu persetujuan Admin.');
                $this->redirect('auth/index');
            } else {
                $this->setFlash('error', 'Terjadi kesalahan saat registrasi.');
                $this->redirect('auth/register');
            }
        }
    }
}
