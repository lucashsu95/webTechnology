<?php
include('link.php');
$sql = $db->prepare('insert into record(acc,pass,time) values(:acc,:pass,:time)');
$sql->bindValue("acc",$_SESSION['acc']);
$sql->bindValue("pass",$_SESSION['pass']);
$sql->bindValue("time",date('Y-m-d H:i:s'));
$sql->execute();
header("location:./");