<?php
include('link.php');
$sql = 'select * from users where account="' . $_POST['account'] . '"';
$query = $db->query($sql)->fetch();
$_SESSION['account'] = $_POST['account'];
$_SESSION['action'] = '登入';
    
function err($key){
    $_SESSION['type'] = '失敗';
    echo "<script>alert('{$key}錯誤');location.href='record.php'</script>";
}

if(!$_POST['captchaAns']){
    err('驗證碼');
}else if(!$_POST['gridAns']){
    err('圖形');
}else if(!$query){
    err('帳號');
}else if($query['password'] != $_POST['password']){
    err('密碼');
}else{
    $_SESSION['user'] = $query;
    $_SESSION['type'] = '成功';
    echo "<script>alert('成功');location.href='record.php'</script>";
}
?>