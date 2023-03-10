<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增會員</title>
    <link rel="stylesheet" href="main.css?<?php echo date('is')?>">
</head>
<body>
<div id='navbar'>
        <div class='navbar-left'>
            新增會員
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
    
    <form action="adduserprocess.php" method="post">
    <div id="main">
        <div class="widgets">
            <div class="widget">

                <p>
                    新帳號:<input type="text" name="acc" id="" placeholder='請輸人帳號'>
                </p>
                <p>
                    新密碼:<input type="password" name="pwd" id="" placeholder='請輸人密碼'>
                </p>
                <p>
                    <select name="role" id="" class='full-width'>
                        <option value="會員">會員</option>
                        <option value="管理員">管理員</option>
                    </select>
                </p>
                <input type="submit" value="新增" class='full-width'>
                <input type="button" class='full-width' value="返回首頁" onclick='location.href="./"'>
                
                
            </form>
        </div>
    </div>
</div>    
</body>
</html>