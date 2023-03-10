<?php
include('link.php');
$user_id = $_POST['id'];
$sql = $db->prepare('update user set type=:type,question=:question,ans1=:ans1,ans2=:ans2,ans3=:ans3,ans4=:ans5,ans6=:ans6,other=:other where id=:id');
$sql->bindValue('type', $_POST['type']);
$sql->bindValue('question', $_POST['question']);
$sql->bindValue('ans1', $_POST['ans1']);
$sql->bindValue('ans2', $_POST['ans2']);
$sql->bindValue('ans3', $_POST['ans3']);
$sql->bindValue('ans4', $_POST['ans4']);
$sql->bindValue('ans5', $_POST['ans5']);
$sql->bindValue('ans6', $_POST['ans6']);
$sql->bindValue('other', $_POST['other']);
$sql->execute();

header('location:./');
