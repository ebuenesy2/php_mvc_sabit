<?php

class errors {
    
    //! Hata
    public static function index($title = null,$message = null,$status = 0 ){
        
        //! Return
        $return = array(
            'title' => $title,
            'message' => $message,
            'status' => $status,
        );
        
        echo json_encode($return);

    }
    //! Hata -- Son


    //! Hata - Sayfa Bulunamadı
    public static function notFound($title = null,$message = null,$status = 0){ 

        http_response_code(404); // ✅ HTTP durum kodunu 404 olarak ayarla
        
        //! Return
        $return = array(
            'title' => $title == null ? 'Sayfa Bulunamadı' : $title,
            'code' => 404,
            'message' => $message,
            'status' => $status,
        );
        
        echo json_encode($return);
    }
    //! Hata - Sayfa Bulunamadı -- Son


    //! Hata - VeriTabanı Hatası
    public static function error500($title = null,$message = null,$status = 0){ 

        http_response_code(500); // ✅ HTTP durum kodunu 500 olarak ayarla
        
        //! Return
        $return = array(
            'title' => $title == null ? 'Veritabanı Bağlantı Hatası' : $title,
            'code' => 500,
            'message' => $message,
            'status' => $status,
        );
        
        echo json_encode($return);
    }
    //! Hata - VeriTabanı Hatası -- Son


    //! Hata - Yetkisiz Hata
    public static function error403($title = null, $message = null, $status = 0)
    {
        http_response_code(403); // 🚫 HTTP 403 - Forbidden

        $return = array(
            'title' => $title ?? 'Yetkisiz Erişim',
            'code' => 403,
            'message' => $message ?? 'Bu işlemi gerçekleştirmek için yetkiniz bulunmamaktadır.',
            'status' => $status,
        );

        header('Content-Type: application/json');
        echo json_encode($return);
    }
    //! Hata - Yetkisiz Hata -- Son


    //! Hata - Hesabınız Askıya Alındı Hatası -- Son
    public static function errorAccountSuspended($title = null, $message = null, $status = 0)
    {
        http_response_code(423); // veya istersen 403 kullanabilirsin

        $return = array(
            'title' => $title ?? 'Hesap Askıya Alındı',
            'code' => 423,
            'message' => $message ?? 'Hesabınız askıya alındığı için bu işlemi gerçekleştiremezsiniz.',
            'status' => $status
        );

        header('Content-Type: application/json');
        echo json_encode($return);
    }
    //! Hata - Hesabınız Askıya Alındı Hatası -- Son
    
}

?>