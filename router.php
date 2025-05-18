<?php

    $routes =  [

        array(
            "path" => '/',
            'method' =>'GET',
            'controller' =>'home',            
        ),
        array(
            "path" => '/',
            'method' =>'POST',
            'controller' =>'home_Post',            
        ),
        array(
            "path" => '/test',
            'method' =>'GET',
            'controller' =>'test_Get',            
        ),
        array(
            "path" => '/test/:id',
            'method' =>'GET',
            'controller' =>'test_Get_Url',            
        ),
        array(
            "path" => '/test/:id/name/:name',
            'method' =>'GET',
            'controller' =>'test_Get_Url_Name',            
        ),
       array(
            "path" => '/params',
            'method' =>'GET',
            'controller' => 'test_Get_params',
        ),
        array(
            "path" => '/headers',
            'method' =>'GET',
            'controller' => 'Get_headers',
        ),
        array(
            "path" => '/bearer_token',
            'method' =>'GET',
            'controller' => 'Get_headers_Authorization_BearerToken',
        ),        
        array(
            "path" => '/bearer_token',
            'method' =>'POST',
            'controller' => 'POST_headers_Authorization_BearerToken',
        ),
        
        array(
            "path" => '/info',
            'method' =>'GET',
            'controller' => 'Get_Info',
        ), 
        
       
       
    ];

?>

