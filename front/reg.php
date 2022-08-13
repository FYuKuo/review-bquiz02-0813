<fieldset class="w-50 aut" style="padding: 30px;">
    <legend>會員註冊</legend>

    <div style="color: red;">
        *請設定您要註冊的帳號及密碼(最長12個字元)
    </div>
    <table class="aut">
        <tr>
            <td class="clo w-50">
                Step1:登入帳號
            </td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo w-50">
                Step2:登入密碼
            </td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo w-50">
                Step3:再次確認密碼
            </td>
            <td>
                <input type="password" name="pwch" id="pwch">
            </td>
        </tr>
        <tr>
            <td class="clo w-50">
                Step4:信箱(忘記密碼時使用)
            </td>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="button" value="註冊" onclick="reg()">
                <input type="button" value="清除" onclick="reset()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reg(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pwch = $('#pwch').val();
        let email = $('#email').val();

        if(acc == '' || pw == '' || pwch == '' || email == ''){

            alert('不可空白');

        }else{
            
            if(pw == pwch){

                $.post('./api/reg.php',{acc,pw,email},(res)=>{

                    if(parseInt(res) == 1){

                        alert('註冊完成，歡迎加入');
                        location.href='?do=login';
                    }else{
                        
                        alert('帳號重複');

                    }
                })

            }else{
                alert('密碼錯誤');

            }
        }
    }




    function reset(){
        $('#acc').val('');
        $('#pw').val('');
        $('#pwch').val('');
        $('#email').val('');
    }
</script>