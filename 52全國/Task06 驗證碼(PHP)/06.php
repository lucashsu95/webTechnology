<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>驗證碼(PHP)</title>
    <style>
        .ans{
            font-size:48px;
            font-weight:bold;
        }

    </style>
</head>

    <body>
        <?php
        session_start();
        @$user = $_POST['user-captcha'];       
        
        if ($user <> ''){
            if ($user == $_SESSION['ans']){
                ?>
                <span class='ans' style='color:#008800'>成功</span>
                <?php
            }else{
                ?>
                <span class='ans' style='color:#880000;'>失敗</span>
                <?php
            }
        }
        ?>
        <form action="06.php" method="post">
            <input type="text" name="user-captcha" placeholder='請輸入驗證碼'>
                <img id='img_captcha' src="06-captcha.php" alt="1">
            <input type='button' value='刷新驗證碼' onclick='reset_captcha()'><br>
            <input type="submit" value="驗證">
        </form>
        <script language='javascript'>
            function reset_captcha() {
                document.getElementById('img_captcha').src = '06-captcha.php';
            }
        </script>
    </body>
</html>