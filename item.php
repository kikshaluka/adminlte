<?php

if (isset($_POST['bbar_shw'])){ // item show

    $pos=$_POST['bbar_shw']; //item show

    $sql = $conn->query("SELECT * FROM `gears` ORDER BY `g_id` ASC");
    $array=array();
        while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row);
    }
    die(json_encode($array));
}


?>