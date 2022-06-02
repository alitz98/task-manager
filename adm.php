<?php

include "C:/xampp/htdocs/7map/bootstrap/init.php";



if(isset($_GET['logout'])and $_GET['logout']==1 ){

    logout();

}


if ($_SERVER['REQUEST_METHOD']=='POST') {

    if(logIn($_POST['username'],$_POST['password'])){

    }else{
        echo "رمز عبور یا نام کاربری اشتباه است";
    }
    
    
}



if (isLoggedIn()) {

    $params=$_GET ?? [];

    $location=getlocation($params);
    
    include "C:/xampp/htdocs/7map/tpl/tpl-adm.php";
}else{

    include "C:/xampp/htdocs/7map/tpl/tpl-adm-auth.php";

}

