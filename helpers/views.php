<?php

function view($viewName, $data = [])
{

    $base_path = Config::get('app', 'base_path');
    //echo "base_path:"; echo $base_path; die();
    
    
    // View dosyasının yolu
    $viewFile = $base_path.'/'.'views/' . str_replace('.', '/', $viewName) . '.php';
    //echo "viewFile: "; echo $viewFile; die();

    if (!file_exists($viewFile)) {
        die("View bulunamadı: $viewFile");
    }

    
    extract($data); // Dizi elemanlarını değişken olarak ayıkla
    require $viewFile; // View dosyasını yükle

}
