<?php

require 'app/function/test.php'; //! Fonksiyon

class TestController
{
    public function home($req = [])
    {
        echo "Mysql Anasayfa GET<br>";
        print_r($req);
    }

    public function all($req = [])
    {
        echo "Mysql Hepsi GET<br>";

        
        

        
    }

}
