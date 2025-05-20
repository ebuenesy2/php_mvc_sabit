<?php

class errors {
    
    public static function index($title = null,$message = null,$status = 0 ){
        
        //! Return
        $return = array(
            'title' => $title,
            'message' => $message,
            'status' => $status,
        );
        
        echo json_encode($return);

    }

    public static function notFound($title = null,$message = null,$status = 0){ 
        
        //! Return
        $return = array(
            'title' => $title == null ? 'Sayfa Bulunamadı' : $title,
            'message' => $message,
            'status' => $status,
        );
        
        echo json_encode($return);

    }
    
}

?>