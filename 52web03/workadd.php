<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
    <div id="main">
        <div class="widgets">
            <div class="workaddwidget">

                a 工作編輯
                <form action="workaddprocess.php" method="post">
                    <p>
                        b工作名稱:<input type="text" name="workname" id="" placeholder='請輸入工作名稱'>
                    </p>
                    <p>
                        c處理情況: <select name="process" id="">
                            <option value="未處理">未處理</option>
                            <option value="處理中">處理中</option>
                            <option value="己完成">己完成</option>
                        </select>
                        d優先順序: <select name="priority" id="">
                            <option value="普通件">普通件</option>
                            <option value="速件">速件</option>
                            <option value="最速件">最速件</option>
                        </select>
                    </p>
                    <p>
            e開始時間: <select name='starttime'>
                <?php for ($i = 0; $i <= 23; $i++) { ?>
                    <option value='<?php echo $i ;?>'><?php echo $i ;?>:00</option>
                    <?php } ?>
                </select>
            f結束時間: <select name="endtime" id="">
                <?php for ($j = 1;$j <= 24;$j++){ ?>
                    <option value="<?php echo $j ;?>"><?php echo $j ;?>:00</option>
                    <?php } ?>
                </select>
            </p>
        <p class="full-width">
            g:<input type="text" name="workcontent" id="" placeholder='請輸入工作內容'>
        </p>
        <p class="full-width">
            h:<input type="date" name="ymd" id="ymd">
        </p>
        <input type="submit" value="新增" class="full-width">
        <input type="reset" value="重設" class="full-width">
    </form>
</div>
</div>
</div>
</body>
</html>