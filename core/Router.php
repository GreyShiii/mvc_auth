<?php
class Router {
    private string $basePath;
    private array $routes = [];

    public function __construct($basePath = '')
    {
        $this->basePath = $basePath;
    }

    public function addRoutes(string $method, string $path, callable $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $this->basePath . $path,
            'handler' => $handler
        ];
    }

    public function abort($code = 404) {
        http_response_code($code);
        require __DIR__ . "/../app/views/errors/{$code}.php";
        exit();
    }

    public function get(string $path, callable $handler): static {
        $this->addRoutes('GET', $path, $handler);
        return $this;
    }

    public function post(string $path, callable $handler): static {
        $this->addRoutes('POST', $path, $handler);
        return $this;
    }

    public function dispatch($method, $uri) {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                call_user_func($route['handler']);
                return;
            }
        }
        $this->abort(404);
    }
}
?>