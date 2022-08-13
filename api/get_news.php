<?php
include('./base.php');
$rows = $News->all(['sh'=>1,'type'=>$_GET['type']]);

echo json_encode($rows);
?>