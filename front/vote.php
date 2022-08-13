<?php
$data = $Que->find($_GET['id']);
$opts = $Que->all(['parent_id'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$data['name']?></legend>
    <form action="./api/vote.php" method="post">
    <?php
    foreach ($opts as $key => $opt) {
    ?>
    <div style="margin: 10px 0;">
        <input type="radio" name="opt" value="<?=$opt['id']?>"><?=$opt['name']?>
    </div>
    <?php
    }
    ?>

    <div class="ct">
        <input type="hidden" name="parent_id" value="<?=$_GET['id']?>">
        <input type="submit" value="我要投票">
    </div>
    </form>
</fieldset>
