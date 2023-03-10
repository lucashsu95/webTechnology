<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<button onclick="history.back()">Go Back</button>
<?php
    include('../link.php');
    $sql = $db->prepare('select * from user where id=:id');
    $sql->bindValue('id',$_GET['id']);
    $sql->execute();
    $query = $sql->fetch();
?>
    <form action="modifyprocess.php" method="post">
        <h1>Modify</h1>
        <p>
            <input type="text" name="act" value='<?php echo $query['account']?>'>
        </p>
        <p>
            <input type="password" name="pwd" value='<?php echo $query['password']?>'>
        </p>
        <p>
            <select name="role">
                <option <?php if($query['role'] == '會員')echo 'selected';?> value="會員">會員</option>
                <option <?php if($query['role'] == '管理員')echo 'selected';?> value="管理員">管理員</option>
            </select>
        </p>
        <input type="submit" value="Modify">
        <input type="reset" value="reset">
        <input type="hidden" name="id" value='<?php echo $query['id']?>'>
    </form>
</body>

</html>