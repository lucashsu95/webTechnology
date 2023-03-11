<?php
include('link.php');
$sql = $db->prepare('insert into record(account,action,utype) values(:account,:action,:utype)');
$sql->bindValue('account',$_SESSION['account']);
$sql->bindValue('action',$_SESSION['action']);
$sql->bindValue('utype',$_SESSION['type']);
$sql->execute();

if($_SESSION['type'] == '失敗'){
    $_SESSION['err'] ++;
    if($_SESSION['err'] >= 3){
        $_SESSION['err'] = 0;
        echo '<script>alert("登入失敗\n連續誤錯 3 次"),location.href="./"</script>';
    }
    echo '<script>location.href="./"</script>';
}else{
    header('location:./');
}
?>