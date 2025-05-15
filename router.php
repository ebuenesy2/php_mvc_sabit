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
        array(
            "path" => '/views',
            'method' =>'GET',
            'controller' => 'test_Get_view',
        ),
        array(
            "path" => '/login',
            'method' =>'POST',
            'controller' => 'test_POST _login',
        ),
        array(
            "path" => '/user',
            'method' =>'GET',
            'controller' => 'test_Get_user',
        ),
        array(
            "path" => '/user/login',
            'method' =>'POST',
            'controller' => 'test_GET_User_Login',
        ),
        array(
            "path" => '/user/view',
            'method' =>'GET',
            'controller' => 'test_GET_User_view',
        ),
        array(
            "path" => '/user/view/:id',
            'method' =>'GET',
            'controller' => 'test_GET_user_view_id',
        ),
        array(
            "path" => '/user/edit/:id',
            'method' =>'GET',
            'controller' => 'test_GET_user_Edit_id',
        ),
        array(
            "path" => '/user/edit/:id/:name',
            'method' =>'GET',
            'controller' => 'test_GET_user_Edit_id_name',
        ),
        array(
            "path" => '/user/view/edit/:id',
            'method' =>'GET',
            'controller' => 'test_GET_user_view_Edit_id',
        ),
        array(
            "path" => '/product/:id/:name/:surname',
            'method' =>'GET',
            'controller' => 'test_GET_product_id_name_surname',
        ),
        array(
            "path" => '/user/view/edit/:id/:name',
            'method' =>'GET',
            'controller' => 'test_GET_Url_user_view_Edit_id_name',
        ),
        array(
            "path" => '/user/:id/:name/:surname/edit/:test',
            'method' =>'GET',
            'controller' => 'test_GET_Url_user_id_name_surname_edit_test',
        ),
        array(
            "path" => '/user/:id/:name/:surname/edit/:test',
            'method' =>'POST',
            'controller' => 'test_GET_Url_user_id_name_surname_edit_test',
        ),
       
    ];

?>

