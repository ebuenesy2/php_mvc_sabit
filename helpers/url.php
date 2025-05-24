<?php

//! Proje Url Uzantısı
function base_url($path = '') {
    return rtrim(Config::get('app', 'base_url'), '/') . '/' . ltrim($path, '/');
}


//! Dosya Kontrolü ve Gösterimi
function path_control() {
    // URL'den gelen istek path'ini al
    $requestPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    //echo "requestPath:"; echo $requestPath; die();

    // Uygulamanın kök fiziksel public dizin yolu
    $publicPath = realpath(__DIR__ . '/../public');
    if (!$publicPath) return;
    //echo "publicPath:"; echo $publicPath; die();  


    // Uygulamanın base URL'ini al (örn: /dashboard/github/php_mvc_sabit/)
    $baseUrl = rtrim(parse_url(Config::get('app', 'base_url'), PHP_URL_PATH), '/');
    //echo "baseUrl:"; echo $baseUrl; die();

    // Public klasörün URL içindeki tam konumu
    $publicUrlPart = $baseUrl . '/public';
    //echo "publicUrlPart: "; echo $publicUrlPart; die();

    // Eğer gelen istek public diziniyle başlamıyorsa, yönlendirme router'a kalsın
    if (strpos($requestPath, $publicUrlPart) !== 0) { return; }

    // Public dizin sonrası yolu bul
    $relativePath = ltrim(substr($requestPath, strlen($publicUrlPart)), '/');
    //echo "relativePath:"; echo $relativePath; die();

    // Fiziksel tam dosya yolunu oluştur
    $fullPath = realpath($publicPath . '/' . $relativePath);

    // Dosya güvenlik kontrolü ve sunumu
    if (!$fullPath || strpos($fullPath, $publicPath) !== 0 || !is_file($fullPath)) {
        return; // dosya yok veya erişilemezse devam et
    }

    $mime = mime_content_type($fullPath);
    header("Content-Type: $mime");
    header("Content-Length: " . filesize($fullPath));
    readfile($fullPath);
    exit;
}
