<?php
include('link.php');
$sql = $db->prepare('select * from users where account=:act');
$sql->bindValue('act',$_POST['act']);
$sql->execute();
$query = $sql->fetch();

$ans = $_POST['ans'];
$inp = $_POST['inp'];

// var_dump($ans);
// var_dump($inp);

function err($a){
    global $query;
    $_SESSION['err'] ++;
    if($query['role']=='管理員')$_SESSION['id'] = 'a'.$query["id"];else $_SESSION['id'] = 'u'.$query['id'];
    $_SESSION['act'] = $query['account'];
    $_SESSION['login'] = date("Y-m-d H:i:s");
    $_SESSION['logout'] = null;
    $_SESSION['type'] = '登入失敗';
    echo "<script>alert('{$a}錯誤');location.href='record.php'</script>";

}
if($ans != $inp){
    err('驗證碼');
}elseif(!$query){
    err("帳號");
}elseif($_POST['pwd'] != $query['password']){
    err("密碼");
}else{
    $_SESSION['err'] = 0;
    $_SESSION['user'] = $query;
    
    
    ($_SESSION['user']['role']=='管理員')?$_SESSION['id'] = 'a' . $_SESSION['user']['id'] :$_SESSION['id'] = 'u'.$_SESSION['user']['id'];
    $_SESSION['act'] = $_SESSION['user']['account'];
    $_SESSION['login'] = date("Y-m-d H:i:s");
    $_SESSION['logout'] = null;
    $_SESSION['type'] = '登入成功';
    header('location:record.php');
}