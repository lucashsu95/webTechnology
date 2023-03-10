<?php
include('../link.php');
$sql = $db->prepare('update user set account=:act,password=:pwd,role=:role where id=:id');
$sql->bindValue('id',$_POST['id']);
$sql->bindValue('act',$_POST['act']);
$sql->bindValue('pwd',$_POST['pwd']);
$sql->bindValue('role',$_POST['role']);
$sql->execute();
header('location:./');