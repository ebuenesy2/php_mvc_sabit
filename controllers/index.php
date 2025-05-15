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
        //! echo "Controller test_Post"; echo " ";

        //! Post Okuma
        //! echo "<pre>"; print_r($req); die(); //! Tüm Veriler
        //! echo "name:"; echo $req->name; die(); //! Tek Veri Okuma

        // //! Json
        // $postJson = $req->name;
        // $postJson = $req->name;
        // echo "<pre>"; print_r($postJson); die(); //! Tüm Json Veriler
        // //! echo "<pre>"; print_r($postJson[0]); die(); //! Json Veri
        // //! echo "id:"; print_r($postJson[0]->id); die(); //! Tek Veri

    }

    public static function test_Get($req = null){
        echo "Controller test_Get";
    }

    public static function test_Get_Url($req = null){
        echo "Controller test_Get_Url";
    }

    public static function auth_Post_authorization($req = null){
        //! echo "Controller auth_Post_authorization"; echo " ";

        $headers = getallheaders(); //! Header
        $headers_Authorization = $headers["Authorization"]; //! Bearer abcToken
        $Authorization = explode("Bearer ",$headers_Authorization)[1]; //! abcToken

        echo "<pre>"; print_r($headers); die();
        
        if($Authorization == "abcToken") { echo "token var"; }
        else { echo "token yok"; }

    }

    public static function test_Get_params($req = null) {
        //! echo "Controller test_Get_params";
        
        //! Params Okuma
        //! echo "<pre>"; print_r($_GET); die(); //! Tüm Params
        echo "name:"; echo $_GET["name"]; die(); //! Tek Params Okuma
    }
    

}

?>