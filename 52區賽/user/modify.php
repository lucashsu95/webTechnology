<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改</title>
    <link rel="stylesheet" href="../main.css?<?php echo date('is')?>">

</head>
<body>
<div id='navbar'>
        <div class='navbar-left'>
            管理會員
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
<?php
    include('../link.php');
    $sql = $db->prepare('select * from users where id=:id');
    $sql->bindValue("id",$_GET['id']);
    $sql->execute();
    $query = $sql->fetch();
    ?>
    <div id="main">
        <div class="widgets">
            <div class="widget" >
                <form action="modifyprocess.php" method="post">
                    <p>
                        姓名:<input type="text" name="name" value='<?php echo $query['name']?>'>
                    </p>
                    <p>
                        帳號:<input type="text" name="act" value='<?php echo $query['account']?>'>
                    </p>
                    <p>
                        密碼:<input type="password" name="pwd" value='<?php echo $query['password']?>'>
                    </p>
                    <p>
                        權限:<select name="role">
                            <option <?php if($query['role'] == "會員"){
                                echo 'selected';
                            };?> value="會員">會員</option>
                            <option <?php if($query['role'] == "管理員"){
                                echo 'selected';
                            };?> value="管理員">管理員</option>
                        </select>
                    </p>
                    <input type="submit" value="修改" class='full-width'>
                    <button class='full-width' onclick="history.back()">返回</button>
                    
                    <input type="hidden" name="id" value='<?php echo $query['id']?>'>
                </form>
    
            </div>
        </div>
    </div>
</body>
</html>