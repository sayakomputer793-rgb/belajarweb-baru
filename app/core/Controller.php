<?php

require_once __DIR__ . '/../../config/database.php';

class Controller
{
    protected string $basePath;
    protected array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/app.php';
        $this->basePath = $this->config['base_path'];
    }

    protected function view(string $viewName, array $data = []): void
    {
        $data['basePath'] = $this->basePath;
        $data['config'] = $this->config;

        extract($data);

        $viewFile = __DIR__ . '/../views/' . str_replace('.', '/', $viewName) . '.php';

        if (!file_exists($viewFile)) {
            die("View not found: {$viewName}");
        }

        // Use output buffering to capture the view content
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // Require the main layout, passing the captured content
        require __DIR__ . '/../views/layouts/main.php';
    }

    protected function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $this->basePath . $path);
        exit;
    }

    protected function isLoggedIn(): bool
    {
        return isset($_SESSION['user_id']);
    }

    protected function requireLogin(): void
    {
        if (!$this->isLoggedIn()) {
            $this->redirect('/admin/login');
        }
    }

    protected function csrfToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    protected function csrfField(): string
    {
        return '<input type="hidden" name="csrf_token" value="' . $this->csrfToken() . '">';
    }

    protected function validateCsrf(): bool
    {
        $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        return hash_equals($_SESSION['csrf_token'] ?? '', $token);
    }

    protected function sanitize(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    protected function uploadFile(array $file, string $directory = 'uploads'): ?string
    {
        $config = $this->config;
        $uploadDir = __DIR__ . '/../../public/assets/images/' . $directory . '/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Validate file
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        if ($file['size'] > $config['upload_max_size']) {
            return null;
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!in_array($mimeType, $config['upload_allowed_types'])) {
            return null;
        }

        $ext = match ($mimeType) {
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp',
                default => 'jpg',
            };

        $filename = uniqid('img_', true) . '.' . $ext;
        $destination = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $directory . '/' . $filename;
        }

        return null;
    }
}
