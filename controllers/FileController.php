<?php

class FileController
{
    public function home($params = [])
    {
        echo "Dosya Anasayfa GET<br>";
        print_r($params);
    }

    public function home_Post($params = [])
    {
        echo "Anasayfa POST<br>";
        print_r($params);
    }
}
