<?php
include('../link.php');
$starttime = intval(substr($_POST['starttime'],0,2));
$endtime = intval(substr($_POST['endtime'],0,2));
$sql = $db->prepare('update utodo set workname=:name,process=:process,priority=:priority,starttime=:start,endtime=:end,starttime2=:star2,endtime2=:end2,workcontent=:content,ymd=:ymd where id=:id');
$sql->bindValue('name',$_POST['workname']);
$sql->bindValue('process',$_POST['process']);
$sql->bindValue('priority',$_POST['priority']);
$sql->bindValue('start',$starttime);
$sql->bindValue('end',$endtime);
$sql->bindValue('content',$_POST['workcontent']);
$sql->bindValue('ymd',$_POST['ymd']);
$sql->bindValue('star2',$_POST['starttime']);
$sql->bindValue('end2',$_POST['endtime']);
$sql->bindValue('id',$_POST['id']);
$sql->execute();
header('location:./');