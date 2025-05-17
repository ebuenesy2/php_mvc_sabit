<?php

class Route {

    //! Url Parçalama
    public static function parse_url()
    {
        $dirname = dirname($_SERVER['SCRIPT_NAME']); //! Proje Dosya Adresi [ örnek : /dashboard/local_yildirimdev/Router ]
        $dirname = $dirname != '/' ? $dirname : null;
        $basename = basename($_SERVER['SCRIPT_NAME']); //! index.php
        $REDIRECT_URL = $_SERVER['REDIRECT_URL']; //! Yonlendirme Url [ örnek : /dashboard/local_yildirimdev/Router/params ]
        $request_uri = str_replace($dirname,null,$REDIRECT_URL); //! Url [ örnek : /params ]
        return $request_uri;
    } //! Url Parçalama Son

    //! Url Arama
    public static function searchForUrl($array,$search) {

        $id = null;
        $status = 0;
        $method = $_SERVER['REQUEST_METHOD']; //! GET - POST
        //echo "method:"; echo $method; die();
        

        // POST verisi oku (JSON varsa onu al, yoksa $_POST kullan)
        $postRaw = file_get_contents('php://input'); //! Gelen Veriler
        $postJson = json_decode($postRaw, true); //! Json Veriler
        $postAll = $postJson ?? $_POST;

        $get_url = array(); //! Url Parametre Alma
        //echo "<pre>"; print_r($get_url); die();

        //! Url Arama
        foreach ($array as $key => $val) {  
            
            if ($val['path'] == $search && $val['method'] == $method) {  $id = $key; $status= 1; break;   }
            else {

                //! Tanım
                $id = $key; 
                $path = $val['path'];  //! Url
                

                //! Tanım - Dizi
                $array_path=explode("/",$path);  //! /user/:id
                $array_search=explode("/",$search); //! /user/1

                if( $val['method'] == $method  ) {

                    //! Get - Url
                    if(count($array_path) == count($array_search)) {  
                        foreach($array_path as $key_path => $val_path ) { 
                            if($array_search[$key_path] == $array_path[$key_path]) {  } //! echo "var: "; echo $array_path[$key_path]; echo " "; 
                            else { 
                                $array_path_key=explode(":",$array_path[$key_path]);  
                                if(count($array_path_key) >=2) { $lastData = end($array_path_key) ? end($array_path_key) : null; $get_url[$lastData] = $array_search[$key_path]; $status = 1; }
                                else {  break;  } 
                            }
                        }
                        
                        if($status == 1) { break;  }

                    } //! Get - Url Son
                
                }

            }
            
        }  //! Url Arama Son
    

        //! Return
        cancelReturn: //! 
        $return = array(
           'id' => $status == 1 ? $id : null,
           'url' => $search,
           'method' => $method,
           'status' => $status,
           'postAll' => $method == "POST" ? $postAll : [],
           'getUrl' => $status == 1 ? $get_url : [],
        );
       
        return json_encode($return);
        
    } //! Url Arama Son

    public static function run() 
    {
        require 'router.php'; //! Router
        require 'app/error/index.php'; //! Error
        require 'controllers/index.php'; //! controllers
        
        $request_uri = self::parse_url(); //! Url
        //echo "request_uri:"; echo $request_uri; die();

        $searchForUrl = self::searchForUrl($routes,$request_uri); //! Url Arama
        $searchForUrl_Json = json_decode($searchForUrl); //! Json
        $status = $searchForUrl_Json->status; //! Status
        //echo "<pre>"; print_r($searchForUrl_Json); die();
        //echo "status:"; echo $status; die();
         

        if($status == 1) { 

            //! Veri Okuma
            //echo "<pre>";
            //print_r($routes);
            //print_r($routes[$searchForUrl_Json->index]); //! Array Okuma
            //echo $routes[$findindex]["controller"]; //! test
            //die();

           
            $id = $searchForUrl_Json->id;
            $method = $routes[$id]["method"]; //! Method Type
            $controller = $routes[$id]["controller"]; //! Controller Function
            $postAll = $searchForUrl_Json->postAll ? $searchForUrl_Json->postAll : [] ; //! Post 
            $getUrl = $searchForUrl_Json->getUrl; //! Get Url Paramatre 
           
            //echo "<pre>";
            //print_r($searchForUrl_Json); die();
            //print_r($postAll); die();
            //echo "name:"; echo $postAll->name; die();
           
            //echo "method:"; echo $method; echo "<br>";
            //echo "controller:"; echo $controller;

            //! Return
            $return = array(
                'id' => $status == 1 ? $id : null,
                'url' => $request_uri,
                'method' => $method,                
                'controller' => $controller,                
                //'searchForUrl_Json' => $searchForUrl_Json,                
                'postAll' => $method == "POST" ? $postAll : [],
                'getUrl' => $status == 1 ? $getUrl : [],
            );
            
            //print_r($return); die();

            //! Controller Yönlendirme
            if($method == "GET") {  Controller::$controller($getUrl);  }
            if($method == "POST") {  Controller::$controller($postAll);  }

            

        }
        else { errors::notFound(); } //! Sayfa bulunamdı. 404
        
     
       
    }
}


    