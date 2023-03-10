<?php
include('link.php');
$sql = $db->prepare('select * from user where username=:acc');
$sql->bindValue('acc', $_POST['acc']);
$sql->execute();
$query = $sql->fetch();

$account = $_POST['acc'];

$user_input = $_POST['captcha'];    //使用者證入所input的驗證碼
$answer = $_POST['ans_captcha'];    //驗證碼的答案

if ($user_input != $answer) {                           //驗證碼
    $_SESSION['count'] += 1;
    echo "<script>alert('驗證碼錯誤');location.href='./login.php';</script>;";
} elseif (!$query) {                                    //帳號
    echo "<script>alert('帳號錯誤');location.href='./login.php';</script>;";
    $_SESSION['count'] += 1;
} elseif ($query['password'] != $_POST['pwd']) {         //密碼
    echo "<script>alert('密碼錯誤');location.href='./login.php';</script>;";
    $_SESSION['count'] += 1;
} else {
    $_SESSION['user'] = $query;
    header('location:./');
}
