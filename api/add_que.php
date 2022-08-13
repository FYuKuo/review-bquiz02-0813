<?php
include('./base.php');
$Que->save(['name'=>$_POST['name'],'parent_id'=>0,'sum'=>0]);

if(isset($_POST['opts'])){

    $que = $Que->find(['name'=>$_POST['name']]);

    foreach ($_POST['opts'] as $key => $opt) {

        if(!empty($opt)){

            $Que->save(['name'=>$opt,'parent_id'=>$que['id'],'sum'=>0]);
        }
    }
}


?>