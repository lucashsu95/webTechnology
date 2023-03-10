<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src='jquery.js'></script>
    <style>
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 90px auto;
            width: 600px;
            height: 400px;
            background-color: deepskyblue;
        }

        .any {
            font-size: 20px;
        }

        .div1 {
            width: 250px;
            height: 30px;
            font-size: 15px;
        }
    </style>
</head>

<body>

    <form id="form1" action="loginprocess.php" method="POST">
        <div class='any'>
            <p>
            <div style='display:flex;'>
                <div style='width:50px;'>
                    帳號:
                </div>
                <input type="text" id="acc" name="acc" placeholder="請輸入帳號" class='div1'><br>
            </div>
            </p>
            <p>
            <div style='display:flex;'>
                密碼:<input type="password" id="pwd" name="pwd" placeholder="請輸入密碼" class='div1'>
            </div>
            </p>
            <p>
                驗證碼:
            <div id="img"></div>
            <input type="text" name="captcha" placeholder="請輸入驗證碼">
            </p>
            <input type="button" value="重設驗證碼" onclick="create_captcha_img()"><br>
            <input type="submit" value="登入">
            <input type="hidden" name="ans_captcha" id="ans">
        </div>

        <br>
    </form>
    <script language="javascript">
        const numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "A", 'B', 'C', 'D', 'E', 'F', "G", "H", "I", "J", "K", 'L', 'M', 'N', 'P', "O", 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        let record = [];
        let img = $('#img');
        let ans = $('#ans');

        function create_captcha_img() {
            $('#img *').remove();
            for (let i = 0; i < 4; i++) {
                let num = numbers[Math.floor(Math.random(0, numbers.length - 1) * numbers.length)];
                let imgUrl = 'captcha.php?num=' + num;
                let image = document.createElement('img');
                record.push(num);
                image.src = imgUrl;
                $(img).append(image);
            }
            $(ans).attr('value', record.join(''));
        }
        create_captcha_img();
    </script>

</body>

</html>