<?php
include('../link.php');
$sql = $db->prepare('insert into users(account,password,name,role) values(:account,:password,:name,:role)');

if($_POST['id']){
    $sql = $db->prepare('update users set account=:account,password=:password,name=:name,role=:role where id=:id');
    $sql->bindValue("id",$_POST['id']);
}

$sql->bindValue("account",$_POST['account']);
$sql->bindValue("password",$_POST['password']);
$sql->bindValue("name",$_POST['name']);
$sql->bindValue("role",$_POST['role']);
$sql->execute();
header('location:./');
