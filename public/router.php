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

require __DIR__ . '/index.php';
