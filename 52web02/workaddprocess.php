<?php
include('link.php');
$sql = $db->prepare('insert into utodo(workname,process,priority,starttime,endtime,workcontent,ymd) values(:name,:process,:priority,:star,:end,:content,:ymd)');
$sql->bindValue('name',$_POST['workname']);
$sql->bindValue('process',$_POST['process']);
$sql->bindValue('priority',$_POST['priority']);
$sql->bindValue('star',$_POST['starttime']);
$sql->bindValue('end',$_POST['endtime']);
$sql->bindValue('content',$_POST['workcontent']);
$sql->bindValue('ymd',$_POST['ymd']);
$sql->execute();
header('location:work.php');