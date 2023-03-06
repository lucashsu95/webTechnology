<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=53web02','admin','1234');



function getTemplate(){
    $db = new PDO('mysql:host=localhost;dbname=53web02','admin','1234');
    $sql2 = 'select * from template';
    $query = $db->query($sql2)->fetchAll(PDO::FETCH_NUM);
    $ary = [];
    foreach ($query as $row) {
        array_push($ary,array_slice($row, 1));
    }
    return $ary;
}
function getProduct(){
    $db = new PDO('mysql:host=localhost;dbname=53web02','admin','1234');
    $sql2 = 'select * from product';
    $query = $db->query($sql2)->fetchAll(PDO::FETCH_NUM);
    return $query;
}
?>