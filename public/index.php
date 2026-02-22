<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));

if ($uri === '/' && $_SERVER['REQUEST_METHOD'] === 'GET' && empty($_SERVER['HTTP_COOKIE'])) {
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    if (stripos($accept, 'text/html') === false) {
        http_response_code(200);
        header('Content-Type: text/html');
        echo '<!DOCTYPE html><html><head><title>ZMC</title></head><body>OK</body></html>';
        exit;
    }
}

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
