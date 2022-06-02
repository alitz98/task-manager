<?php



function isLoggedIn(){

    return isset($_SESSION['login']);
}

function logout(){
    unset($_SESSION['login']);
}



function logIn($user,$pass){

    global $admins;
    if(array_key_exists($user,$admins) and $admins[$user]==$pass){

        $_SESSION['login']=1;
        return true;
    }
    return false;

}

function getlocation($params=[]){
    global $pdo;
    $condition='';
    if(isset($params) and in_array($params['verified'],['0','1'])){
        $condition="WHERE verified={$params['verified']}";
    }

    $sql="SELECT * FROM locations $condition";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}