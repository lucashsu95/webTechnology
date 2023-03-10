<?php
include('link.php');
// $sql = $db->prepare('insert into todo(workname,process,priority,starttime,endtime,workcontent) values(:workname,:process,:priority,:starttime,:endtime,:workcontent)');
// $sql->bindValue('workname',$_POST['workname']);
// $sql->bindValue('process',$_POST['process']);
// $sql->bindValue('priority',$_POST['priority']);
// $sql->bindValue('starttime',$_POST['starttime']);
// $sql->bindValue('endtime',$_POST['endtime']);
// $sql->bindValue('workcontent',$_POST['workcontent']);
// $sql->execute();
// $db->lastInsertId();
// // $sql = $db->query('')

$str = <<<A
insert into todo(ymd,workname,process,priority,starttime,endtime,workcontent)
values(
    '{$_POST['ymd']}'
    '{$_POST['workname']}',
    '{$_POST['process']}',
    '{$_POST['priority']}',
    '{$_POST['starttime']}',
    '{$_POST['endtime']}',
    '{$_POST['workcontent']}',
)
A;

$db->query($str);

// var_dump($str);

header('location:./');
