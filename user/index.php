<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>會員管理</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <div class='timeOutBox'>
      <div>
        <h2>是否繼續操作?</h2>
      </div>  
      <div>
        <button onclick='fs_close()'>Yes</button>
        <button onclick='location.href="../logout.php"'>No</button>
      </div>
    </div>
        <?php
          include('../link.php');
          $sql = 'select * from users where 1=1';

          @$key = $_GET['keyWord'] ?? '';
          @$sortOrder = $_GET['sort'] ?? 'id';
          @$isAsc = $_GET['isAsc'] ?? '';

          $sql .= " and account like '%$key%'";
          $sql .= " order by $sortOrder $isAsc";
          $query = $db->query($sql)->fetchAll();
        ?>
    <a href=".././">上一頁</a>
    <form action="./" method="get">
      <h1>會員管理</h1>
      <section>
        <button type='button' onclick="location.href='userMod.php'">新增會員</button>
      </section>
      <section>
        <button type='button' onclick="location.href='viewRecord.php'">登入登出紀錄</button>
      </section>
      <section>
        <input type="text" name="keyWord" placeholder='請輸入關鍵字'>
        <button type='submit'>查詢</button>
      </section>
      <section>
        <select name="sort">
          <option value="id">使用者編號</option>
          <option value="account">帳號</option>
          <option value="name">姓名</option>
        </select>
        <select name="isAsc">
          <option value="asc">降冪</option>
          <option value="desc">升冪</option>
        </select>
        <button type="submit">排序</button>
      </section>
      <section>
        <input type="text" name='time' value='100'>
        <button type='button' onclick='fs_count()'>重新設定</button>
      </section>
    <div class='userbox'>
      <div>
        <div>使用者編號</div>
        <div>帳號</div>
        <div>密碼</div>
        <div>姓名</div>
        <div>權限</div>
        <div>操作</div>
      </div>
      <?php foreach ($query as $data) { ?>
          <div>
            <div><?php echo $data['id'] ?></div>
            <div><?php echo $data['account'] ?></div>
            <div><?php echo $data['password'] ?></div>
            <div><?php echo $data['name'] ?></div>
            <div><?php echo $data['role'] ?></div>
            <div><?php if($data['id'] != '0000'){ ?>
              <a href='userMod.php?id=<?php echo $data['id'] ?>'>修改</a>
              <a href='destroy.php?id=<?php echo $data['id'] ?>'>刪除</a>
            <?php } ?></div>
          </div>
        <?php } ?> 
    </div>
    </form>

    <script>
      let flag = 0

      function fs_count(){
        time = document.querySelector('input[name="time"]')
        console.log(time.value);
        timeCount = setTimeout(fs_timeOut, time.value*1000);
      }

      function fs_timeOut(){
        // console.log('timeout');
        document.querySelector('.timeOutBox').classList.add('active');

        timeOutCount = setTimeout(() => {
          location.href = '../logout.php';
        }, 5000);
      }

      function fs_close(){
        clearTimeout(timeOutCount);
        document.querySelector('.timeOutBox').classList.remove('active');
        fs_count()
      }
      
      fs_count()
    </script>
  </body>
</html>
