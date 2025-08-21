<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = dirname($_SERVER['SCRIPT_NAME']);
$controller = trim(str_replace($base, '', $uri), '/');

if (strpos($controller, 'index.php/') === 0) { 
    $controller = substr($controller, strlen('index.php/'));
}

$controller = explode('?', $controller)[0];

if (!$controller) $controller = 'index';

$controllerFile = __DIR__ . "/controllers/{$controller}.controller.php";

if (!file_exists($controllerFile)) {
    abort(404);
}

require $controllerFile;
