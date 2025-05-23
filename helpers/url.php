<?php

//! Proje Url Uzantısı
function base_url($path = '') {
    return rtrim(Config::get('app', 'base_url'), '/') . '/' . ltrim($path, '/');
}


//! Dosya Kontrolü ve Gösterimi
function path_control() {
   
    // URL'den gelen istek path'ini al (örnek: /dashboard/github/php_mvc_sabit/public/img/resim1.jpg)
    $requestPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    // Projenin public klasörünün fiziksel yolu (!!! Bunu kendi projenin yoluna göre güncelle)
    $publicPath = realpath(__DIR__ . '/../public');
    echo "publicPath:"; echo $publicPath; die();

    // Gelen URL'den public dizinine göre alt yolu bul
    $publicUrlPart = '/dashboard/github/php_mvc_sabit/public/';
    $relativePath = str_replace($publicUrlPart, '', $requestPath);

    // Fiziksel tam dosya yolunu oluştur
    $fullPath = realpath($publicPath . '/' . $relativePath);

    // Güvenlik kontrolü: dosya gerçekten public dizini içinde mi?
    if (!$fullPath || strpos($fullPath, $publicPath) !== 0 || !is_file($fullPath)) {
        return; // dosya değilse veya erişilemezse devam et (router vs. çalışır)
    }

    // MIME türünü al ve içeriği oku
    $mime = mime_content_type($fullPath);
    header("Content-Type: $mime");
    header("Content-Length: " . filesize($fullPath));
    readfile($fullPath);
    exit; // artık başka işlem yapılmasın


    die();
   
}
