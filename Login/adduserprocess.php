<?php
include('link.php');
$sql = $db->prepare('insert into user(account,password,role) values(:act,:pwd,:role)');
$sql->bindValue('act',$_POST['act']);
$sql->bindValue('pwd',$_POST['pwd']);
$sql->bindValue('role',$_POST['role']);
$sql->execute();
header('location:user/index.php');