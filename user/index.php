<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>會員管理</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
      .box{
        display: grid;
        grid-template-columns:repeat(6,1fr);
        width: 80%;
        text-align:center;
      }
      .box,.box>div{
        margin:5px;
        padding:10px 15px;
        border:1px solid #ddd;
        border-radius:5px;
      }

      .timeOutBox{
        width: 500px;
        height: 500px;
        line-height:100px;

        background: #fff;
        border:5px solid #ddd;
        border-radius:15px;

        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
        
        padding:10px 15px;
        position: absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%) scale(0);
      }
      .timeOutBox.active{
        transform:translate(-50%,-50%) scale(1);
      }
      .timeOutBox button{
        padding:15px;
      }
    </style>
  </head>
  <body>
    <div class='timeOutBox'>
      <div>
        <h2>是否繼續操作?</h2>
      </div>  
      <div>
        <button onclick='fs_close()'>Yes</button>
        <button onclick='location.href="userMode.php"'>No</button>
      </div>
    </div>
    <?php
      include('../link.php');
      $sql = 'select * from users where 1=1';
      @$key = $_GET['keyWord'];
      @$sortOrder = $_GET['sort'];
      @$isAsc = $_GET['isAsc'] ? $_GET['isAsc'] : 'asc';
      if($key){
        $sql .= " and account like '$key'";
      }
      if($sortOrder){
        $isAsc = isset($_GET['isAsc']) ? $_GET['isAsc'] : false;
        $isAsc = $isAsc ? false : true;
        $sql.= " order by $sortOrder $isAsc";
      }
      $query = $db->query($sql)->fetchAll();
    ?>
    <button onclick="history.go(-1)">上一頁</button>
    <form action="./" method="get">
      <section>
        <input type="text" name="keyWord" placeholder='請輸入關鍵字'>
        <button type="submit">查詢</button>
      </section>
      <br>
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
      </section>

      <section>
        <input type="text" name='time' value='100'>
        <button type='button' onclick='fs_count()'>重新設定</button>
      </section>
    </form>
    <div>
      <div class='box'>
        <div>ID</div>
        <div>帳號</div>
        <div>密碼</div>
        <div>姓名</div>
        <div>權限</div>
        <div>操作</div>
      </div>
      <?php foreach ($query as $data) { ?>
          <div class="box">
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
    <script>
      let flag = 0

      function fs_count(){
        time = document.querySelector('input[name="time"]')
        console.log(time.value);
        setTimeout(fs_timeOut, time.value*1000);
      }

      function fs_timeOut(){
        console.log('timeout');
        flag = 0;
        document.querySelector('.timeOutBox').classList.add('active');
        fs_timeOutCount();
      }

      function fs_timeOutCount(){
        console.log('timeOutCount');
        setTimeout(() => {
          if(flag) return ;
          console.log('timeout!!!');
        }, 5000);
      }

      function fs_close(){
        flag = 1
        document.querySelector('.timeOutBox').classList.remove('active');
        fs_count()
      }
      fs_count()
    </script>
  </body>
</html>
