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
    <form action='addquestionprocess.php' method='POST'>
        <p>
            問卷題型:
            <?php
            $ary = ["未設定", "是非題", "單選題", "多選題", "問答題"];
            for ($j = 0; $j <= 4; $j++) {
                echo "<input type='radio' name='type' value='$j' ";
                if ($query["type"] == $j) echo "checked";
                echo ">" . $ary[$j];
            } ?>
        </p>

        <p>
            題目說明:
            <input type='text' name='question' value='<?php echo $query['question'] ?>' placeholder="請輸入題目說明">
        </p>

        <p>
            題目選項:<br>
            <?php
            for ($i = 1; $i <= 6; $i++) {
                echo "ans$i" ?>: <input type='text' name='ans<?php echo $i ?>' value='<?php echo $query["ans$i"] ?>'><br>
        <?php } ?>
        other: <input type='checkbox' name='other' value='Y' <?php if ($query['other'] == 'Y') echo "checked" ?>>
        </p>
        <input type='hidden' name='id' value='<?php echo $_GET['id'] ?>'>
        <input type='submit' value='修改'>
        <input type='reset' value='重設'>

    </form>
</body>

</html>