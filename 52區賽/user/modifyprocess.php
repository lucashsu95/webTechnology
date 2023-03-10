<?php
include('../link.php');
$sql = $db->prepare('update users set account=:act,password=:pwd,name=:name,role=:r where id=:id');
$sql->bindValue("id",$_POST['id']);
$sql->bindValue("act",$_POST['act']);
$sql->bindValue("pwd",$_POST['pwd']);
$sql->bindValue("name",$_POST['name']);
$sql->bindValue("r",$_POST['role']);
$sql->execute();
header("location:./");