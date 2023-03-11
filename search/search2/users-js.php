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
    
    $sql = $db->prepare('select * from users');
    $sql->execute();
    $query = $sql->fetchAll();

    ?>

    <script>
        const users = <?php echo json_encode($query); ?>;
    </script>

    <select>
        <option value="">全部</option>
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
            <td colspan='6'>
                <hr>
            </td>
        </tr>
    </table>
    <input type="button" value="返回" onclick="location.href='./'">
on
    <script>
        const select = document.querySelector('select')
        const table = document.querySelector('table')

        select.addEventListener('change', e => {
            const value = e.target.value
            render(users.filter(user => !value || user.role == value))
        })

        function render(users) {
            const tbody = table.children[0]
            ;[...tbody.children].slice(2).forEach(el => el.remove())
            users.forEach(user => {
                const tr = `<tr>
                <td>${user.id}</td>
                <td>${user.username}</td>
                <td>${user.password}</td>
                <td>${user.role}</td>
                <td>
                    <a href="modify.php?id=${user.id}">修改</a>
                    <a href="destroy.php?id=${user.id}">刪除</a>
                </td>
                </tr>`
                tbody.innerHTML += tr
            })
        }

        render(users)
    </script>
</body>

</html>