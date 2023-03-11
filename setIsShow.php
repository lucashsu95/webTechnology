<?php

include './link.php';

$id = $_GET['id'];

$sql = $db->prepare('update product set isShow=:isShow where id=:id');
$sql->bindValue('isShow', $_GET['isShow']);
$sql->bindValue('id',$id);
$sql->execute();

header('location: ./');