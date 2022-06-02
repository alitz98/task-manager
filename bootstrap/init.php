<?php

session_start();

include "C:/xampp/htdocs/7map/vendor/autoload.php";
include "C:/xampp/htdocs/7map/bootstrap/config.php";
include "C:/xampp/htdocs/7map/bootstrap/constant.php";

try {

 $pdo=new PDO('mysql:host=localhost;dbname=7map', 'root', ''); 
    
    
} catch (PDOException $e) {
    echo "error in:".$e->getMessage();
    
}

include "C:/xampp/htdocs/7map/libs/lib-users.php";
include "C:/xampp/htdocs/7map/libs/lib-location.php";
