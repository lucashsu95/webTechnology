<?php
include('link.php');
$sql = $db->prepare('delete from utodo where id=:id');
$sql->bindValue('id',$_GET['id']);
$sql->execute();
header('location:work.php');