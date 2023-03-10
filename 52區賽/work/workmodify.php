<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改工作</title>
    <link rel="stylesheet" href="../main.css">

    
</head>
<body>
<div id='navbar'>
        <div class='navbar-left'>
            修改工作
        </div>
        <div class="navbar-right">
            <a href=".././">首頁</a>
            <a href="../user/adduser.php">新增會員</a>
            <a href="../users">管理會員</a>
            <a href="../todos.html">工作表</a>
            <a href="workadd.php">新增工作</a>
            <a href="./">工作管理</a>
            <a href="../logout.php">登出</a>
        </div>
    </div>
    
<?php
    include('../link.php');
    $sql = $db->prepare('select * from utodo where id=:id');
    $sql->bindValue("id",$_GET['id']);
    $sql->execute();
    $query = $sql->fetch();
    ?>
    <div id="main">
        <div class="widgets">
            <div class="widget">
                <h1>a 工作編輯</h1>
                <form action="workmodifyprocess.php" method="post">
                    <p>
                        b工作名稱:<input type="text" name="workname" id="" placeholder='請輸入工作名稱' value='<?php echo $query['workname']?>'>
                    </p>
                    <p>
                        c處理情況: <select name="process" id="">
                            <option <?php  if($query['process'] == "未處理"){
                                echo "selected";
                            };?> value="未處理">未處理</option>
                <option <?php  if($query['process'] == "處理中"){
                    echo "selected";
                };?>  value="處理中">處理中</option>
                <option <?php  if($query['process'] == "己完成"){
                    echo "selected";
                };?>  value="己完成">己完成</option>
            </select>
        </p>


            <p>              
            d優先順序: <select name="priority" id="">
                <option <?php  if($query['priority'] == "普通件"){
                    echo "selected";
                };?> value="普通件">普通件</option>
                <option <?php  if($query['priority'] == "速件"){
                    echo "selected";
                };?> value="速件">速件</option>
                <option <?php  if($query['priority'] == "最速件"){
                    echo "selected";
                };?> value="最速件">最速件</option>
            </select>
        </p>

        <p>
            e開始時間: <select name='starttime'>
                <?php for ($i = 0; $i <= 23; $i++) { 
                    if ($i<10)$i = '0'.$i;
                    ?>
                    <option <?php  if($query['starttime2'] == $i.'00'){
                        echo "selected";
                    };?> value='<?php echo $i.'00' ;?>'><?php echo $i ;?>:00</option>

                    <option <?php  if($query['starttime2'] == $i."30"){
                        echo "selected";
                    };?> value='<?php echo $i.'30' ;?>'><?php echo $i ;?>:30</option>
                <?php } ?>
            </select>
        </p>
            <p>
                
            f結束時間: <select name="endtime">
            <?php for ($j = 0; $j <= 23; $j++) { 
                    if ($j<10)$j = '0'.$j;
                    ?>
                    <option <?php  if($query['endtime2'] == $j.'00'){
                        echo "selected";
                    };?> value='<?php echo $j.'00' ;?>'><?php echo $j ;?>:00</option>
                    <option <?php  if($query['endtime2'] == $j."30"){
                        
                        echo "selected";
                    };?> value='<?php echo $j.'30' ;?>'><?php echo $j ;?>:30</option>
                <?php } ?>
            </select>
        </p>
        <p>
            g工作內容:<input type="text" name="workcontent" id="" placeholder='請輸入工作內容' value='<?php echo $query['workcontent'] ?> '>
        </p>
        <p>
            h工作日期:<input type="date" name="ymd" id="ymd" value='<?php echo $query['ymd']?>'>
        </p>
            <input type="submit" value="修改" class='full-width'>
            <input type="reset" value="重設" class='full-width'>
            <button type='button' class='full-width' onclick="history.back()">返回</button>

            <input type="hidden" name="id" value='<?php echo $query['id']?>'>
        
    </form>
    
                </div>
            </div>
        </div>
</body>
</html>
