<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <style>
        table{
            width: 600px;
            border: 1px solid #ddd;
            padding: 8px 12px;
            border-radius: 5px;
            margin:auto auto;
        }
        form{
            margin-top:30px;
            display: flex;
            justify-content: center;
        }
        input{
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            outline: none;
            width: 85%;
            max-height: 40px;
        }
    </style>
</head>

<body>

    <?php
    include('link.php');
    @$key = $_POST['key'];
    $sqlstr = 'select * from users where 1=1';
    if($key <> ''){
        $sqlstr .= ' and (';
        $sqlstr .= "account like '".$key."'";
        $sqlstr .= "or password like '".$key."'";
        $sqlstr .= "or role like '".$key."'";
        $sqlstr .= ")";
    }
    $sql = $db->prepare($sqlstr);
    $sql->execute();
    $query = $sql->fetchAll();
    ?>
    
    <form action="index.php" method="post">
        <input type="text" name="key" id="key" placeholder='查詢' style='width:200px'>
        <input type="submit" value="查詢" style="width:100px;">
    </form>


    <table width=100% style="margin-top:20px;">
    
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
        <?php 
        foreach($query as $data){
        ?>
        <tr>
            <td><?php echo $data['id']?></td>
            <td><?php echo $data['account']?></td>
            <td><?php echo $data['password']?></td>
            <td><?php echo $data['role']?></td>
            <td>
                <a href="#">修改</a>
                <a href="#">刪除</a>
            </td>
        </tr>
        <?php } ?>

    </table>
</body>

</html>