<?php
include('link.php');
$sql = $db->prepare('insert into user(workname,process,priority,starttime,endtime,workcontent) values(:workname,:process,:priority,:starttime,:endtime,:workcontent)');
$sql->bindValue('workname',$_POST['workname']);
$sql->bindValue('process',$_POST['process']);
$sql->bindValue('priority',$_POST['priority']);
$sql->bindValue('starttime',$_POST['starttime']);
$sql->bindValue('endtime',$_POST['endtime']);
$sql->bindValue('workcontent',$_POST['workcontent']);
$sql->execute();
header('location:./');