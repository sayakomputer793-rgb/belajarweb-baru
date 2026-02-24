<?php

require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller
{
    public function loginForm(): void
    {
        if ($this->isLoggedIn()) {
            $this->redirect('/admin/dashboard');
            return;
        }

        $this->view('admin.login', [
            'pageTitle' => 'Admin Login',
            'csrfToken' => $this->csrfToken(),
        ]);
    }

    public function login(): void
    {
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/login');
            return;
        }

        $username = $this->sanitize($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$username || !$password) {
            $this->view('admin.login', [
                'pageTitle' => 'Admin Login',
                'csrfToken' => $this->csrfToken(),
                'error' => 'Username dan password harus diisi.',
            ]);
            return;
        }

        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->full_name;
            $_SESSION['user_role'] = $user->role;

            $this->redirect('/admin/dashboard');
        }
        else {
            $this->view('admin.login', [
                'pageTitle' => 'Admin Login',
                'csrfToken' => $this->csrfToken(),
                'error' => 'Username atau password salah.',
            ]);
        }
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/admin/login');
    }
}
