<fieldset>
    <legend>新增問卷</legend>

    <div style="display: flex;">
        <div class="clo" style="width: 20%;">問卷管理</div>
        <input type="text" name="name" id="name">
    </div>
    <br>
    <div class="clo moreDiv">
        <div>選項<input type="text" name="opts[]" class="opts"><input type="button" value="更多" onclick="more()"></div>
    </div>
    <div>
        <input type="button" value="新增" onclick="addQue()">
        <input type="button" value="清空" onclick="reset()">
    </div>
</fieldset>

<script>
    function more() {
        $('.moreDiv').prepend(`<div>選項<input type="text" name="opts[]" class="opts"></div>`)
    }

    function addQue() {
        let name = $('#name').val();

        let opts = new Array();
        $('.opts').each((key,val)=>{
            opts.push($(val).val());
        })

        // console.log(opts);
        if(name != ''){
            $.post('./api/add_que.php',{name,opts},()=>{
                location.reload();
            })
        }

    }

    function reset() {
        $('input[type=text]').val('');
    }
</script>