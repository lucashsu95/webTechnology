<?php
include('link.php');
$id = $_GET['id'];
$sql = $db->prepare('delete from user where id=:id');
$sql->bindValue('id',$id);
$sql->execute();
header('location:./');
?>