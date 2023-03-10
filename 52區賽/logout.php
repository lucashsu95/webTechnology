<?php
include('link.php');
($_SESSION['user']['role']=='管理員')?$_SESSION['id'] = 'a' . $_SESSION['user']['id'] :$_SESSION['id'] = 'u'.$_SESSION['user']['id'];

$_SESSION['act'] = $_SESSION['user']['account'];
$_SESSION['login'] = null;
$_SESSION['logout'] = date("Y-m-d H:i:s");;
$_SESSION['type'] = '登出';

unset($_SESSION['user']);

header('location:record.php');  