<?php
   session_start();

   define ('DB_NAME', 'sql8528856');
   define ('DB_USER', 'sql8528856');
   define ('DB_PASSWORD', 'uwJtrRc2xa');
   define ('DB_HOST', 'sql8.freesqldatabase.com');

    $connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(!$connection){
       die('Could not connect:' .mysqli_connect_error());
    }

?>