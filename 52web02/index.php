<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="LOGO.ico">
    
    <style>
        .logo{
            width: 48px;
            height: 48px;
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
        <img class='logo' src="./LOGO.jpg" alt="" srcset="">

        <div class='navbar-left'>
            管理員-首頁
        </div>
        <div class="navbar-right">
            <a href="adduser.php">新增會員</a>
            <a href="users.php">管理會員</a>
            <a href="todos.html">工作表</a>
            <a href="workadd.php">新增工作</a>
            <a href="work.php">工作管理</a>
            <a href="logout.php">登出</a>
        </div>
    </div>
    <h1 style='display:flex;justify-content:center;margin-top:30px;font-size:50px;'>歡迎登入</h1>
            <?php }else{
                ?>
                    <div id='navbar'>
        <div class='navbar-left'>
            會員-首頁
        </div>
        <div class="navbar-right">
            <a href="adduser.php">新增會員</a>
            <a href="workadd.php">新增工作</a>
            <a href="logout.php">登出</a>
        </div>
    </div>
    <h1>歡迎登入</h1>
<?php } ?>
<?php }else{
    ?>
    <div id='navbar'>
        <img class='logo' src="./LOGO.jpg" alt="" srcset="">
        <div class='navbar-left'>
            未登入
        </div>

        <div class="navbar-right">
            <a href="login.html">登入</a>
        </div>
    </div>
    
    <?php
} 
?>
</body>
</html>