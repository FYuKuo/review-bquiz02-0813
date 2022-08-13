<?php
include('./base.php');
switch ($_POST['type']) {
    case 'add':
        $Log->save(['news_id'=>$_POST['id'],'user'=>$_SESSION['user']]);
    break;

    case 're':
        $Log->del(['news_id'=>$_POST['id'],'user'=>$_SESSION['user']]);

    break;
    
}

$data = $News->find($_POST['id']);
$data['good'] = $_POST['good'];
$News->save($data);
?>