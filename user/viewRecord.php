<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入登出紀錄</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <button onclick="history.go(-1)">上一頁</button>
    <div class="userbox">
        <div>
            <div>使用者</div>
            <div>時間</div>
            <div>動作</div>
            <div>成功/失敗</div>
        </div>
        <?php
            include('../link.php');
            $sql = 'select * from record';
            $query = $db->query($sql)->fetchAll();
            

            foreach($query as $data){
        ?>
        <div>
            <div><?php echo $data['account']?></div>
            <div><?php echo $data['time']?></div>
            <div><?php echo $data['action']?></div>
            <div><?php echo $data['utype']?></div>
        </div>
        <?php
            }


        ?>
    </div>
</body>
</html>