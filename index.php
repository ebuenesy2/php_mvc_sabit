<?php

   require_once 'app/core/config.php';
   Config::load(); // config dosyalarını yükle

   //! Zaman Türkiy Saati Ayarla
   $timezone = Config::get('app', 'timezone');
   //echo "timezone:"; echo $timezone;  die();
   date_default_timezone_set($timezone);

   
   require 'app/router/index.php'; //! Router
   Route::run(); //! Router Run


?>