<?php

class FileController
{
    public function home($req = [])
    {
        echo "Dosya Anasayfa GET<br>";
        print_r($req);
    }

    public function home_Post($req = [])
    {
        echo "Anasayfa POST<br>";
        print_r($req);
    }
}
