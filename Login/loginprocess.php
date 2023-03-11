<?php
include('link.php');
$sql = $db->prepare('select * from users where account=:act and password=:pwd');
$sql->bindValue('act',$_POST['act']);
$sql->bindValue('pwd',$_POST['pwd']);
$sql->execute();
$query = $sql->fetch();

function err($name){
    $_SESSION[$name] ++;
    if ($_SESSION[$name] > 3){
        echo "<script>alert('登入錯誤大於三次!'),location.href='./'</script>";
        $_SESSION[$name] = 0;
    }else{
        echo "<script>alert('{$name}'),location.href='./'</script>";
    }
}


if(!$query){
    err('帳號或密碼錯誤!');
}else{
    $_SESSION['user'] = $query;
    header('location:./');
}

