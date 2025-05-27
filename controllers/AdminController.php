<?php

require 'app/function/Database.php'; //! Mysql

class AdminController {

        
    public static function home($req = null){
        echo "Controller Admin Home"; echo "<br>";

        view('admin/index'); //! Sayfa Görüntüleme
    }

    public static function test($req = null){
        echo "Controller Admin Test"; echo "<br>";
    }


    public static function test_view($req = null){
        //echo "Controller Admin Test View"; echo "<br>";

        view('admin/test'); //! Sayfa Görüntüleme
    }
    
    public static function login($req = null){
        //echo "Controller Admin Login"; echo "<br>";
        view('admin/login'); //! Sayfa Görüntüleme
        
    }

    
    public static function login_Post($req = null){
        //echo "Controller Admin Login Post"; echo "<br>"; die();
        //echo "<pre>"; print_r($req);  die(); // Tüm Veriler

        //! Post Okuma
        $postAll = $req['postAll']; // Tüm POST Veriler
        //echo "<pre>"; print_r($postAll);  // Tüm Veriler

        $email =  $postAll['email'];  // Email
        $password =  $postAll['password'];  // Password

        
        // Kullanıcıyı veritabanında ara
        $user = DB::table('users')->where('email', '=', $email)->first();
        //echo "<pre>"; print_r($user); die();
         

        $_SESSION['status'] = [
            'type'      => "error",
            'msg'      => "Geçersiz Giriş",
        ];

        redirect('/admin/login');

    }

    public static function register($req = null){
        //echo "Controller Admin Login"; echo "<br>";

        view('admin/register'); //! Sayfa Görüntüleme
    }


}

?>