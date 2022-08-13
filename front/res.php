<?php
$data = $Que->find($_GET['id']);
$opts = $Que->all(['parent_id'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$data['name']?></legend>
    <h3><?=$data['name']?></h3>
    <?php
    foreach ($opts as $key => $opt) {
        $num = round(($opt['sum']/$data['sum'])*100,0);
    ?>
    <div class="d-flex w-100 a-center" style="margin: 10px 0;">
        <div style="width: 30%;">
            <?=($key+1).".".$opt['name']?>
        </div>
        <div style="width: 60%;" class="d-flex a-center">
            <div style="width: <?=$num ?>%; background-color: #eee;height: 20px"></div>
            &nbsp;
            <div><?=$opt['sum']?>票(<?=$num?>%)</div>
        </div>
    </div>
    <?php
    }
    ?>

    <div class="ct">
        <input type="button" value="返回" onclick="location.href='?do=que'">
    </div>

</fieldset>