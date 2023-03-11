<?php
include('../link.php');
$query = $db->query("delete from users where id={$_GET['id']}");
header('location:users.php');
?>