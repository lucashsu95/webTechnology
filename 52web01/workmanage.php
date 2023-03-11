<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-工作管理</title>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <style>
        .insertzone {
            position: fixed;
            background: #333333AA;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 50%;
            color: white;
            font-weight: bolder;
            text-align: center;
        }

        .insertzone>form {
            width: 100%;
        }
    </style>
</head>

<body>
    <table width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>日期</td>
                <td>工作名稱</td>
                <td>處理狀態</td>
                <td>優先順序</td>
                <td>開始時間</td>
                <td>結束時間</td>
                <td>工作內容</td>
                <td>各種操作</td>
            </tr>
            <tr>
                <td colspan="8">
                    <hr />
                </td>
            </tr>
        </thead>
        <tbody>
        <tfoot>
            <tr>
                <td colspan="8" style="text-align: center;padding:10px">
                    <button onclick="activeForm()">新增</button>
                    <button onclick="location.href='./'">返回</button>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="insertzone" style="display: none;">
        <!-- 
          這裡不先寫好 HTML 是因為我們網頁不會重整，因此第二次進行新增時 HTML 子元素需要清掉
          因此直接由 JavaScript 來設計較適宜
        -->
    </div>
    <script>
        let start = 0;

        function chginput() {
            let item = $(this).parent().siblings();
            item.parent().html(`
    <td><input type="hidden" name="id" value="${item.eq(0).text()}">${item.eq(0).text()}</td>
    <td><input type="text" name="ymd" value="${item.eq(1).text()}"></td>
    <td><input type="text" name="workname" value="${item.eq(2).text()}"></td>
    <td><input type="text" name="process" value="${item.eq(3).text()}"></td>
    <td><input type="text" name="priority" value="${item.eq(4).text()}"></td>
    <td><input type="text" name="starttime" value="${item.eq(5).text()}"></td>
    <td><input type="text" name="endtime" value="${item.eq(6).text()}"></td>
    <td><input type="text" name="workcontent" value="${item.eq(7).text()}"></td>
    <td>
      <button onclick="chgtxt(this)">儲存</button>
    </td>
  `);
            //像這裡就直接指定 onclick，否則你必須要在宣告一次 click
            //HTML 的 onclick 不像 js event 事件能自身帶 this，所以要塞入 this 才能傳遞
        }

        function chgtxt(who) {
            const data = $(who).parents("tr").find("input").serialize();
            $.post("api.php?do=update", data, function(cdate) {
                let item = $(who).parent().siblings();
                console.log(item)
                const
                    id = item.eq(0).text(),
                    ymd = item.eq(1).children().val(),
                    workname = item.eq(2).children().val(),
                    process = item.eq(3).children().val(),
                    priority = item.eq(4).children().val(),
                    starttime = item.eq(5).children().val(),
                    endtime = item.eq(6).children().val(),
                    workcontent = item.eq(7).children().val();

                item.parent().html(`
      <td>${id}</td>
      <td>${ymd}</td>
      <td>${workname}</td>
      <td>${process}</td>
      <td>${priority}</td>
      <td>${starttime}</td>
      <td>${endtime}</td>
      <td>${workcontent}</td>
      <td>
        <button class="mdy">修改</button>
        <button onclick="del(this)">刪除</button>
      </td>
    `);
                $(".mdy").click(chginput); //這裡新的 HTML 已經跟前面出現過的脫節，所以還要重新再綁一次
            });
        }

        function del(who) {
            let id = $(who).parent().siblings().eq(0).text();
            // $.post("api.php?do=delete",{"id":id},function(result){ //DATA=JSON
            $.post("api.php?do=delete", {
                id
            }, function(result) {
                if (result) $(who).parent().parent().remove(); //有回傳才做事
            });
        };
        <?php
        include('addworks.php');
        ?>

        function sendForm(who) {
            // const data = $(who).parents("form").find("input").serialize();
            const data = new FormData($(who).parents("form")[0])
            console.log(data)
            // $.post("api.php?do=insert", data, function(result) {
            //     //由於是分流載入而考慮情況較多。最快就是歸零重新載入初始 select
            //     $("tbody").empty();
            //     start = 0;
            //     loading();
            //     $(".insertzone").fadeOut();
            // });
            // $.ajax({
            //     method: 'POST',
            //     url: 'test.php',
            //     processData: false,
            //     contentType: false,
            //     data: data,
            //     success: function(result) {
            //         console.log(result)
            //         // $("tbody").empty();
            //         // start = 0;
            //         // loading();
            //         // $(".insertzone").fadeOut();
            //     }
            // })

            fetch('api.php?do=insert', {
                method: 'POST',
                body: data
            }).then(function() {
                $("tbody").empty();
                start = 0;
                loading();
                $(".insertzone").fadeOut();
            })
        }

        function loading() {
            $.post("api.php?do=select", {
                start
            }, function(result) {
                if (result != "fail") {
                    $("tbody").append(result);
                    $(".mdy").click(chginput); //因為是後來生成的 HTML，你必須重新使 DOM 路徑被認識（或者走 HTML 的 onclick 比較快）
                    start += 10;
                }
            });
        }
        loading();
    </script>

</body>