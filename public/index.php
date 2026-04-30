<?php
session_start();
date_default_timezone_set('Asia/Makassar');

// Base URL definition
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$base_url = $protocol . "://" . $host . $script_name;

// Jika dijalankan di localhost dan di dalam subfolder, pastikan link mengarah ke /public
if ($host === 'localhost' || $host === '127.0.0.1') {
    $base_url = rtrim($base_url, '/public') . '/public';
}

define('BASE_URL', rtrim($base_url, '/') . '/');

// Autoloading simple
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/controllers/BaseController.php';

// Model Autoloader
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../app/models/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Simple Router
$route = isset($_GET['route']) ? $_GET['route'] : 'dashboard/index';
$routeParts = explode('/', filter_var(rtrim($route, '/'), FILTER_SANITIZE_URL));

$controllerName = ucfirst($routeParts[0] ?? 'Dashboard') . 'Controller';
$methodName = $routeParts[1] ?? 'index';
$param = $routeParts[2] ?? null;

$controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();
    
    if (method_exists($controller, $methodName)) {
        if ($param !== null) {
            $controller->$methodName($param);
        } else {
            $controller->$methodName();
        }
    } else {
        die("Method {$methodName} not found in {$controllerName}");
    }
} else {
    die("Controller {$controllerName} not found");
}
