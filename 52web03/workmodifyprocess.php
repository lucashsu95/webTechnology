<?php
include('link.php');

$sql = $db->prepare('update utodo set workname=:name,process=:process,priority=:priority,starttime=:star,endtime=:end,workcontent=:content,ymd=:ymd where id=:id');
$sql->bindValue('name',$_POST['workname']);
$sql->bindValue('process',$_POST['process']);
$sql->bindValue('priority',$_POST['priority']);
$sql->bindValue('star',$_POST['starttime']);
$sql->bindValue('end',$_POST['endtime']);
$sql->bindValue('content',$_POST['workcontent']);
$sql->bindValue('ymd',$_POST['ymd']);
$sql->bindValue('id',$_POST['id']);
$sql->execute();
// header('location:work.php');