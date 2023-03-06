<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>首頁</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.47/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <?php 
    include('link.php');
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] === '管理員'){
    ?>
    <ul>
      <li><a href="./user/userMod.php">新增會員</a></li>
      <li><a href="./user">會員管理</a></li>
      <li><a href="shopMod.html">上架商品</a></li>
      <?php
        }
        ?>
      <li><a href="logout.php">登出</a></li>
    </ul>
    <div id="app">
      <div class="layouts">
        <div v-for="product,i in productAry" class="layout">
          <div
            v-for='value in templateAry[product["template_index"]]'
            v-html="preview_product(value,i)"
          ></div>
          <a
            :href="'modifyshopMod.php?id=' + product['id']"
            style="text-align: center"
            >修改</a>
        </div>
      </div>
    </div>
    <?php
      }else{
          header('location:login.html');
      }
    ?>
    <script src="./js/script.js"></script>
  </body>
</html>
