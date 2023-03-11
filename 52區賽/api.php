<?php
include('link.php');
$data = json_decode(file_get_contents('php://input'));
switch ($_GET['do']){
    case "select":
        $sql = $db->prepare('select * from utodo');
        $sql->execute();
        $query = $sql->fetchAll();
        if($query){
            echo json_encode($query);
        }else echo "fail";
        break;
    case "update":
        $sql2 = $db->prepare('select * from utodo');
        $sql2->execute();
        $query = $sql2->fetch();
        
        $starttime2 = substr($query['starttime2'],2);
        $endtime2 = substr($query['$endtime2'],2);
        
        if ($starttime2 == '')$starttime2 = '00';
        if ($endtime2 == '')$endtime2 = '00';


        $starttime2 = intval($data->starttime.$starttime2);
        $endtime2 = intval($data->endtime.$endtime2);

        $sql = $db->prepare('update utodo set starttime=:st,endtime=:et,starttime2=:st2,endtime2=:et2 where id=:id');
        $sql->bindValue('st',$data->starttime);
        $sql->bindValue('et',$data->endtime);
        $sql->bindValue('st2',$starttime2);
        $sql->bindValue('et2',$endtime2);
        $sql->bindValue('id',$data->id);
        
        $sql->execute();    
        break;
}