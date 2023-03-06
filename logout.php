<?php
include('link.php');
$_SESSION['account'] = $_SESSION['user']['account'];
$_SESSION['action'] = '登出';
$_SESSION['type'] = '成功';
unset($_SESSION['user']);
header('location:record.php');