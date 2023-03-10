<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .div2 {
            display: flex;
        }

        .div1 {
            display: flex;
            min-width: 100px;
        }

        .div3 {
            display: inline-block;

        }
    </style>
</head>

<body>
    <?php
    include('link.php');
    $sql = $db->prepare('select * from user');
    $sql->execute();
    $query = $sql->fetchAll();
    ?>
    <p>
        <button onclick="location.href='addquestion.php'">新增題目</button>
    
    
        <button class="div3" onclick="location.href='question.php'">作答問卷</button>
    </p>
    <?php
    foreach ($query as $data) {
    ?>
        <div><?php echo $data['id'] ?></div>

        <div class='div2'>

            <div class='div1'>問卷題型　</div>

            <div class='div1'><?php
                                $ary = ["未設定", "是非題", "單選題", "多選題", "問答題"];
                                echo $ary[$data['type']];
                                ?></div>
        </div>

        <div class='div2'>
            <div class='div1'>題目說明　</div>
            <div class='div1'><?php echo $data['question'] ?></div>
        </div>

        <div class='div2'>
            <div class='div1'>題目選項　</div>
            <div class='div1'>
                <div class='div3'>ans1: <?php echo $data['ans1'] ?>　</div>
                <div class='div3'>ans2: <?php echo $data['ans2'] ?>　</div>
                <div class='div3'>ans3: <?php echo $data['ans3'] ?>　</div>
                <div class='div3'>ans4: <?php echo $data['ans4'] ?>　</div>
                <div class='div3'>ans5: <?php echo $data['ans5'] ?>　</div>
                <div class='div3'>ans6: <?php echo $data['ans6'] ?>　</div>
                <div class='div3'>other:<?php echo $data['other'] ?>　</div>
            </div>
        </div>
        <p>
            <a href=" modify.php?id=<?php echo $data['id']; ?>">修改</a>
            <a href="destroy.php?id=<?php echo $data['id']; ?>">刪除</a>
        </p>
    <?php
    }
    ?>
</body>

</html>