<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 190px;
            height: 150px;
        }

        td {
            border: 1px solid #333;
            text-align: left;
            text-align: center;
        }

        .active {
            background-color: #39f;
        }
    </style>
</head>

<body>
    <h1></h1>
    <table>
        <tr>
            <td data-id=1></td>
            <td data-id=2></td>
            <td data-id=3></td>
        </tr>
        <tr>
            <td data-id=4></td>
            <td data-id=5></td>
            <td data-id=6></td>
        </tr>
        <tr>
            <td data-id=7></td>
            <td data-id=8></td>
            <td data-id=9></td>
        </tr>
    </table>
    <button>
        驗證
    </button>

    <script>
        var wins = {
            '水平線': [
                [1, 2, 3],
                [4, 5, 6],
                [7, 8, 9],
            ],
            '垂直線': [
                [1, 4, 7],
                [2, 5, 8],
                [3, 6, 9],
            ],
            '斜線': [
                [1, 5, 9],
                [3, 5, 7],
            ]
        }
        var key = parseInt(Math.random() * 3)
        var text = Object.keys(wins)[key]
        wins = wins[text]
        document.querySelector('h1').innerText = text

        for (var td of document.querySelectorAll('td')) {
            //     if (this.classList.contains('active')){
            //         this.classList.remove('active')
            //     } else {
            //     this.classList.add('active')
            // }
            td.addEventListener('click', function() {
                this.classList.toggle('active')
                console.log(this)
            })
        }
        document.querySelector('button').addEventListener('click', function() {
            console.log(this)
            var input = []
            for (var td of document.querySelectorAll('td')) {
                if (td.classList.contains('active')) {
                    input.push(td.dataset.id)
                }
            }
            if (input.length == 3) {
                var isWin = false
                for (var win of wins) {
                    var count = 0
                    for (var i = 0; i < 3; i++) {
                        if (input[i] == win[i]) {
                            count += 1
                        }
                    }
                    if (count == 3) {
                        isWin = true
                        break
                    }
                }
                if (isWin) {
                    alert('通過')
                } else {
                    alert('錯誤')
                }
            } else {
                alert('驗證錯誤')
            }
        })
    </script>
</body>

</html>