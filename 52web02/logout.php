<?php
include('link.php');
$_SESSION['pass'] = '登出';
$_SESSION['acc'] = $_SESSION['user']['account'];
unset($_SESSION['user']);
header('location:record.php');