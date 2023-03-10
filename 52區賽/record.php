<?php
include('link.php');
$sql = $db->prepare('insert into record(id,account,loginTime,logoutTime,type) values(:id,:act,:login,:logout,:type)');
$sql->bindValue('id',$_SESSION['id']);
$sql->bindValue('act',$_SESSION['act']);
$sql->bindValue('login',$_SESSION['login']);
$sql->bindValue('logout',$_SESSION['logout']);
$sql->bindValue('type',$_SESSION['type']);
$sql->execute();
if($_SESSION['err'] >= 3){
    $_SESSION['err'] = 0;
    header("location:err.html");
}else{
    header("location:index.php");
}
