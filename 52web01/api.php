<?php
include('link.php');

// 取得 PDO 物件，另外順便校正 PHP 時差

// 這裡用 switch 是因為還有其他 Ajax 提交，因此利用 GET 來做區分判斷處理。
switch ($_GET['do']) {
  case 'select':
    $sql = "SELECT * FROM utodo";
    $rows = $db->query($sql)->fetchAll();
    // print_r($_POST);
    // print_r($rows);
    if ($rows) {
      foreach ($rows as $row) {
        echo '
      <tr>
          <td>' . $row['id'] . '</td>
          <td>' . $row['ymd'] . '</td>
          <td class="name">' . $row['workname'] . '</td>
          <td>' . $row['process'] . '</td>
          <td>' . $row['priority'] . '</td>
          <td>' . $row['starttime'] . '</td>
          <td>' . $row['endtime'] . '</td>
          <td>' . $row['workcontent'] . '</td>
          <td>
            <button class="mdy">修改</button>
            <button onclick="del(this)">刪除</button>
          </td>
      </tr>
      ';
      }
    } else echo 'fail';
    // SQL 內取得所有動物資料，由 foreach 規劃完整 tr>td，使前端單純 HTML 替換即可。
    break;
  case 'selecttime':
    $sql = "SELECT * FROM utodo where ymd between '" . $_REQUEST['startAt'] . "' and  '" . $_REQUEST['endAt'] . "' order by starttime";
    $rows = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // print_r($_POST);
    // print_r($rows);
    if ($rows) {
      echo json_encode($rows);
      // foreach ($rows as $row) {
      //   echo $row['id'] . "^&";
      //   echo $row['ymd'] . "^&";
      //   echo $row['workname'] . "^&";
      //   echo $row['process'] . "^&";
      //   echo $row['priority'] . "^&";
      //   echo $row['starttime'] . "^&";
      //   echo $row['endtime'] . "^&";
      //   echo $row['workcontent'] . "^@";
      // }
    } else echo 'fail';
    // SQL 內取得所有資料，由 foreach 規劃完整 tr>td，使前端單純 HTML 替換即可。
    break;
  case 'updatetime':
    $sql = "UPDATE utodo SET starttime='" . $_GET['starttime'] . "',endtime='" . $_GET['endtime'] . "' WHERE id=" . $_GET['id'];
    $result = $db->query($sql);
    // 成功時，我們 HTML 生成所需要的更新日期之文字，透過 Ajax 回傳給前端
    if ($result) echo "updated";
    break;
  case 'update':
    $sql = "UPDATE utodo SET ymd='" . $_POST['ymd'] . "',workname='" . $_POST['workname'] . "',process='" . $_POST['process'] . "',priority='" . $_POST['priority'] . "',starttime='" . $_POST['starttime'] . "',endtime='" . $_POST['endtime'] . "',workcontent='" . $_POST['workcontent'] . "' WHERE id=" . $_POST['id'];
    $result = $db->query($sql);
    // 成功時，我們 HTML 生成所需要的更新日期之文字，透過 Ajax 回傳給前端
    break;
  case 'delete':
    $sql = "DELETE FROM utodo WHERE id=" . $_POST['id'];
    $result = $db->query($sql);
    if ($result) echo "deleted";
    break;
  case 'insert':
    $sql = "INSERT INTO utodo(ymd,workname,process,priority,starttime,endtime,workcontent) VALUES('" . $_POST['ymd'] . "','" . $_POST['workname'] . "','" . $_POST['process'] . "','" . $_POST['priority'] . "','" . $_POST['starttime'] . "','" . $_POST['endtime'] . "','" . $_POST['workcontent'] . "')";
    $result = $db->query($sql);

    if ($result) echo "inserted";
    break;
}
