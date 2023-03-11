<?php
include('../link.php');
$sql = $db->prepare('insert into utodo(workname,process,priority,startTime,endTime,workcontent,ymd,startTime2,endtime2) values(:name,:process,:priority,:star,:end,:content,:ymd,:star2,:end2)');
$sql->bindValue('name',$_POST['workname']);
$sql->bindValue('process',$_POST['process']);
$sql->bindValue('priority',$_POST['priority']);
$sql->bindValue('star2',$_POST['starttime']);
$sql->bindValue('end2',$_POST['endtime']);
$sql->bindValue('content',$_POST['workcontent']);
$sql->bindValue('ymd',$_POST['ymd']);
$sql->bindValue('star',intval(substr($_POST['starttime'],0,2)));
$sql->bindValue('end',intval(substr($_POST['endtime'],0,2)));
$sql->execute();
header('location:./');