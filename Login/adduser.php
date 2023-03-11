<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adduser</title>
    <link rel="stylesheet" href="./style.css">
    </style>
</head>

<body>
    <button onclick="history.back()" class="btn">Go Back</button>
    <form action="adduserprocess.php" method="post" class="adduser">
        <h1>Adduser</h1>
        <p>
            <input type="text" name="act" required>
        </p>
        <p>
            <input type="password" name="pwd" required>
        </p>
        <p style="margin-right: auto;">
            <select name="role" required>
                <option value='' disabled selected>請選擇</option>
                <option value="會員" required>會員</option>
                <option value="管理員">管理員</option>
            </select>
        </p>
        <input type="submit" value="Adduser" class="btn">
        <input type="reset" value="reset" class="btn">
    </form>
</body>

</html>