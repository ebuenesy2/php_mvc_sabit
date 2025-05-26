<?php

require_once 'helpers/file_helper.php'; // Dosya

class FileController
{

    
    //! Anasayfa
    public function home($req = [])
    {
        echo "Dosya Anasayfa GET<br>";
        //print_r($req);
    }
    //! Anasayfa -- Son


    public function fileUploadView($req = [])
    {
        //echo "Dosya Yükleme View";
        //print_r($req);

        //! Sayfa Görüntüleme
        view('00_sabit/fileupload');
    }

        
    //! Dosya Yükleme
    public static function Post_File_Upload($req = null){
        //echo "Controller Post_File_Upload"; echo "<br>";
        //echo "<pre>"; print_r($req); die();  // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        //echo "<pre>"; print_r($postAll); die(); // Tüm Veriler


        // Yardımcı fonksiyonu çağır
        $resultFileUpload = FileHelper::uploadFile('dosya');
        //echo "<pre>"; print_r($resultFileUpload); die(); // Tüm Veriler

        $return = array(
            'title' => 'Dosya Yükleme',
            'status' => $resultFileUpload['status'],
            'msg' => $resultFileUpload['msg'],
            'post' => $postAll,
            'fileInfo' => $resultFileUpload['fileInfo'],
        );

       header('Content-Type: application/json');
       echo json_encode($return);

        
    }
    //! Dosya Yükleme -- Son


    
    public function fileUploadViewAjax($req = [])
    {
        //echo "Dosya Yükleme View";
        //print_r($req);

        //! Sayfa Görüntüleme
        view('00_sabit/fileupload_ajax');
    }


    //! Çoklu Dosya Yükleme -- Sayfa
    public function fileUploadViewMultiAjax($req = [])
    {
        //echo "Dosya Yükleme View";
        //print_r($req);

        //! Sayfa Görüntüleme
        view('00_sabit/fileupload_multi_ajax');
    }
    //! Çoklu Dosya Yükleme -- Sayfa - Son


            
    //! Çoklu Dosya Yükleme -- Post
    public static function Post_File_MultiUpload($req = null){
        //echo "Controller Post_File_Upload"; echo "<br>";
        //echo "<pre>"; print_r($req); die();  // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        //echo "<pre>"; print_r($postAll); die(); // Tüm Veriler


        // Yardımcı fonksiyonu çağır
        $result = FileHelper::uploadMultipleFiles('dosyalar');
        //echo "<pre>"; print_r($resultFileUpload); die(); // Tüm Veriler

        echo json_encode([
            'title' => 'Çoklu Dosya Yükleme',
            'status' => $result['status'],
            'msg' => $result['msg'],
            'post' => $postAll,
            'fileInfo' => $result['fileInfo'],
        ]);
    }
    //! Çoklu Dosya Yükleme -- Post -- Son

    
}
