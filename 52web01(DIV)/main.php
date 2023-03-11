<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery.js"></script>
    <link rel="stylesheet" href="./jquery-ui.min.css">
    <script src="./jquery-ui.min.js"></script>
</head>
<style>
    .item {
        display: flex;
    }

    .time {
        width: 100px;
        height: 50px;
        border: 1px solid #333;

    }

    .work {
        width: 300px;
        height: 50px;
        border: 1px solid #333;
        display: flex;
    }

    .content {
        width: 80px;
        height: 100px;
        border: 1px solid #333;
        background-color: blue;
        color: white;
    }
</style>

<body>
    <div id="any" class="any">
        <div class="item"></div>
    </div>
</body>

<script>
    $(function() {

        for (let i = 0; i < 24; i++) {
            let dv = $('<div class="item"><div class="time" id=" + (i + 1) + ">0' + i + '-0' + (i + 1) + '</div><div class="work" id=" + (i + 1) + "></div></div>')
            $('.any').append(dv)
        }
        $('.work:eq(0)').append('<div class="content">00-00</div>')
        $('.work:eq(2)').append('<div class="content">02-03</div>')

        $('.item').droppable({
            accept: '.content',
            tolerance: 'pointer',

            drop: function(event, ui) {
                console.log(event, ui)
                // console.log(ui.draggable)
                var wrapper = $("#any").offset();
                var pos = ui.helper.offset();
                $(ui.draggable).text('')
                $(ui.draggable).text($(event.target).text()+','+(pos.top - wrapper.top))

                // $(ui.)
                // console.log(ui.draggable)
            }
        })
        $('.content').draggable({
            containment: '.any',
            stop:function(event,ui) {
        //var wrapper = $("#wrapper").offset();
        //var borderLeft = parseInt($("#wrapper").css("border-left-width"),10);
        //var borderTop = parseInt($("#wrapper").css("border-top-width"),10);
        //var pos = ui.helper.offset();
        //$(ui.draggable).text('')
                //$(ui.draggable).text(pos.top)
        //$("#source_x").val(pos.left - wrapper.left - borderLeft);
        //$("#source_y").val(pos.top - wrapper.top - borderTop);
        //alert($("#source_x").val() + "," + $("#source_y").val());
    }
        })
    })
</script>

</html>