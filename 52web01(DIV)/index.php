<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery.js"></script>
    <link rel="stylesheet" href="./jquery-ui.min.css">
    <script src="./jquery-ui.min.js"></script>
    <style>
        .div1 {
            display: flex;
        }

        .div2 {
            position: absolute;
            top: 100px;
            left: 0px;
            width: 100px;
            height: 50px;
            border: 1px solid black;
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

    <div class='div1'>
        <div>日期</div>
        <div><input type=date name="Iymd" value="<?php echo date("Y-m-d") ?>"></div>
        <div><input type=button value="確定"></div>
        <div>
            <button onclick='location.href="addwork.php"'>新增</button>
        </div>
    </div>

    <div class="item"></div>

    <div style="position: absolute;top: 100px;left: 0px;width: 100px;height: 50px;border: 1px solid black;">

        <?php
        for ($i = 0; $i < 24; $i = $i + 2) {
        ?>
            <div style="position: absolute;top: <?php echo $i * 25 ?>px;left: 0px;width: 100px;height: 50px;border: 1px solid black;"><?php echo $i . "-" . ($i + 2); ?></div>
        <?php } ?>
        <?php
        for ($i = 0; $i < 24; $i = $i + 2) {
        ?>
            <div style="position: absolute;top: <?php echo $i * 25 ?>px;left: 100px;width: 300px;height: 50px;border: 1px solid black;"></div>
        <?php } ?>

        <!-- <div style='position:absolute;top: 50px;left: 100px;width:100px;height:100px;background:green'>happy</div> -->
        <?php
        foreach ($query as $data) {
        ?>
            <div style='position:absolute;top: <?php echo $data['starttime'] * 25 ?>px;left:100px;width:100px;height:100px;background:yellowgreen;border: 1px solid black;'>
                <div><?php echo $data['starttime'] . ":" . $data['endtime']; ?></div>
                <div><?php echo $data['workname']; ?></div>
                <div><?php echo $data['process']; ?></div>
                <div><?php echo $data['priority']; ?></div>
                <a href="modify.php?id=<?php echo $data['id']; ?>">
                    修改
                </a>
                <a href="destroy.php?id=<?php echo $data['id']; ?>">刪除</a>
            </div>
        <?php } ?>
    </div>

</body>

</html>
</div>