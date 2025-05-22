<?php

    $routes =  [

        array(
            "path" => '/',
            'method' =>'GET',
            'controller' =>'HomeController',            
            'controller_method' =>'home',            
        ),
        array(
            "path" => '/test',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' =>'test_Get',            
        ),
        array(
            "path" => '/test/:id',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' =>'test_Get_Url',            
        ),
        array(
            "path" => '/test/:id/name/:name',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' =>'test_Get_Url_Name',            
        ),
       array(
            "path" => '/params',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' => 'test_Get_params',
        ),
        array(
            "path" => '/',
            'method' =>'POST',
            'controller' =>'HomeController',  
            'controller_method' =>'home_Post',            
        ),
        array(
            "path" => '/:id',
            'method' =>'POST',
            'controller' =>'HomeController',  
            'controller_method' =>'home_Post_Url',            
        ),
        array(
            "path" => '/headers',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' => 'Get_headers',
        ),
        array(
            "path" => '/bearer_token',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' => 'Get_headers_Authorization_BearerToken',
        ),   
       
        
        //! Proje Bilgileri
        array(
            "path" => '/info',
            'method' =>'GET',
            'controller' =>'HomeController',  
            'controller_method' => 'Get_Info',
        ), 


        //! Dosya İşlemleri
        array(
            "path" => '/file/get',
            'method' =>'GET',
            'controller' =>'FileController',  
            'controller_method' => 'home',
        ), 


        //! Mysql Api İşlemleri
        array(
            "path" => '/api/test',
            'method' =>'GET',
            'controller' =>'TestController',  
            'controller_method' => 'home',
        ), 

        array(
            "path" => '/api/test/all',
            'method' =>'GET',
            'controller' =>'TestController',  
            'controller_method' => 'all',
        ), 

        array(
            "path" => '/api/test/find/:id',
            'method' =>'GET',
            'controller' =>'TestController', 
            'controller_method' => 'find',
        ), 

        array(
            "path" => '/api/test/find_post',
            'method' =>'POST',
            'controller' =>'TestController',  
            'controller_method' => 'find_post',
        ), 

        array(
            "path" => '/api/test/find_multi_post',
            'method' =>'POST',
            'controller' =>'TestController',  
            'controller_method' => 'find_multi_post',
        ), 
        
        array(
            "path" => '/api/test/find_user',
            'method' =>'POST',
            'controller' =>'TestController',  
            'controller_method' => 'find_user',
        ), 

        array(
            "path" => '/api/test/add',
            'method' =>'POST',
            'controller' =>'TestController',  
            'controller_method' => 'add',
        ),

        array(
            "path" => '/api/test/delete/:id',
            'method' =>'POST',
            'controller' =>'TestController', 
            'controller_method' => 'delete',
        ), 

        array(
            "path" => '/api/test/multi/delete',
            'method' =>'POST',
            'controller' =>'TestController', 
            'controller_method' => 'multi_delete',
        ), 

        array(
            "path" => '/api/test/edit',
            'method' =>'POST',
            'controller' =>'TestController',  
            'controller_method' => 'edit',
        ),
        
        array(
            "path" => '/api/test/edit/delete',
            'method' =>'POST',
            'controller' =>'TestController',  
            'controller_method' => 'edit_delete',
        ),

        array(
            "path" => '/api/test/control',
            'method' =>'GET',
            'controller' =>'TestController',  
            'controller_method' => 'runTests',
        ),
        
       
       
    ];

?>

