<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-10-29
 * Time: 09:01 PM
 */
session_start();
include_once('conn.php');
//$name=$_SESSION['name'];
//$id=$_SESSION['id'];
 
  if (isset($_POST['gmnf'])){ // gear manufacturer

    $sql = $conn->query("SELECT DISTINCT g_mnf FROM gears");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_mnf']);
    }
    die(json_encode($array));
}
  
if (isset($_POST['gtype'])){ // gear type

    $mnf = $_POST['gtype']; // gear manufacturers. 
    $sql = $conn->query("SELECT DISTINCT g_type FROM gears where g_mnf='$mnf'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_type']);
    }
    die(json_encode($array));
}

if (isset($_POST['typeg'])){ // gear ranges

    $type = $_POST['typeg']; // gear types
    $mnf = $_POST['mnfg'];     //gear manufacturers
    $sql = $conn->query("SELECT DISTINCT g_range FROM gears where g_type='$type' and g_mnf='$mnf'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_range']);
    }
    die(json_encode($array));
}

if (isset($_POST['rang'])){ // gear Models

    $range = $_POST['rang'];    //gear ranges
    $type = $_POST['typg'];     // gear types
    $mnf = $_POST['mnfg'];      //gear manufacturers
    $sql = $conn->query("SELECT DISTINCT g_model FROM gears where g_type='$type' and g_mnf='$mnf' and g_range='$range'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_model']);
    }
    die(json_encode($array));
}

if (isset($_POST['rateg'])){ // power rate

    $type=$_POST['typg'];     //power gear type
    $mnfg=$_POST['mnfg'];     // power gear manf
    $range=$_POST['rag'];     //power gear range
    $model=$_POST['modelg'];  // power gear model

    $sql = $conn->query("SELECT g_ratedi FROM gears where g_type='$type' and g_mnf='$mnfg' and g_range='$range' and g_model='$model'");
    $array=array();

    while ($row = $sql->fetch_assoc()) {
        $ratedi=$row['g_ratedi'];

        $array = array(
            'g_ratedi' => $ratedi
        );
    }
    die(json_encode($array));
}

if (isset($_POST['pwr'])){    // power loss

    $type=$_POST['typg'];     // power gear type
    $mnfg=$_POST['mnfg'];     // power gear manf
    $range=$_POST['rag'];     // power gear range
    $model=$_POST['modelg'];  // power gear model
    $pwr=$_POST['pwr'];       // power gear power

    $sql = $conn->query("SELECT g_powerloss FROM gears where g_type='$type' and g_mnf='$mnfg' and g_range='$range' and g_model='$model'");
    $array=array();

    while ($row = $sql->fetch_assoc()) {
        $pwr_less=floatval($row['g_powerloss']);
        $p_loss=($pwr_less*$pwr)*3;
        $p_loss = number_format($p_loss, 2, '.', '');
        $array = array(
            'p_loss' => $p_loss
        );
    }
    die(json_encode($array));
}

if (isset($_POST['c_mat'])){ // cable manufacturer

    $sql = $conn->query("SELECT DISTINCT mat FROM cables");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['mat']);
    }
    die(json_encode($array));
}

if (isset($_POST['pc_type'])){ // cable type selecters

    $mnf = $_POST['pc_type'];
    $sql = $conn->query("SELECT DISTINCT cable_type FROM cables where mat = '$mnf'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['cable_type']);
    }
    die(json_encode($array));
}

if (isset($_POST['pc_cal'])){ // power cable calculation

    $cmnf = $_POST['mat']; //power cable manufacturer
    $ctype = $_POST['ptype']; // power cable type
    $pc_size = $_POST['size']; //power cable size
    $pc_runs = $_POST['runs']; // power cable runs
    $pc_length = $_POST['len']; // power cable length
    $pc_curr = $_POST['curr']; // power cable current

    $sql = $conn->query("SELECT resistance FROM cables where mat = '$cmnf' and cable_type = '$ctype'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {
        $res=$row['resistance'];   
        $sum = (($res/1000)* $pc_length/$pc_size) * pow($pc_curr,2) * $pc_runs;
        $sum = number_format($sum, 2, '.', '');
        $array = array(
            
            'sum' => $sum,
        );
    }
    die(json_encode($array));
}

if (isset($_POST['bb_cal'])){ // bus bar calculation

    $bmat = $_POST['bmat']; // bus bar manufacturer
    $bwid = $_POST['bwid']; // bus bar width
    $bthk = $_POST['bthk']; // bus bar thickness
    $brun = $_POST['brun']; // bus bar runs
    $blen = $_POST['blen']; // bus bar length
    $bcurr = $_POST['bcurr']; // bus bar current

    $array=array();


    switch ($bmat) {
        case "Al":
            $res = 31.61;
            break;
        case "Cu":
            $res = 20.90;
            break;
        case "TinCu":
            $res = 0;
            break;
        default:
            $res = 0;
    }
        
        $sum = ((($res/1000)*$blen)/($bwid*$bthk*$brun)*pow($bcurr,2))*3;
        $sum = number_format($sum, 2, '.', '');
        $array = array(
            
            'sum' => $sum,
        );
    die(json_encode($array));
}

if (isset($_POST['ref_req'])){ // reference number per user project
	$date = date("Ymd");
    //$sql = $conn->query("SELECT SUM(project_id) AS pro FROM `ppanel_orders` where customer_id  = '$id'");
    $sql = $conn->query("SELECT SUM(project_id) AS pro FROM `ppanel_orders` where customer_id  = 6");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        $res=$row['pro'];
	//$ref = "KIK_".$res."_".$date."_".$id;		
        $array = array(
            
            'ref' => $ref,
        );
    }
    die(json_encode($array));
}

if (isset($_POST['fmnf'])){ // fan manufacturer
 
    $sql = $conn->query("SELECT DISTINCT `man` FROM `fan`");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['man']);
    }
    die(json_encode($array));
}

if (isset($_POST['fan_model'])){ // fan models
    
    $man = $_POST['fan_man'];
    $sql = $conn->query("SELECT DISTINCT `model` FROM `fan` where `man` = '$man' ");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['model']);
    }
    die(json_encode($array));
}

if (isset($_POST['fan_airf'])){ // fan air flow
    $f_model = $_POST['fn_model'];     // fan model
    $f_man = $_POST['fn_man'];  // fan manufacturer
    
    $sql = $conn->query("SELECT `af` FROM `fan` WHERE `man`= '$f_man' and `model`='$f_model' ");
    //$sql = $conn->query("SELECT `af` FROM `fan` WHERE `model`='$f_model'");
    $array=array();

    while ($row = $sql->fetch_assoc()) {
        $res=$row['af'];   
        $array = array(     
            'af' => $res,
        );
    }
    die(json_encode($array));
}








?>