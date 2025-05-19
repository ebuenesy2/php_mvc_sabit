<?php

    $routes =  [

        array(
            "path" => '/',
            'method' =>'GET',
            'controller' =>'AnasayfaController',            
            'controller_method' =>'home',            
        ),
        array(
            "path" => '/',
            'method' =>'POST',
            'controller' =>'AnasayfaController',  
            'controller_method' =>'home_Post',            
        ),
        array(
            "path" => '/test',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' =>'test_Get',            
        ),
        array(
            "path" => '/test/:id',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' =>'test_Get_Url',            
        ),
        array(
            "path" => '/test/:id/name/:name',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' =>'test_Get_Url_Name',            
        ),
       array(
            "path" => '/params',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' => 'test_Get_params',
        ),
        array(
            "path" => '/headers',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' => 'Get_headers',
        ),
        array(
            "path" => '/bearer_token',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' => 'Get_headers_Authorization_BearerToken',
        ),        
        array(
            "path" => '/bearer_token',
            'method' =>'POST',
            'controller' =>'AnasayfaController',  
            'controller_method' => 'POST_headers_Authorization_BearerToken',
        ),
        
        array(
            "path" => '/info',
            'method' =>'GET',
            'controller' =>'AnasayfaController',  
            'controller_method' => 'Get_Info',
        ), 
        
       
       
    ];

?>

