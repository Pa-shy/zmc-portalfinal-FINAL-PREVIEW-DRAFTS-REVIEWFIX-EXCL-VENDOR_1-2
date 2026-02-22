<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$query = $_SERVER['QUERY_STRING'] ?? '';

if ($uri === '/' && $_SERVER['REQUEST_METHOD'] === 'GET' && strpos($query, '_r=1') === false && empty($_COOKIE)) {
    http_response_code(200);
    header('Content-Type: text/html; charset=UTF-8');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">';
    echo '<title>Zimbabwe Media Commission - Digital Services Portal</title>';
    echo '<meta http-equiv="refresh" content="0;url=/?_r=1">';
    echo '</head><body style="margin:0;display:flex;align-items:center;justify-content:center;height:100vh;background:#1a3a1a;color:#fff;font-family:sans-serif">';
    echo '<div style="text-align:center"><h2>Zimbabwe Media Commission</h2><p>Loading portal...</p></div>';
    echo '</body></html>';
    exit;
}

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
