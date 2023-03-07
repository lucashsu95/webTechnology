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
    <nav>
      <div class='nav-left'>
          Logo
      </div>
      <div class='nav-right'>

        <ul>
          <li><a href="./user">會員管理</a></li>
          <li><a href="shopMod.html">上架商品</a></li>
          <li><a href="./addtemplate.html">新增模版</a></li>
          <?php
            }
            ?>
            <li><a href="logout.php">登出</a></li>
          </ul>
        </div>
      </nav>
      <form action="./" method="get">
        <input type="text" name="keyWord" placeholder='請輸入關鍵字'><br>
        <input type="text" name="startPrice" placeholder='請輸入金額範圍'>
        ~
        <input type="text" name="endPrice" placeholder='請輸入金額範圍'>
        <button type="submit">查詢</button>
      </form>
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
      <div class="layouts">
        <?php 
          @$key = $_GET['keyWord'];
          @$startPrice = $_GET['startPrice'];
          @$endPrice = $_GET['endPrice'];
          $sql = 'select * from product where 1=1';
          if($key){
            $sql .= " and (name like '$key' or price like '$key' or link like '$key' or udesc like '$key' or date like '$key')";
          }
          if($startPrice){
            $sql .= " and price>=$startPrice";
          }
          if($endPrice){
              $sql .= " and price<=$endPrice";
          }

          $productAry = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
          
          $sql2 = 'select * from template';
          $templateAry = $db->query($sql2)->fetchAll(PDO::FETCH_NUM);
          
          foreach($productAry as $i=>$product){
            $template = $templateAry[$product['template_index']];
            $layout = json_decode($template[1]);
            
            ?>

              <div class='layout' style='background:<?php echo $template[2]?>'>
              <a href='modifyshopMod.php?id=<?php echo $product["id"] ?>'>修改</a>

              <?php
            // print_r($templateAry[$product['template_index']]);
            
            foreach($layout as $key){
              if(is_numeric($key)) continue;

              $value = $productAry[$i][$key];
              if($key == 'image'){
                $img = file_get_contents($value);
                echo "<div><img src='$img' alt='image'></div>";
              }elseif($key === 'price'){
                $value = str_pad($value,4,'0',STR_PAD_LEFT);
                echo "<div>費用：$value</div>";
              }else{
                echo "<div class='$key'>$value</div>";
              }
            }
            ?> </div> <?php
          }
        ?>
      </div>
    <?php
      }else{
          header('location:login.html');
      }
    ?>
    <script src="./js/script.js"></script>
  </body>
</html>
