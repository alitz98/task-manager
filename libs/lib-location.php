<?php

function addlocation($data){

    global $pdo;
    $userid=1;
    $sql="INSERT INTO `locations`(`user_id`,`title`, `lat`, `lng`, `type`) VALUES(:user_id,:title,:lat,:lng,:type);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['user_id'=>$userid,':title'=>$data['title'],':lat'=>$data['lat'],':lng'=>$data['lng'],':type'=>$data['type']]);
    return $stmt->rowCount();
}