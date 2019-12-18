<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-12-17
 * Time: 01:41 PM
 */
session_start();
include('conn.php');
$name=$_SESSION['name'];


if (isset($_POST['bb_ins'])){ // bus bar insert 

    $cub = $_POST['bcub'];   //cubicle number
    $des = $_POST['bdes'];   //description
    $mat = $_POST['bmat'];   //material
    $wid = $_POST['bwid'];   //width
    $thi = $_POST['bthk'];   //thickness
    $run = $_POST['brun'];   //runs
    $len = $_POST['blen'];   //length
    $curr = $_POST['bcurr']; //currency
    $ploss = $_POST['bploss']; //power loss

    $sql = $conn->query("INSERT INTO `bbar`(`userid`, `project_no`, `cubicle`, `des`, `mat`, `wid`, `thi`, `run`, `len`, `curr`, `ploss`) 
    VALUES ('$name','sample123','$cub','$des','$mat',$wid,$thi,$run,$len,$curr,$ploss)");
    
    if ($conn->query($sql) === TRUE) {
        $mess =  "New record created successfully";
    } 
    else {
        $mess =  "Error: " . $sql . "<br>" . $conn->error;
    }
    die(json_encode($mess));
}

if (isset($_POST['pc_ins'])){ // power cable insert 

    $cub = $_POST['pcub'];   //cubicle number
    $des = $_POST['pdes'];   //description
    $mat = $_POST['pmat'];   //material
    $type = $_POST['ptype'];   //type
    $size = $_POST['psize'];   //size
    $run = $_POST['prun'];   //runs
    $len = $_POST['plen'];   //length
    $curr = $_POST['pcurr']; //currenct
    $ploss = $_POST['pploss']; //power loss

    //echo $cub;
    $sql = $conn->query("INSERT INTO `pcable`(`userid`, `project_no`, `cubicle`, `des`, `mat`, `type`, `size`, `run`, `len`, `curr`, `ploss`) 
    VALUES ('$name','sample123','$cub','$des','$mat','$type',$size,$run,$len,$curr,$ploss)");
    
    if ($conn->query($sql) === TRUE) {
        $mess =  "New record created successfully";
    } 
    else {
        $mess =  "Error: " . $sql . "<br>" . $conn->error;
    }
    die(json_encode($mess));
}



?>