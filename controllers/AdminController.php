<?php

class AdminController {

        
    public static function home($req = null){
        echo "Controller Admin Home"; echo "<br>";

        view('admin/index'); //! Sayfa Görüntüleme

    }


}

?>