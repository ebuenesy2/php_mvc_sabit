<?php

//! Proje Url Uzantısı
function base_url($path = '') {
    $base = Config::get('app', 'base_url'); // örn: http://localhost/dashboard/github/php_mvc_sabit
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}


function redirect($url = '/') {

    $base_url = Config::get('app', 'base_url');
    //echo "base_url:"; echo $base_url; die();

    $LocationUrl = $base_url.$url;
    //echo "LocationUrl:"; echo $LocationUrl; die();
      
    header("Location:".$LocationUrl);
    
}


//! Dosya Kontrolü ve Gösterimi
function path_control() {
    $requestPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    // "public" klasörünün fiziksel yolunu al
    $publicPath = realpath(__DIR__ . '/../public');
    if (!$publicPath) return;

    // Request path içinde "public/"'ten sonraki kısmı ayıkla
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']); // örn: /dashboard/github/php_mvc_sabit
    $publicUrlPrefix = $scriptDir . '/public/';
    
    if (!str_starts_with($requestPath, $publicUrlPrefix)) {
        return; // Public dizini değilse devam et
    }

    $relativePath = substr($requestPath, strlen($publicUrlPrefix));
    $fullPath = realpath($publicPath . '/' . $relativePath);

    // Dosya varsa ve erişilebilirse gönder
    if ($fullPath && is_file($fullPath) && str_starts_with($fullPath, $publicPath)) {
        header('Content-Type: ' . mime_content_type($fullPath));
        header('Content-Length: ' . filesize($fullPath));
        readfile($fullPath);
        exit;
    }
}

