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
    if (isset($_GET['role']) & $_GET['role'] != '全部') {
        
        $sql = $db->prepare('select * from users where role=:role');
        $sql->bindValue(':role', $_GET['role']);
    } else {
        $sql = $db->prepare('select * from users');
    }
    $sql->execute();
    $query = $sql->fetchAll();
    ?>

    <select>
        <option selected disabled>Please select.</option>
        <option value="全部">全部</option>
        <option value="管理員">管理員</option>
        <option value="會員">會員</option>
    </select>

    <table width=100%>
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
                <td>
                    <button onclick="test(<?php echo $data['id']?>)"><?php echo $data['id']?></button>
                </td>
            </tr>
        <?php  } ?>
    </table>
    <input type="button" value="返回" onclick="location.href='./'">

    <script>
        const select = document.querySelector('select')
        select.addEventListener('change', e => {
            console.log(e)
            const value = e.target.value
            location.search = '?role=' + value
        })

        function test(id) {
            alert(id)
        }
    </script>
</body>

</html>