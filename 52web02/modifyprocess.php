<?php
include('link.php');
$sql = $db->prepare('update users set account=:acc,password=:pwd,role=:r where id=:id');
$sql->bindValue("id",$_POST['id']);
$sql->bindValue("acc",$_POST['acc']);
$sql->bindValue("pwd",$_POST['pwd']);
$sql->bindValue("r",$_POST['role']);
$sql->execute();
header("location:./");