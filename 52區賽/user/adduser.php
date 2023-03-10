<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增會員</title>
    <link rel="stylesheet" href="../main.css?<?php echo date('is')?>">
</head>
<body>
<div id='navbar'>
        <div class='navbar-left'>
            新增會員
        </div>
        <div class="navbar-right">
        <a href=".././">首頁</a>
            <a href="adduser.php">新增會員</a>
            <a href="./">管理會員</a>
            <a href="../todos.html">工作表</a>
            <a href="../work/workadd.php">新增工作</a>
            <a href="../work">工作管理</a>
            <a href="../logout.php">登出</a>
        </div>
    </div>
    
    <form action="adduserprocess.php" method="post">
    <div id="main">
        <div class="widgets">
            <div class="widget">
                <p>
                    姓名:<input type='text' name='name' placeholder='請輸入名字'>
                </p>
                <p>
                    帳號:<input type="text" name="act" placeholder='請輸人帳號'>
                </p>
                <p>
                    密碼:<input type="password" name="pwd" placeholder='請輸人密碼'>
                </p>
                <p>
                    <select name="role" class='full-width'>
                        <option value="會員">會員</option>
                        <option value="管理員">管理員</option>
                    </select>
                </p>
                <input type="submit" value="新增" class='full-width'>

                <button type='button' class='full-width' onclick="history.back()">返回</button>
            </form>
        </div>
    </div>
</div>    
</body>
</html>