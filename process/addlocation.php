<?php
include "C:/xampp/htdocs/7map/bootstrap/init.php";

// addlocation($_POST);
// var_dump($_POST);

if( addlocation($_POST)){

    echo "مکان با موفقیت ثبت شد";

}else{

    echo "مشکلی پیش امده";
}