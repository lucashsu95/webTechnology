<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo工作表_test</title>
    <script src='jquery.js'></script>
    <script src='jquery-ui.js'></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script> -->
    <style>
        * {
            box-sizing: border-box;
        }

        #todo-container {
            width: 500px;
            height: 1230px;
            border: 1px solid #333;
        }

        .grid-2x2 {
            display: grid;
            grid-template-columns: 100px 1fr;
            grid-template-rows: 30px 1200px;
        }

        .todo-header {
            background-color: rgb(25, 125, 90);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #times {
            background-color: rgb(60, 200, 180);
            display: flex;
            flex-direction: column;
        }

        #times>div {
            flex-grow: 1;
            display: flex;
            align-items: center;
            padding-left: 10px;
            border-bottom: 1px solid #333;
        }

        #todos {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .row {
            flex-grow: 1;
            border-bottom: 1px solid #333;
        }

        .todo {
            position: absolute;
            padding: 6px;
            border: 2px solid #333;
            background-color: rgb(205, 245, 220);

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
        }

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

    <h2>TODO 工作管理系統</h2>

    <?php
    include('link.php');
    if (isset($_SESSION['user'])) {

        // $startAt = $_GET['start'];
        // if ($startAt == '') $startAt = date('Y-m-d');
        // $endAt = $_GET['end'];
        // if ($endAt == '') $endAt = date('Y-m-d');

        $startAt = $_GET['start'] ?? date('Y-m-d');
        $endAt = $_GET['end'] ?? date('Y-m-d');
    ?>
        <p>
            查詢時間
            <input type='date' id="star" value="<?php echo $startAt; ?>">～
            <input type="date" id="end" value="<?php echo $endAt; ?>">
            <!-- 是用ID名稱在傳值的 -->
            <input type='button' value='查詢' onclick="location.href='index.php?start='+star.value+'&end='+end.value;">
        </p>
        <p>
            <button onclick='location.href="workmanage.php"'>工作管理</button>
            <!-- <button onclick="location.href='addwork.php'" style='width:70px; height:30px;'>新增工作</button> -->
        </p>

        <div id="todo-container">
            <div class="grid-2x2">
                <div class="todo-header">時間</div>
                <div class="todo-header">工作計畫</div>
                <div id="times"></div>
                <div id="todos"></div>
            </div>
        </div>
        <div></div>

        <script>
            let start = 0
            let todos = [];

            $.ajax({
                type: "POST",
                data: {
                    start
                },
                // dataType: 'json',
                url: "api.php?do=selecttime&startAt=<?php echo $startAt ?>&endAt=<?php echo $endAt; ?>",
                success: function(result) {
                    // let ary1 = result.split("^@").filter(function(x) {
                    //     return x.length > 0
                    // });

                    // let ary2 = [];
                    // //alert(ary1.length);
                    // for (i = 0; i < ary1.length; i++) {
                    //     ary2 = ary1[i].split('^&');

                    //     todos.push({
                    //         id: ary2[0],
                    //         workname: ary2[1],
                    //         process: ary2[2],
                    //         priority: ary2[3],
                    //         starttime: (ary2[4]),
                    //         endtime: (ary2[5]),
                    //         workcontent: ary2[6],
                    //         ymd: ary2[7],
                    //         order: 0
                    //     });
                    // }
                    todos = JSON.parse(result)
                    rerender()
                }
            });

            // 先抓到要處理的DOM
            const container = document.querySelector('#todo-container')
            const timesDiv = document.querySelector('#times')
            const todosDiv = document.querySelector('#todos')

            // 把數字轉為兩位數，位數不足補0
            function toFixedLength(num, len) {
                return num.toString().padStart(len, '0')
            }

            // 渲染畫面
            function render() {
                // 存渲染過的代辦事項，用來計算要往右邊推幾格
                const renderedTodos = []

                // 迴圈: 每2小時為1單位
                for (let i = 0; i < 24; i = i + 1) {
                    // 產生 00-01、01-02...的div
                    if (i % 2 == 0) {
                        const timeDiv = document.createElement('div')
                        timeDiv.innerText = `${toFixedLength(i, 2)}-${toFixedLength(i + 2, 2)}`
                        timesDiv.append(timeDiv)
                    }

                    // 每一列的div
                    const rowDiv = document.createElement('div')
                    rowDiv.className = 'row'
                    rowDiv.dataset.starttime = i

                    // 抓出當下要印的代辦事項
                    Lcount = 0
                    todos.filter(todo => todo.starttime == i).forEach(todo => {
                        console.log(todo)
                        const todoDiv = document.createElement('div')
                        todoDiv.className = 'todo'
                        todoDiv.dataset.id = todo.id
                        Lcount++
                        // <div>${Lcount}:${toFixedLength(todo.starttime, 2)}-${toFixedLength(todo.endtime, 2)}</div>
                        todoDiv.innerHTML = `   
                        <div>${todo.workname}</div>
                        <div>${todo.process}</div>
                        <div>${todo.priority}</div>
                        <div>${todo.ymd}</div>
                        `
                        const width = 100
                        const height = (todo.endtime - todo.starttime) / 2 * 100
                        todoDiv.style.width = `${width}px`
                        todoDiv.style.height = `${height}px`

                        // 計算有幾個時間區間有重疊，需要往右推
                        todo.order = 0

                        //alert(renderedTodos.length);
                        for (let i = 0; i < renderedTodos.length; i++) {
                            // console.log(todo, renderedTodos[i]);
                            //alert(parseInt(renderedTodos[i].endtime) +','+ parseInt(todo.starttime) + (parseInt(renderedTodos[i].endtime) > parseInt(todo.starttime)) + renderedTodos[i].order+todo.order);
                            if (todo.order == renderedTodos[i].order && parseInt(renderedTodos[i].endtime) > parseInt(todo.starttime)) {
                                //if (todo.order <= renderedTodos[i].order) {
                                //todo.order +=1
                                todo.order = renderedTodos[i].order + 1
                                //}
                            } else {
                                //break;
                            }

                        }

                        // const orders = renderedTodos.filter(otherTodo => {
                        //     console.log(otherTodo, todo);
                        //     return otherTodo.endtime > todo.starttime
                        // }).map(todo => todo.order || 0)
                        // if (orders.length) {
                        //     todo.order = Math.max(...orders) + 1
                        // } else {
                        //     todo.order = 0
                        // }

                        // console.log(orders);

                        const offsetX = todo.order * (width + 10)
                        todoDiv.style.left = `${offsetX}px`
                        //if(todo.starttime == i + 1){
                        todoDiv.style.top = todo.starttime * 50 + 'px'
                        //}
                        rowDiv.append(todoDiv)
                        renderedTodos.push(todo)
                        console.log((renderedTodos))

                        renderedTodos.sort(function(La, Lb) {
                            return La["order"] - Lb["order"]
                        });
                    })

                    todosDiv.append(rowDiv)
                }

                // 把 row 設定成可放置區域
                $(".row").droppable({
                    // class為todo就可以放
                    accept: '.todo',
                    // 放置區域以滑鼠為準
                    tolerance: 'pointer',
                    // 放下後要做的事
                    drop: function(e, ui) {
                        console.log(e, ui);
                        const starttime = parseInt(e.target.dataset.starttime)
                        const id = ui.draggable[0].dataset.id
                        const todo = todos.find(todo => todo.id == id)

                        // 先計算這個代辦事項共幾個小時在重新設定起始時間
                        const interval = todo.endtime - todo.starttime
                        const endtime = starttime + interval

                        // 如果結束時間超出24會有問題
                        if (endtime <= 24) {
                            todo.starttime = starttime
                            todo.endtime = endtime

                            $.ajax({
                                type: "GET",
                                url: "api.php?do=updatetime&starttime=" + starttime + "&endtime=" + endtime + "&id=" + id,
                                success: function(result) {
                                    if (result != "updated") {
                                        alert('update failed')
                                    }
                                }
                            });
                        }
                        // 重新渲染
                        rerender()
                    }
                })

                // 將todo設定為可拖的DOM
                $(".todo").draggable({
                    // 只能拖動Y軸
                    axis: 'y',
                    // 設定他只能在 #todos 當中拖動
                    containment: "#todos",
                })

                // 抓出當下最大往右推幾格並重新設定整個容器的寬度
                const maxOrder = Math.max(...todos.map(todo => todo.order))
                const newWidth = Math.max(500, 300 + maxOrder * 100)
                container.style.width = `${newWidth}px`
            }

            function rerender() {
                timesDiv.innerHTML = ''
                todosDiv.innerHTML = ''
                render()
            }

            function sendForm(who) {
                const data = $(who).parents("form").find("input,select").serialize();

                $.post("api.php?do=insert", data, function(result) {
                    //由於是分流載入而考慮情況較多。最快就是歸零重新載入初始 select
                    console.log(result);
                    $("tbody").empty();
                    start = 0;
                    loading();
                    $(".insertzone").fadeOut();
                });
            }

            // 記得要先渲染
            render()
        </script>
        <a href="logout.php" style="width:200px;height:200px;">登出</a>
    <?php
    } else {
    ?>
        <a href="login.php" style="width:200px;height:200px;">登入</a>
    <?php
    }
    ?>
</body>

</html>