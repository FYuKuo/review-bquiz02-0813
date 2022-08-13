<?php
include('./base.php');
$rows = $News->find($_GET['id']);

echo json_encode($rows);
?>