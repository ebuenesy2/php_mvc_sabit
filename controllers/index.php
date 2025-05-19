<?php

class Controller {
    
    
    public static function home($req = null){
        echo "Controller Home"; echo "<br>";

        $base_url = Config::get('app', 'base_url');
        echo "base_url:"; echo $base_url; 

        echo "<br>";

        $host = Config::get('db', 'host');
        echo "host:"; echo $host;
    }

    public static function home_Post($req = null){
        echo "Controller Home Post"; echo "<br>";

        //! Post Okuma
        echo "<pre>"; print_r($req); // Tüm POST verileri
        echo "name: " . $req->name;  // Tekil veri

        // //! Json
        // $postJson = $req->name;
        // echo "<pre>"; print_r($postJson); die(); //! Tüm Json Veriler
        // //! echo "<pre>"; print_r($postJson[0]); die(); //! Json Veri
        // //! echo "id:"; print_r($postJson[0]->id); die(); //! Tek Veri

    }

    public static function test_Get($req = null){
        echo "Controller test_Get"; echo "<br>";
    }

    public static function test_Get_Url($req = null){
        echo "Controller test_Get_Url"; echo "<br>";

        
        //! Tüm veriler
        //echo "<pre>"; print_r($req); die();
        echo "id: "; echo $req->id; //! Tek Veri Okuma

    }

    public static function test_Get_Url_Name($req = null){
        echo "Controller test_Get_Url_Name"; echo "<br>";

        //echo "<pre>"; print_r($req); die();
        //echo "id: "; echo $req->id; //! Tek Veri Okuma
        echo "name: "; echo $req->name; //! Tek Veri Okuma
       
    }

    public static function test_Get_params($req = null) {
        //! echo "Controller test_Get_params"; echo "<br>";
        
        //! Params Okuma
        echo "<pre>"; print_r($_GET); die(); //! Tüm Params
        echo "name:"; echo $_GET["name"]; die(); //! Tek Params Okuma
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

    public static function POST_headers_Authorization_BearerToken($req = null){
        echo "Controller POST_headers_Authorization_BearerToken"; echo "<br>";  

        //! Post Okuma
        echo "<pre>"; print_r($req); // Tüm POST verileri
        //echo "name: " . $req->name;  // Tekil veri

        echo "<br>";  

        //! Json
        // $postJson = $req->name;
        // echo "<pre>"; print_r($postJson); die(); //! Tüm Json Veriler
        // //! echo "<pre>"; print_r($postJson[0]); die(); //! Json Veri
        // //! echo "id:"; print_r($postJson[0]->id); die(); //! Tek Veri
        //! Post Okuma -- Son

        $headers = getallheaders(); //! Header
        //echo "<pre>"; print_r($headers); die();

        $headers_Authorization = $headers["Authorization"]; //! Bearer abcToken
        $Authorization = explode("Bearer ",$headers_Authorization)[1]; //! abcToken
        
        if($Authorization == "abcToken") { echo "token var"; }
        else { echo "token yok"; }

    }
    
    
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