<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post(string $path, string $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch(string $url, string $method): void
    {
        $method = strtoupper($method);
        $url = trim($url, '/');

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $action) {
                $route = trim($route, '/');
                // Convert route parameters like {id} or {slug} to regex
                $pattern = preg_replace('/\{([a-zA-Z_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $route);
                $pattern = '#^' . $pattern . '$#';

                if (preg_match($pattern, $url, $matches)) {
                    // Extract named parameters
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                    // Parse controller@method
                    [$controllerName, $methodName] = explode('@', $action);

                    // Check for namespaced controller (Admin/)
                    $controllerFile = __DIR__ . '/../controllers/' . str_replace('\\', '/', $controllerName) . '.php';

                    if (!file_exists($controllerFile)) {
                        $this->sendError(404, "Controller not found: {$controllerName}");
                        return;
                    }

                    require_once $controllerFile;

                    // Get just the class name (without namespace path)
                    $className = basename(str_replace('\\', '/', $controllerName));

                    if (!class_exists($className)) {
                        $this->sendError(500, "Class not found: {$className}");
                        return;
                    }

                    $controller = new $className();

                    if (!method_exists($controller, $methodName)) {
                        $this->sendError(404, "Method not found: {$methodName}");
                        return;
                    }

                    call_user_func_array([$controller, $methodName], $params);
                    return;
                }
            }
        }

        $this->sendError(404);
    }

    private function sendError(int $code, string $message = ''): void
    {
        http_response_code($code);
        if ($code === 404) {
            $basePath = $GLOBALS['config']['base_path'] ?? '';
            echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>404 Not Found</title>';
            echo '<style>body{background:#0f0f23;color:#e2e8f0;font-family:Inter,sans-serif;display:flex;justify-content:center;align-items:center;height:100vh;margin:0}';
            echo '.c{text-align:center}.c h1{font-size:6rem;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin:0}';
            echo '.c p{color:#94a3b8;font-size:1.2rem}.c a{color:#667eea;text-decoration:none}</style></head>';
            echo '<body><div class="c"><h1>404</h1><p>Halaman tidak ditemukan</p><a href="' . $basePath . '/">← Kembali ke Beranda</a></div></body></html>';
        }
        else {
            echo "Error {$code}: {$message}";
        }
    }
}
