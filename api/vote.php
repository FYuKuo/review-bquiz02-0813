<?php
include('./base.php');
$que = $Que->find(['id'=>$_POST['parent_id']]);

$que['sum'] ++;
$Que->save($que);

$opt = $Que->find(['id'=>$_POST['opt']]);

$opt['sum'] ++;
$Que->save($opt);

to("../index.php?do=res&id=".$_POST['parent_id'])
?>