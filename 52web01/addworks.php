    function activeForm() {
    $(".insertzone").html(`
    <form>
        <h2>a工作編輯</h2>
        <hr>
        <p>日期：<input type="date" name="ymd"></p>
        <p>b工作名稱：<input type="text" name="workname"></p>
        <p>c處理狀態：<select name="process">
                <option value='未處理'>未處理</option>
                <option value='處理中'>處理中</option>
                <option value='已完成'>已完成</option>
            </select></p>
        <p>d優先順序：<select name='priority'>
                <option value="普通件">普通件</option>
                <option value="速件">速件</option>
                <option value="最速件">最速件</option>
            </select></p>
        <p>e開始時間：<select name='starttime'>
                <?php for ($i = 1; $i <= 23; $i++) { ?>
                    <option value='<?php echo $i; ?>'><?php echo $i; ?>:00</option>
                <?php } ?>
            </select></p>
        <p>f結束時間：<select name='endtime'>
                <?php for ($j = 1; $j <= 23; $j++) { ?>
                    <option value='<?php echo $j; ?>'><?php echo $j; ?>:00</option>
                <?php } ?>
            </select></p>
        <p>g工作內容：<input type="text" name="workcontent"></p>
        <hr>
        <p>
            <button type="button" onclick="sendForm(this)">新增</button>
            <button type="button" onclick="closeAddform()">取消</button>
        </p>
    </form>
    `);
    $(".insertzone").fadeIn();
    }

    function closeAddform() {
    $(".insertzone").fadeOut();
    }