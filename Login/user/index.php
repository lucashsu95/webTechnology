<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員管理</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <?php
    include('../link.php');
    $sql = $db->prepare('select * from users');
    $sql->execute();
    $query = $sql->fetchAll();
?>
<div>
<button onclick="history.back()" class="btn">Go Back</button>
    <table>
        <tr>
            <td>ID</td>
            <td>帳號</td>
            <td>密碼</td>
            <td>權限</td>
            <td>操作</td>
        </tr>
        <tr>
            <td colspan='5'>
                <hr>
            </td>
        </tr>
        <?php
        foreach ($query as $data) {
        ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['account'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['role'] ?></td>
                <td>
                    <a href="modify.php?id=<?php echo $data['id'] ?>">修改</a>
                    <a href="destroy.php?id=<?php echo $data['id'] ?>">刪除</a>
                </td>
            </tr>
        <?php  } ?>
    </table>
</div>

</body>
</html>