<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div id='navbar'>
        <div class='navbar-left'>
            管理工作
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


    <?php
// include('link.php');
// $key = $_POST['key'];

// $sqlstr = 'select * from users where 1=1 ';
// if ($key <> '') {
//     $sqlstr .= " and (";
//     $sqlstr .= " account like '" . $key . "'";
//     $sqlstr .= " or role like '" . $key . "'";
//     $sqlstr .= ")";
// }
// $sql = $db->prepare($sqlstr);
// $sql->execute();

// $query = $sql->fetchAll();

//     $sql = $db->prepare($sqlstr);
//     $sql->execute();
    
    include('link.php');
    @$keywork = $_POST['keywork'];
    $sqlstr = 'select * from utodo where 1=1';
    if($keywork <> ''){
        $sqlstr .= " and (";
        $sqlstr .= " workname like '".$keywork."'";
        $sqlstr .= " or starttime like '".$keywork."'";
        $sqlstr .= " or endtime like '".$keywork."'";
        $sqlstr .= " or process like '".$keywork."'";
        $sqlstr .= " or priority like '".$keywork."'";
        $sqlstr .= " or workcontent like '".$keywork."'";
        $sqlstr .= ")";
        
    }
    $sql = $db->prepare($sqlstr);
    $sql->execute();
    $query = $sql->fetchAll();
    ?>

    <div id="main">
        <div class="widgets">
            <div class="workwidget">
        <form action="work.php" method="post">
            <input type="text" name="keywork" placeholder='查詢' style="width:200px;" >
            <input type="submit" value="查詢" style="width:100px;height:28px;" >
        </form>
        <table width=100% style="margin-top:20px;">
        <tr>
            <td>ID</td>
            <td>工作名稱</td>
            <td>處理情形</td>
            <td>優先順序</td>
            <td>開始時間</td>
            <td>結束時間</td>
            <td>工作內容</td>
            <td>日期</td>
            <td>操作</td>
        </tr>
        <tr>
            <td colspan='9'>
                <hr>
            </td>
        </tr>
        
        <?php 
        foreach($query as $data){
            ?>
            <tr>
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['workname']?></td>
                <td><?php echo $data['process']?></td>
                <td><?php echo $data['priority']?></td>
                <td><?php echo $data['starttime']?></td>
                <td><?php echo $data['endtime']?></td>
                <td><?php echo $data['workcontent']?></td>
                <td><?php echo $data['ymd']?></td>
                <td>
                    <a href="workmodify.php?id=<?php echo $data['id']?>">修改</a>
                    <a href="workdestroy.php?id=<?php echo $data['id']?>">刪除</a>
                </td>
            </tr>
            
            <?php } ?>
        </table>
    <input type="button" value="返回" onclick='location.href="./"' class="full-width">

        
    </div>
</div>
</div>


</div>
</body>
</html>