<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <?php
        include('link.php');

        if (isset($_SESSION['user'])){  
            if ($_SESSION['user']['role']=='管理員'){
                ?>
                <a href="./user/index.php">會員管理</a>
                <a href="adduser.php">新增會員</a>
                <?php
                
            }
            ?>
            
            <a href="logout.php">登出</a>
            <?php
        }else{
            header('location:login.html');
        }
    
    ?>
        
</body>

</html>