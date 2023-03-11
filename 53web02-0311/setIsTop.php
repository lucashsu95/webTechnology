<?php

include './link.php';

$id = $_GET['id'];

$db->query('update product set isTop=0');

$sql = $db->prepare('update product set isTop=1 where id=:id');
$sql->bindValue('id',$id);
$sql->execute();

header('location: ./');