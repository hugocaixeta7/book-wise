<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = dirname($_SERVER['SCRIPT_NAME']); 
$controller = trim(str_replace($base, '', $uri), '/'); 

if (strpos($controller, 'index.php/') === 0) { // corrigir caso venha "index.php/alguma-coisa"
    $controller = substr($controller, strlen('index.php/'));
}

if (!$controller) $controller = 'index';
$controllerFile = __DIR__ . "/controllers/{$controller}.controller.php";

if (!file_exists($controllerFile)) {
    http_response_code(404);
    echo "Página não existe";
    die();
}

require $controllerFile;
