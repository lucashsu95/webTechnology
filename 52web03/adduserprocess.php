<?php
include('link.php');
$sql = $db->prepare('insert into users(account,password,role) values(:acc,:pwd,:r)');
$sql->bindValue("acc",$_POST['acc']);
$sql->bindValue("pwd",$_POST['pwd']);
$sql->bindValue("r",$_POST['role']);
$sql->execute();
header("location:users.php");