<?php
include('../link.php');

if ($_POST['role'] == '管理員') $Lprefix = 'a';else $Lprefix = 'u';

$Lsql = "select * from sno where prefix = '".$Lprefix."' ";
$sql = $db->prepare($Lsql);
$sql->execute();
$query = $sql->fetch();

$Lnum = $query['seq'] + 1;

$Lsql = "update sno set seq = seq+1 where prefix = '".$Lprefix."' ";
$sql = $db->prepare($Lsql);
$sql->execute();

$Laccount_id  = $Lprefix . substr('00' . $Lnum, -3);

$sql = $db->prepare('insert into users(account_id,account,password,name,role) values(:acc_id,:act,:pwd,:name,:role)');
$sql->bindValue('acc_id',$Laccount_id);
$sql->bindValue('act',$_POST['act']);
$sql->bindValue('pwd',$_POST['pwd']);
$sql->bindValue('name',$_POST['name']);
$sql->bindValue('role',$_POST['role']);
$sql->execute();
header('location:./');