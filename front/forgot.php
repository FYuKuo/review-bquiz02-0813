<fieldset class="w-70 aut" style="padding: 20px;">
    <legend>忘記密碼</legend>

    <table class="aut w-80">
        <tr>
            <td >
                請輸入信箱以查詢密碼
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="email" id="email" style="width: 100%;">
            </td>
        </tr>
        <tr>
            <td class="showText">

            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="尋找" onclick="findPw()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function findPw(){
        let email = $('#email').val();

        $.get('./api/forgot.php',{email},(res)=>{
            

            $('.showText').text(res)


        })
    }
</script>