<?php
   session_start();

   /*define ('DB_NAME', 'sql8528856');
   define ('DB_USER', 'sql8528856');
   define ('DB_PASSWORD', 'uwJtrRc2xa');
   define ('DB_HOST', 'sql8.freesqldatabase.com');*/

   //define ('DB_NAME', 'Library');
   //define ('DB_USER', 'Library');
   //define ('DB_PASSWORD', 'Library@2022!');
   //define ('DB_HOST', 'localhost');

    //$connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $connection = mysqli_connect('localhost', 'Library', 'Library@2022!', 'Library');

    if(!$connection){
       die('Could not connect:' .mysqli_connect_error());
    }

?>