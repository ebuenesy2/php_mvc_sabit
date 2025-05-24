<?php
class FileHelper {
    public static function uploadFile($fileKey = 'dosya', $hedefKlasor = 'public/uploads/', $izinliUzantilar = ['jpg', 'png', 'pdf']) {
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
        $uzanti = strtolower(pathinfo($dosya['name'], PATHINFO_EXTENSION));

        if (!in_array($uzanti, $izinliUzantilar)) {
            return [
                'status' => 0,
                'msg' => 'İzin verilmeyen dosya türü: ' . $uzanti,
                'fileInfo' => $dosya
            ];
        }

        // Benzersiz dosya adı üret
        $yeniDosyaAdi = uniqid('dosya_', true) . '.' . $uzanti;
        $hedefYol = $hedefKlasor . $yeniDosyaAdi;

        //! Klasor Yoksa Oluşturma
        if (!is_dir($hedefKlasor)) { mkdir($hedefKlasor, 0755, true); }

        if (move_uploaded_file($dosya['tmp_name'], $hedefYol)) {
            $upload_status = 1;
            $upload_mesaj = 'Dosya yüklendi: ' . $yeniDosyaAdi;
            $dosya['yeni_ad'] = $yeniDosyaAdi;
            $dosya['yol'] = $hedefYol;
        } else {
            $upload_mesaj = 'Dosya yüklenemedi.';
        }

        return [
            'status' => $upload_status,
            'msg' => $upload_mesaj,
            'fileInfo' => $dosya
        ];
    }
}
