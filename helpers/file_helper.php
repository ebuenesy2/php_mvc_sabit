<?php
class FileHelper {
    public static function uploadFile($fileKey = 'dosya', $targetFolder = 'public/uploads/', $allowedExtensions = ['jpg', 'png', 'pdf']) {
        $upload_status = 0;
        $upload_mesaj = '';
        $file_info = null;

        if (!isset($_FILES[$fileKey])) {
            return [
                'status' => 0,
                'msg' => 'Dosya bulunamadı.',
                'fileInfo' => null
            ];
        }

        $dosya = $_FILES[$fileKey];
        $extension = strtolower(pathinfo($dosya['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            return [
                'status' => 0,
                'msg' => 'İzin verilmeyen dosya türü: ' . $extension,
                'fileInfo' => $dosya
            ];
        }

        // Benzersiz dosya adı üret
        $newFileName = uniqid('dosya_', true) . '.' . $extension;
        $pathUrl = $targetFolder . $newFileName;

        //! Site Url
        $base_url = Config::get('app', 'base_url');
        //echo "base_url:"; echo $base_url; 

        //! Klasor Yoksa Oluşturma
        if (!is_dir($targetFolder)) { mkdir($targetFolder, 0755, true); }

        //! Dosya Yükleme
        if (move_uploaded_file($dosya['tmp_name'], $pathUrl)) {
            $upload_status = 1;
            $upload_mesaj = 'Dosya yüklendi: ' . $newFileName;
            $dosya['new_name'] = $newFileName;
            $dosya['pathUrl'] = $pathUrl; //! Dosya Kayıt Yeri
            $dosya['fileUrl'] = $base_url."/".$pathUrl; //! Dosya Yeri
            
            
            //! Dosya Boyutu
            $sizeKB= $dosya['size']/1024;
            $dosya['sizeKB'] = number_format($sizeKB, 2); //! Boyut
            
           
            
        } else { $upload_mesaj = 'Dosya yüklenemedi.'; }
        //! Dosya Yükleme -- Son

        return [
            'status' => $upload_status,
            'msg' => $upload_mesaj,
            'fileInfo' => $dosya
        ];
    }


    //! ÇoklU Dosya Yükleme
    public static function uploadMultipleFiles($fileKey = 'dosyalar', $targetFolder = 'public/uploads/', $allowedExtensions = ['jpg', 'png', 'pdf']) {
        $upload_status = 1; // tüm dosyalar başarılıysa 1
        $upload_mesaj = '';
        $dosyalar = [];

        //! Site Url
        $base_url = Config::get('app', 'base_url');
        //echo "base_url:"; echo $base_url; 

        if (!isset($_FILES[$fileKey])) {
            return [
                'status' => 0,
                'msg' => 'Dosya verisi gönderilmedi.',
                'fileInfo' => [],
            ];
        }

        $fileCount = count($_FILES[$fileKey]['name']);

        if (!is_dir($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        }

        for ($i = 0; $i < $fileCount; $i++) {
            $dosya = [
                'name' => $_FILES[$fileKey]['name'][$i],
                'type' => $_FILES[$fileKey]['type'][$i],
                'tmp_name' => $_FILES[$fileKey]['tmp_name'][$i],
                'error' => $_FILES[$fileKey]['error'][$i],
                'size' => $_FILES[$fileKey]['size'][$i],
            ];

            $extension = strtolower(pathinfo($dosya['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                $upload_status = 0;
                $dosya['upload_msg'] = "İzin verilmeyen uzantı: $extension";
                $dosyalar[] = $dosya;
                continue;
            }

            $newFileName = uniqid('dosya_', true) . '.' . $extension;
            $pathUrl = $targetFolder . $newFileName;

            if (move_uploaded_file($dosya['tmp_name'], $pathUrl)) {
                $dosya['upload_msg'] = "Yüklendi";
                $dosya['new_name'] = $newFileName;
                $dosya['pathUrl'] = $pathUrl; //! Dosya Kayıt Yeri
                $dosya['fileUrl'] = $base_url."/".$pathUrl; //! Dosya Yeri
                
                
                //! Dosya Boyutu
                $sizeKB= $dosya['size']/1024;
                $dosya['sizeKB'] = number_format($sizeKB, 2); //! Boyut

            } else {
                $upload_status = 0;
                $dosya['upload_msg'] = "Yüklenemedi";
            }

            $dosyalar[] = $dosya;
        }

        return [
            'status' => $upload_status,
            'msg' => 'Yükleme tamamlandı.',
            'fileInfo' => $dosyalar
        ];
    }
    //! ÇoklU Dosya Yükleme - Son
}
