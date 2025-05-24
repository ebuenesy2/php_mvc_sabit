<?php

class HomeController {
    
    
    public static function home($req = null){
        echo "Controller Home"; echo "<br>";

        $base_url = Config::get('app', 'base_url');
        echo "base_url:"; echo $base_url; 

        echo "<br>";

        $host = Config::get('db', 'host');
        echo "host:"; echo $host;
    }

    public static function test_Get($req = null){
        echo "Controller test_Get"; echo "<br>";
    }

    public static function test_Get_Url($req = null){
        echo "Controller test_Get_Url"; echo "<br>";echo "<br>";

        
        //! Tüm veriler
        //echo "<pre>"; print_r($req); die();
        $getUrl = $req['getUrl'];

        echo "<pre>"; print_r($getUrl);  // Tüm Get Veriler
        echo "id: "; echo $getUrl['id']; //! Tek Veri Okuma

    }

    public static function test_Get_Url_Name($req = null){
        echo "Controller test_Get_Url_Name"; echo "<br>";

        //! Tüm veriler
        //echo "<pre>"; print_r($req); die();
        $getUrl = $req['getUrl'];

        echo "<pre>"; print_r($getUrl);  // Tüm Get Veriler
        echo "id: "; echo $getUrl['id']; //! Tek Veri Okuma
        echo "<br>";
        echo "name: "; echo $getUrl['name']; //! Tek Veri Okuma
       
    }

    public static function test_Get_params($req = null) {
        echo "Controller test_Get_params"; echo "<br>";
        
        //! Params Okuma
        echo "<pre>"; print_r($_GET); die(); //! Tüm Params
        echo "name:"; echo $_GET["name"]; die(); //! Tek Params Okuma
    }

    public static function home_Post($req = null){
        echo "Controller Home Post"; echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        echo "<pre>"; print_r($postAll);  // Tüm Veriler

        //echo "name: " . $postAll['name'];  // Tekil Veri

        //! Json
        $postJson = json_encode($postAll); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor

        //echo "<pre>"; print_r($data);         // tüm veri
        //echo "name: "; echo $data->name ?? 'yok';  // eğer array içindeki object varsa
        //echo $data[0]->id ?? 'yok';           // eğer array içindeki object varsa

    }
    
    public static function home_Post_Url($req = null){
        echo "Controller Home Post"; echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        //echo "<pre>"; print_r($postAll);  // Tüm Veriler

        //echo "name: " . $postAll['name'];  // Tekil Veri

        //! Json
        $postJson = json_encode($postAll); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor

        //echo "<pre>"; print_r($data);         // tüm veri
        //echo "name: "; echo $data->name ?? 'yok';  // eğer array içindeki object varsa
        //echo $data[0]->id ?? 'yok';           // eğer array içindeki object varsa


        //! Get Url
        $getUrl = $req['getUrl']; // Tüm GET Veriler
        //echo "<pre>"; print_r($getUrl);  // Tüm Veriler

        echo "id: " . $getUrl['id'];  // Tekil Veri

        //$id = intval($getUrl['id']);
        //echo "id: " . $id;  // Tekil Veri
    }

    public static function Get_headers($req = null){
        echo "Controller Get_headers"; echo "<br>"; 

        $headers = getallheaders(); //! Header
        //echo "<pre>"; print_r($headers); die();

        $headers_Data_yildirimdev_api_user_name = $headers["yildirimdev_api_user_name"];
        echo "headers_Data_yildirimdev_api_user_name: "; echo $headers_Data_yildirimdev_api_user_name; die();

    }
    
    public static function Get_headers_Authorization_BearerToken($req = null){
        echo "Controller Get_headers_Authorization_BearerToken"; echo "<br>";  

        $headers = getallheaders(); //! Header
        //echo "<pre>"; print_r($headers); die();

        $headers_Authorization = $headers["Authorization"]; //! Bearer abcToken
        $Authorization = explode("Bearer ",$headers_Authorization)[1]; //! abcToken
        
        if($Authorization == "abcToken") { echo "token var"; }
        else { echo "token yok"; }

    }
    
    
    //! View
    public static function GET_View($req = null){
        //echo "Controller GET_View"; echo "<br>";
        
        view('index'); //! Sayfa Görüntüleme

    }
    //! View Son

    //! View -den verileri Alma
    public static function Post_Form_Gonder($req = null){
        echo "Controller Post_Form_Gonder"; echo "<br>";
        //echo "<pre>"; print_r($req); die();  // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        // echo "<pre>"; print_r($postAll); die(); // Tüm Veriler
         
        echo "name: " . $postAll['name'];  // Tekil Veri
        
    }
    //! View -den verileri Alma - Son
        
    //! View - About
    public static function GET_View_About($req = null){
        echo "Controller GET_View_About"; echo "<br>"; 

        
        view('/web/about'); //! Sayfa Görüntüleme

    }
    //! View  - About -  Son


    
    //! Dosya Yükleme
    public static function Post_File_Upload($req = null){
        //echo "Controller Post_File_Upload"; echo "<br>";
        //echo "<pre>"; print_r($req); die();  // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        //echo "<pre>"; print_r($postAll); die(); // Tüm Veriler
        
        //! Tanım
        $upload_status = 0; //! Yükleme Durumu
        $upload_mesaj = ""; //! Yükleme Mesaj
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['dosya'])) {

            $dosya = $_FILES['dosya'];
            $dosyaAdi = basename($dosya['name']);
            $hedefKlasor = 'public/uploads/';
            $hedefYol = $hedefKlasor . $dosyaAdi;
            

            // Yükleme kontrolü
            if (move_uploaded_file($dosya['tmp_name'], $hedefYol)) { $upload_status = 1; } 
            else { $upload_status = 0; } 
       
            //! Return
            $return = array(
                'title'=> 'Dosya Yukleme',
                'status' => $upload_status,
                'msg' => 'xx',
                'post' => $postAll,
                'fileInfo' => $dosya,
            );
            
            //echo json_encode($return); //! Json
            echo "<pre>"; print_r($return); die(); // Return

        } else {
            echo "Geçersiz istek.";
        }
        
    }
    //! Dosya Yükleme -- Son
    

    //! Proje Bilgileri    
    public static function Get_Info($req = null)
    {
        echo "Proje Bilgileri<br><br>";

        $appTitle      = Config::get('app', 'app_title');
        $version       = Config::get('app', 'app_version');
        $author        = Config::get('app', 'author');
        $createdAt     = Config::get('app', 'created_at');
        $lastUpdated   = Config::get('app', 'last_updated');
        $baseUrl       = Config::get('app', 'base_url');
        $debug         = Config::get('app', 'debug') ? 'Açık' : 'Kapalı';

        echo "Uygulama Adı: <strong>$appTitle</strong><br>";
        echo "Versiyon: <strong>$version</strong><br>";
        echo "Geliştirici: <strong>$author</strong><br>";
        echo "Yayın Tarihi: <strong>$createdAt</strong><br>";
        echo "Son Güncelleme: <strong>$lastUpdated</strong><br>";
        echo "Base URL: <strong>$baseUrl</strong><br>";
        echo "Debug Modu: <strong>$debug</strong><br>";
    }

}

?>