<?php

   require_once 'app/core/config.php';
   Config::load(); // config dosyalarını yükle

   
   require 'app/router/index.php'; //! Router
   Route::run(); //! Router Run

?>