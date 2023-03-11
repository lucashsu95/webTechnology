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
      include('nav.php');
      ?>

      <form action="./" method="get">
        <input type="text" name="keyWord" placeholder='請輸入關鍵字'><br>
        <input type="text" name="startPrice" placeholder='請輸入金額範圍'>
        ~
        <input type="text" name="endPrice" placeholder='請輸入金額範圍'>
        <button type="submit" class='btn'>查詢</button>
      </form>
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

          if ($_SESSION['user']['role'] !== '管理員') {
            $sql .= ' and isShow = 0 order by isTop desc, date desc'; 
          }
          
          $productAry = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

          $sql2 = 'select * from template';
          $templateAry = $db->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
          
          foreach($productAry as $product){
            foreach($templateAry as $template){
              // echo 'template["id"]:' . $template['id'] . "<br>";
              // echo 'product["template_id"]:' . $product["template_id"] . "<br>";

              // var_dump($template['id'],$product['template_id']);
              if($template['id'] == $product['template_id']){
                $layout = json_decode($template['layout']);
                break;
              }
            }
            // echo '<br>';
            // var_dump($layout);
            // var_dump($template['color']);
            ?>
              <div class='layout' style='background:<?php echo $template['color']; ?>'>
              <?php
              if($_SESSION['user']['role'] === '管理員'){
                ?>
                <a href='modifyshopMod.php?id=<?php echo $product["id"] ?>'>修改</a>
                <a href='setIsTop.php?id=<?php echo $product["id"] ?>'>置頂</a>
                <a href='setIsShow.php?id=<?php echo $product["id"] ?>&isShow=<?php echo !$product['isShow']; ?>'>
                  <?php echo $product['isShow'] ? '隱藏' : '顯示'; ?>
                </a>
                  <a href='api.php?do=destroyProduct&id=<?php echo $product["id"] ?>'>刪除</a>
                <?php
              }
            foreach($layout as $key){
              $value = $product[$key];

              if($key === 'image'){
                $img = $value;
                // if (pathinfo($value, PATHINFO_EXTENSION) == ""){
                //   $img = file_get_contents($value);
                // }
              echo "<div><img src='$img' alt='image'></div>";
              }elseif($key === 'price'){
                echo "<div>費用：$value</div>";
              }else{
                echo "<div class='$key'>$value</div>";
              }
            }

            ?>
          </div> <?php
          }
        ?>
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
