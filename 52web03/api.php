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
        $sql = $db->prepare('update utodo set starttime=:st,endtime=:et where id=:id');
        $sql->bindValue('st',$data->starttime);
        $sql->bindValue('et',$data->endtime);
        $sql->bindValue('id',$data->id);
        $sql->execute();
        break;
}