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
$id=$_SESSION['id'];


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
    VALUES ('$id','sample123','$cub','$des','$mat',$wid,$thi,$run,$len,$curr,$ploss)");
    
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
    VALUES ('$id','sample123','$cub','$des','$mat','$type',$size,$run,$len,$curr,$ploss)");
    
    if ($conn->query($sql) === TRUE) {
        $mess =  "New record created successfully";
    } 
    else {
        $mess =  "Error: " . $sql . "<br>" . $conn->error;
    }
    die(json_encode($mess));
}

if (isset($_POST['sg_ins'])){ // switch gear insert 

    $cub = $_POST['sgcub'];     //cubicle number
    $man = $_POST['sgman'];     //manufacturer
    $type = $_POST['sgtype'];   //type
    $range = $_POST['sgrange'];  //range
    $model = $_POST['sgmodel'];   //model
    $qnty = $_POST['sgqnty'];   //quantity
    $rate = $_POST['sgrate'];   //rate
    $ploss = $_POST['sgploss'];   //ploss
    
    $sql = $conn->query("INSERT INTO `sgear`(`userid`, `project_no`, `cubicle`, `man`, `type`, `pcrange`, `model`, `qnty`, `rate`, `ploss`) 
    VALUES ('$id','sample123','$cub','$man','$type','$range','$model',$qnty,$rate,$ploss)");
    
    if ($conn->query($sql) === TRUE) {
        $mess =  "New Record Created Successfully";
    } 
    else {
        $mess =  "Error: " . $sql . "<br>" . $conn->error;
    }
    die(json_encode($mess));
}

if (isset($_POST['ref_req'])){ // reference number request

    $req = $_POST['ref_req'];     //ref reqest
    

    
    $sql = $conn->query("INSERT INTO `sgear`(`userid`, `project_no`, `cubicle`, `man`, `type`, `pcrange`, `model`, `qnty`, `rate`, `ploss`) 
    VALUES ('$id','sample123','$cub','$man','$type','$range','$model',$qnty,$rate,$ploss)");
    
    if ($conn->query($sql) === TRUE) {
        $mess =  "New Record Created Successfully";
    } 
    else {
        $mess =  "Error: " . $sql . "<br>" . $conn->error;
    }
    die(json_encode($mess));
}

?>