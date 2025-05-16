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
            "path" => '/test',
            'method' =>'POST',
            'controller' => 'test_Post_Test',
        ),
        array(
            "path" => '/authorization',
            'method' =>'POST',
            'controller' => 'auth_Post_authorization',
        ),
        array(
            "path" => '/params',
            'method' =>'GET',
            'controller' => 'test_Get_params',
        ),
        array(
            "path" => '/params',
            'method' =>'POST',
            'controller' => 'test_Post_params',
        ),
    ];

?>

