<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="image/LOGO.jpg">
    <style>
        .logo{
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
    <?php
include('link.php');

if(isset($_SESSION['user'])){
    if($_SESSION['user']['role']=="管理員"){
        ?>
        
    <div id='navbar'>
        <img class='logo' src="image/LOGO.jpg">
        <div class='navbar-left'>
            管理員-首頁
        </div>
        <div class="navbar-right">
            <a href="./">首頁</a>
            <a href="user/adduser.php">新增會員</a>
            <a href="./user">管理會員</a>
            <a href="todos.html">工作表</a>
            <a href="work/workadd.php">新增工作</a>
            <a href="./work">工作管理</a>
            <a href="logout.php">登出</a>
        </div>
    </div>
    
            <?php }else{
                ?>
    <div id='navbar'>
    <img class='logo' src="image/LOGO.jpg">
        <div class='navbar-left'>
            一般使用者-首頁
        </div>
        <div class="navbar-right">
        <a href="index.php">首頁</a>
            <a href="user/adduser.php">新增會員</a>
            <a href="work/workadd.php">新增工作</a>
            <a href="logout.php">登出</a>
        </div>
    </div>
            </div>
    
<?php } ?>
<?php }else{
    header('location:login.html');
} 
?>
</body>
</html>