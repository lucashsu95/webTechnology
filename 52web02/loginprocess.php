<?php
include('link.php');
$sql = $db->prepare('select * from users where account=:acc');
$sql->bindValue('acc',$_POST['acc']);
$sql->execute();
$query = $sql->fetch();

$ans = $_POST['ans'];
$inp = $_POST['inp'];

// var_dump($ans);
// var_dump($inp);

function err($a,$b){
    $_SESSION[$a] ++;
    if($_SESSION[$a] > 3){
        $_SESSION[$a] = 0;
        echo "<script>alert('{$b}錯誤大於三次');location.href='login.html'</script>";
    }else{
        echo "<script>alert('{$b}錯誤');location.href='login.html'</script>";
    }

}

if($ans != $inp){
    err('errcaptcha','驗證碼');
}
elseif(!$query){
    err("erracc","帳號");
}elseif($_POST['pwd'] != $query['password']){
    err('errpwd',"密碼");

}else{
    $_SESSION['user'] = $query;
    
    $_SESSION['acc'] = $query['account'];
    $_SESSION['pass'] = '登入';
    echo "<script>alert('登入成功');location.href='record.php'</script>";
}