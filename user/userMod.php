<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>會員管理</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    include('../link.php');
    @$id = $_GET['id'];
    $account = '';
    $password = '';
    $name = '';
    $role = '';
    if(@$id){
      $id = $_GET['id'];
      $sql = "select * from users where id=$id";
      $query = $db->query($sql)->fetch();
      $account = $query['account'];
      $password = $query['password'];
      $name = $query['name'];
      $role = $query['role'];
    }
  ?>
    <button onclick="history.go(-1)">上一頁</button>
  
  <form action="userModprocess.php" method="post">
    <h1>新增使用者</h1>
    <p>account：<input type="text" name="account" value='<?php echo $account ?>'></p>
    <p>password：<input type="password" name="password" value='<?php echo $password ?>'></p>
    <p>name：<input type="text" name="name" value='<?php echo $name ?>'></p>
    <p>
      <select name="role" id="role">
        <option value="會員" <?php if($role === '會員')echo 'selected' ?>>會員</option>
        <option value="管理員" <?php if($role === '管理員')echo 'selected' ?>>管理員</option>
      </select>
    </p>
    <button type="submit">送出</button>
    <button type="reset">重設</button>
    <?php if($id){ ?>
      <input type="hidden" name="id" value='<?php echo $query['id'] ?>'>
    <?php } ?>
  </form>

</body>
</html>