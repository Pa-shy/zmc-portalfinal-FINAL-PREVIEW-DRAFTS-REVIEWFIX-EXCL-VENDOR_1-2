<?php

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH);

if ($path !== '/' || isset($_GET['_r'])) {
    if ($path !== '/' && file_exists(__DIR__ . $path) && !is_dir(__DIR__ . $path)) {
        return false;
    }
    require __DIR__ . '/index.php';
    return;
}

http_response_code(200);
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-cache, no-store');
echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">';
echo '<title>Zimbabwe Media Commission - Digital Services Portal</title>';
echo '<style>*{margin:0;padding:0;box-sizing:border-box}body{display:flex;align-items:center;justify-content:center;height:100vh;background:#1a3a1a;color:#fff;font-family:system-ui,sans-serif}';
echo '.c{text-align:center}.s{width:40px;height:40px;border:4px solid rgba(255,255,255,.2);border-top-color:#c9a227;border-radius:50%;animation:s .8s linear infinite;margin:0 auto 20px}';
echo '@keyframes s{to{transform:rotate(360deg)}}</style>';
echo '</head><body><div class="c"><div class="s"></div>';
echo '<h2>Zimbabwe Media Commission</h2><p style="margin-top:10px;opacity:.8">Loading portal...</p></div>';
echo '<script>window.location.replace("/?_r=1");</script>';
echo '</body></html>';
