<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    form {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 90px auto;
        width: 500px;
        height: 500px;
        background-color: deepskyblue;
    }

    .any {
        font-size: 20px;
    }
</style>

<body>
    <form action='addworkprocess.php' method="POST">
        <div class="any">
            <div>a工作編輯</div>
            <p>
                <input type='date' name='ymd'>
            </p>
            <p>
                b工作名稱：<input type='text' name='workname' placeholder="請輸入工作名稱">
            </p>
            <p>
                c處理情形：
                <select name="process">
                    <option value='未處理'>未處理</option>
                    <option value='處理中'>處理中</option>
                    <option value='已完成'>已完成</option>
                </select>
                d優先情形：
                <select name='priority'>
                    <option value="普通件">普通件</option>
                    <option value="速件">速件</option>
                    <option value="最速件">最速件</option>
                </select>
            </p>
            <p>
                e開始時間：
                <select name='starttime'>
                    <?php for ($i = 0; $i <= 23; $i++) { ?>
                        <option value='<?php echo $i; ?>'>0<?php echo $i; ?>:00</option>
                    <?php } ?>
                </select>
                f結束時間：
                <select name='endtime'>
                    <?php for ($j = 0; $j <= 23; $j++) { ?>
                        <option value='<?php echo $j; ?>'>0<?php echo $j; ?>:00</option>
                    <?php } ?>
                </select>
            </p>
            <p>
            <div>g工作內容：</div>
            <p>
                <input type='text' name='workcontent' placeholder="工作內容詳細說明"><br>
            </p>

            </p>
            <input type='submit' style="width:70px; height:30px; font-size:20px;">
            <input type='reset' style="width:70px; height:30px; font-size:20px;">

        </div>
    </form>
</body>

</html>