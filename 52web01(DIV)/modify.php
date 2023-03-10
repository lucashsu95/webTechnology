<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('link.php');
    $sql = $db->prepare('select * from user where id=:id');
    $sql->bindValue('id', $_GET['id']);
    $sql->execute();
    $query = $sql->fetch();
    ?>
    <button onclick="location.href='./'">返回</button>
    <form action='modifyprocess.php' method='post'>
        <div>
            a工作編輯
        </div>
        <p>
            b工作名稱：<input type='text' name='workname' value='<?php echo $query['workname'] ?>'>
        </p>
        <p>
            c處理情形：
            <select name="process">
                <option <?php if ($query['process'] == "未處理") {
                            echo "selected";
                        } ?> value='未處理'>未處理</option>
                <option <?php if ($query['process'] == "處理中") {
                            echo "selected";
                        } ?> value='處理中'>處理中</option>
                <option <?php if ($query['process'] == "已完成") {
                            echo "selected";
                        } ?> value='已完成'>已完成</option>
            </select>
            d優先情形：
            <select name='priority' value="<?php echo $query['priority']; ?>">
                <option <?php if ($query['priority'] == "普通件") {
                            echo "selected";
                        } ?> value="普通件">普通件</option>
                <option <?php if ($query['priority'] == "速件") {
                            echo "selected";
                        } ?> value="速件">速件</option>
                <option <?php if ($query['priority'] == "最速件") {
                            echo "selected";
                        } ?> value="最速件">最速件</option>
            </select>
        </p>
        <p>
            e開始時間：
            <select name='starttime'>
                <?php for ($i = 0; $i <= 23; $i++) { ?>
                    <option <?php if ($query['starttime'] == $i) {
                                echo "selected";
                            } ?> value='<?php echo $i; ?>'><?php echo $i; ?>:00</option>
                <?php } ?>
            </select>
            f結束時間：
            <select name='endtime'>
                <?php for ($j = 0; $j <= 23; $j++) { ?>
                    <option <?php if ($query['endtime'] == $j) {
                                echo "selected";
                            } ?> value='<?php echo $j; ?>'><?php echo $j; ?>:00</option>
                <?php } ?>
            </select>
        </p>
        <p>
        <div>工作內容：</div>
        g　<input type='text' name='workcontent' value='<?php echo $query['workcontent'] ?>' placeholder="工作內容詳細說明"><br>
        </p>
        <input type='hidden' name='id' value='<?php echo $_GET['id']; ?>'>
        <input type='submit' value='修改'>
        <input type='reset' value='重設'>

    </form>
</body>

</html>