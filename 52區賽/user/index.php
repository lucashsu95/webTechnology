<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員管理</title>
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
    @$key = $_POST['key'];
    $sqlstr = 'select * from users where 1=1';
    if($key <> ''){
        $sqlstr .= ' and (';
        $sqlstr .= "account_id like '".$key."'";
        $sqlstr .= "or account like '".$key."'";
        $sqlstr .= "or password like '".$key."'";
        $sqlstr .= "or name like '".$key."'";
        $sqlstr .= "or role like '".$key."'";
        $sqlstr .= ")";
    }
    $sql = $db->prepare($sqlstr);
    $sql->execute();
    $query = $sql->fetchAll();
    ?>
    <div id="main">
        <div class="widgets">
            <div class="widget">
                <form action="./" method="post">
                    <input type="text" name="key" id="key" placeholder='查詢' style='width:200px'>
                    <input type="submit" value="查詢" style="width:100px;">
                </form>
                    
                <table width=100% style="margin-top:20px;">
                <tr>
                    <td>ID</td>
                    <td>account</td>
                    <td>password</td>
                    <td>name</td>
                    <td>role</td>
                    <td>操作</td>
                </tr>
                <tr>
                    <td colspan='6'>
                        <hr>
                    </td>
                </tr>
                <?php 
        foreach($query as $data){
            ?>
            <tr>
                <td><?php echo $data['account_id'];?></td>
                <td><?php echo $data['account']?></td>
                <td><?php echo $data['password']?></td>
                <td><?php echo $data['name']?></td>
                <td><?php echo $data['role']?></td>
                <td>
                    <?php if ($data['id'] != '1' & $data['name'] != '超級管理者'){ ?>
                        <a href="modify.php?id=<?php echo $data['id']?>">修改</a>
                        <a href="destroy.php?id=<?php echo $data['id']?>">刪除</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            
        </table>
        <button type='button' class='full-width' onclick="history.back()">返回</button>
</div>

</div>
</div>
</body>
</html>