<?php

class Errors {
    
    public static function index($error = null ){
        
        //! Return
        $return = array(
            'error' => $error,
            'status' => $error == null ? 1 : 0,
        );
        
        echo json_encode($return);

    }

    public static function notFound(){ echo "Sayfa Bulunamadı"; }

}

?>