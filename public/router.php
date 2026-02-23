<?php

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH);

if ($path === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

    $isBrowser = (stripos($accept, 'text/html') !== false) || 
                 (stripos($ua, 'Mozilla') !== false) || 
                 (stripos($ua, 'Chrome') !== false) || 
                 (stripos($ua, 'Safari') !== false);

    if (!$isBrowser) {
        http_response_code(200);
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!DOCTYPE html><html><head><title>ZMC</title></head><body>OK</body></html>';
        return;
    }
}

if ($path !== '/' && is_file(__DIR__ . $path)) {
    return false;
}

ini_set('display_errors', '0');
error_reporting(E_ALL);

$logFile = __DIR__ . '/../storage/logs/production_errors.log';
set_error_handler(function($errno, $errstr, $errfile, $errline) use ($logFile) {
    $msg = date('Y-m-d H:i:s') . " PHP Error [$errno]: $errstr in $errfile:$errline\n";
    @file_put_contents($logFile, $msg, FILE_APPEND);
    return false;
});

set_exception_handler(function($e) use ($logFile) {
    $msg = date('Y-m-d H:i:s') . " Uncaught Exception: " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n";
    @file_put_contents($logFile, $msg, FILE_APPEND);
    http_response_code(500);
    echo "Server Error - check logs";
});

require __DIR__ . '/index.php';
