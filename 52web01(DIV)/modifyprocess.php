<?php
include('link.php');
$work_id = $_POST['id'];
$sql = $db->prepare('update user set workname=:workname,process=:process,priority=:priority,starttime=:starttime,endtime=:endtime,workcontent=:workcontent where id=:id');
$sql->bindValue('workname',$_POST['workname']);
$sql->bindValue('process',$_POST['process']);
$sql->bindValue('priority',$_POST['priority']);
$sql->bindValue('starttime',$_POST['starttime']);
$sql->bindValue('endtime',$_POST['endtime']);
$sql->bindValue('workcontent',$_POST['workcontent']);
$sql->bindValue('id',$work_id);
$sql->execute();
header('location:./');
