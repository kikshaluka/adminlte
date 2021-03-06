<?php

session_start();
include_once('conn.php');
if(!isset($_SESSION['name'])){
  header("Location: index.php"); 
}
else{
  $name=$_SESSION['name'];
}
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>KIK | Temperature Rise Calculator</title>
  <style>
   /* font{
      font-size: 12px;
    }*/
  </style>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/style.css">
</head>
<style>
    font{
      font-size: 12px;
    }
  </style>


<body class="hold-transition sidebar-mini" onload="startup()">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KIK Lanka</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"> Hi <?php echo "$name"?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Temp calculator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Saved Projects</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Temperature Rise Calculator</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Temperature Rise Calculator</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container">
<div class="page-header">
    <p>Project Reference Number : kik123</p>      
  </div>
<div class="row">
  <div class="col-lg-6">
  <form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-3" for="csys" data-toggle="tooltip" title="Cubicle number">Cubicle Number:</label>
    <div class="col-sm-5">
    <span id="cub_num">1</span>
    </div>
    </div> 

  <div class="form-group">
    <label class="control-label col-sm-3" for="csys" data-toggle="tooltip" title="Enclosure Cooling method">Cooling System:</label>
    <div class="col-sm-5">
        <select class="form-control" id="csys" onchange="selFunction(this.value)">
          <option value="0">--select option--</option>
            <option value="natural">Natural Ventilation</option>
            <option value="forced">Forced Ventilation</option>
        </select>
    </div>
    </div> 

    <div class="form-group row">
    <label class="control-label col-sm-3" for="larea" data-toggle="tooltip" title="Opening to release heat to outside">Louver Area:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="larea" placeholder="Louver Area" name="louver area" value='0'>
      </div>
    <label class="control-label col-sm-2" for="loc" data-toggle="tooltip" title="Height of the place which enclosure is placed from mean sea level">Location: (MASL)</label>
      <div class="col-sm-3">
      <select class="form-control" id="loc" name="loc">
            <option value="0">-- Select Value --</option>
            <option value="0">0</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
            <option value="1500">1500</option>
            <option value="2000">2000</option>
            <option value="2500">2500</option>
            <option value="3000">3000</option>
            <option value="3500">3500</option>    
        </select>
      </div>
  </div>

  <div class="form-group"> <!--Enclosure Type drop down-->
      <label class="control-label col-sm-3" for="etype" data-toggle="tooltip" title="enclosure type according to the opening">Enclosure Type:</label>
      <div class="col-sm-5">
        <select class="form-control" id="etype" name="etype">
            <option value="0">-- Select Value --</option>
            <option value="Free standing panel">Free standing panel</option>
            <option value="Free standing cubicle">Free standing cubicle</option>
            <option value="Wall Mounted">Wall Mounted</option>
        </select>
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="pos" data-toggle="tooltip" title="place where louver area placed">Position:</label>
      <div class="col-sm-5">
        <select class="form-control" id="pos" name="pos">
          <option value="0">0</option>
          <option value="surface">Surface Mounted</option>
          <option value="flush">Flush Mounted</option>
        </select>
    </div>
    </div>

    <div class="panel-group form-group">
    <label class="control-label col-sm-2" for="email">Item:</label>
    <div class="panel panel-primary col-sm-6">
      <div class="panel-heading" data-toggle="tooltip" title="Dimension details of the Enclosure">Dimensions</div>
      <div class="panel-body"> 
      <div class="form-group">
      <label class="control-label col-sm-3" for="dheight" data-toggle="tooltip" title="height of the enclosure">Height:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="dheight" placeholder="Enter Height" name="dheight">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="dwidth" data-toggle="tooltip" title="width of the enclosure">Width:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="dwidth" placeholder="Enter Width" name="dwidth" onkeyup="wfaccal()">
      </div>

    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="ddepth" data-toggle="tooltip" title="Depth of the enclosure">Depth:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="ddepth" placeholder="Enter Depth" name="ddepth">
      </div>
    </div>
    </div>
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="hseparation" data-toggle="tooltip" title="Separations available horizontally inside the enclosure">Horizontal Separation:</label>
      <div class="col-sm-4">
      <select class="form-control" id="hseparation" name="hseparation">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>            
        </select>
      </div>
    </div>

  </form>
</div> 
<!------Left side div ends here--------->


<!---------Right side div starts here--->
  <div class="col-lg-6">
  <form class="form-horizontal">

  <div class="form-group">

  <div class="form-group">
    <label class="control-label col-sm-4" for="atemp" data-toggle="tooltip" title="Starting temprature!" >Ambient Temperature:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="atemp" placeholder="Ambient Temperature" name="atemp" value="35">
    </div>
    </div> 

    <div class="form-group">
    <label class="control-label col-sm-3" for="Dfactor" data-toggle="tooltip" title="Demand factor!">Demand Factor:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Dfactor" placeholder="Demand Factor" name="Dfactor" value="0.85">
    </div>
    </div>



    <div class="form-group">
    <label class="control-label col-sm-3" for="Ttemp" data-toggle="tooltip" title="Maximum tempreture rise of the enclosure">Target Temp:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Ttemp" placeholder="Target Temp" name="Ttemp" value='40'>
    </div>
    </div>


    <div class="panel-group form-group" id="natural">
    <label class="control-label col-sm-2" for="email">Power:</label>
    <div class="panel panel-primary col-sm-10">
      <div class="panel-heading">Natural Ventilation</div>
      <div class="panel-body">
      
        <div class="form-group">
          <label class="control-label col-sm-5" for="Tmaxheight">Temp. of Max Height:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="Tmaxheight" placeholder="Raw Power Loss" name="Tmaxheight">
          </div>
        </div>
    </div>
    </div>
    </div>

    <div class="panel-group form-group" id="forced">
    <label class="control-label col-sm-2" for="email">Fan:</label>
    <div class="panel panel-primary col-sm-10">
      <div class="panel-heading">Forced Ventilation</div>
      <div class="panel-body">
      
        <div class="form-group">
          <label class="control-label col-sm-5" for="FCapacity">Fan Capacity:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="FCapacity" placeholder="FCapacity" name="FCapacity">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="FQty">Fan Qty:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="FQty" placeholder="FQty" name="FQty">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="MaxTemp">Max Temp:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="MaxTemp" placeholder="Max Temp" name="MaxTemp">
          </div>
        </div>
    </div>
    </div>
    </div>

    <div class="panel-group form-group" id="air">
    <label class="control-label col-sm-2" for="email">Power:</label>
    <div class="panel panel-primary col-sm-10">
      <div class="panel-heading">Air Condition</div>
      <div class="panel-body">
      
        <div class="form-group">
          <label class="control-label col-sm-5" for="RPLoss">Raw Power Loss:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="RPLoss" placeholder="Raw Power Loss" name="dheight">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="APLoss">Actual Power Loss:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="APLoss" placeholder="Actual Power Loss" name="dwidth">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="apprxto">Approx. 0.5:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="apprxto" placeholder="Approax. 0.5" name="apprxt">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="apprxt">Approx. t:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="apprxt" placeholder="Approax. t" name="apprxt">
          </div>
        </div>

    </div>
    </div>
    </div>

  </form>
</div>  

  </div>

  <!--bottom div-->
  <div class="col-lg-12">
  <div class="panel panel-primary">
  <div class="panel-heading">Bus bar</div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Material</th>
      <th scope="col">Width (mm)</th>
      <th scope="col">Thinckness (mm)</th>
      <th scope="col">Runs</th>
      <th scope="col">Length (m)</th>
      <th scope="col">Current (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">></th>
      <td>
        <input type="text" class="form-control" id="bbname" placeholder="Bus Bar Name" name="bbname" onkeyup='bbar_cal()'>
      </td>
      <td>
        <select class="form-control" id="bbmaterial" name="bbmaterial" onchange='bbar_cal()'>
              <option value="0">-- Select Value --</option>
              <option value="Al">Aluminium</option>
              <option value="Cu">Copper</option>

          </select>        
      </td>
      <td>
        <input type="number" class="form-control" id="bbwidth" placeholder="Width" name="bbwidth" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bbthick" placeholder="Thickness" name="bbthick" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bbruns" placeholder="Runs" name="bbruns" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bblength" placeholder="Length" name="bblength" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bbcurrent" placeholder="current" name="bbcurrent" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="text" class="form-control" id="bbploss" placeholder="Power Loss" name="bbploss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-primary" id="bbadd" onclick='bbar_s_table()' disabled>Add</button>
      </td>
      

    </tr>
  </tbody>
</table>

<!--bus bar table addition and display-->

<table class="table" id="bbsumm">
    <thead class="thead-dark">
      <tr>
      <th scope="col">Description</th>
      <th scope="col">Material</th>
      <th scope="col">Width (mm)</th>
      <th scope="col">Thinckness (mm)</th>
      <th scope="col">Runs</th>
      <th scope="col">Length (m)</th>
      <th scope="col">Current (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>
  <b><span>Power Loss : </span><span id="bb_sum_value">0</span></b> <!--total power loss cal-->
</div>
<!-- power cables-->

<div class="panel panel-primary">
<div class="panel-heading">Power Cables</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Material</th>
      <th scope="col">Type</th>
      <th scope="col">Size(mm<sup>2</sup>)</th>
      <th scope="col">Runs</th>
      <th scope="col">Length (m)</th>
      <th scope="col">Current (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">></th>
      <td>
        <input type="text" class="form-control" id="pc_name" placeholder="Cable Name" name="pc_name" onkeyup='pcable_cal()'>
      </td>
      <td>
        <select class="form-control" id="pc_mat" name="pc_mat" onchange="pctype_load(this.value)">
              <option value="0">-- Select Value --</option>
          </select>        
      </td>
      <td>
      <select class="form-control" id="pc_type" name="pc_type" onchange='pcable_cal();'>
              <option value="0">-- Select Value --</option>
          </select>
      </td>
      <td>
        <input type="number" class="form-control" id="pc_size" placeholder="Size" name="pc_size" onkeyup='pcable_cal()'>
      </td>
      <td>

      <select class="form-control" id="pc_runs" name="pc_runs" onchange='pcable_cal();'>
              <option value="0">-- Select Value --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
          </select>
      </td>
      <td>
        <input type="number" class="form-control" id="pc_length" placeholder="Length" name="pc_length" onkeyup='pcable_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="pc_current" placeholder="current" name="pc_current" onkeyup='pcable_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="pc_ploss" placeholder="Power Loss" name="pc_ploss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-primary" id="pcadd" onclick='pcable_s_table()' disabled>Add</button>
      </td>
      

    </tr>
  </tbody>
</table>

<!-- power cable separate table load-->
<table class="table" id="pcsumm">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Description</th>
        <th scope="col">Material</th>
        <th scope="col">Type</th>
        <th scope="col">Size(mm<sup>2</sup>)</th>
        <th scope="col">Runs</th>
        <th scope="col">Length (m)</th>
        <th scope="col">Current (A)</th>
        <th scope="col">Power Loss (W)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>
  <b><span>Power Loss : </span><span id="pc_sum_value">0</span></b> <!--total power loss cal-->
</div>

<!--power cables ends here-->

<!--switch gear-->
<div class="panel panel-primary">
  <div class="panel-heading">Switch Gear</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Manufacturer</th>
      <th scope="col">Type</th>
      <th scope="col">Range</th>
      <th scope="col">Model</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rating (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">></th>
      <td>Switch gear</td>
      <td>
        <select class="form-control" id="gmnf" name="gmnf" onchange='gtype_load(this.value)'>
        <option value="0">-- select one -- </option>

          </select>        
      </td>
      <td>
      <select class="form-control" id="gtype" name="gtype" onchange='grange_load(this.value)'>
        <option value="0">-- select one -- </option>
      </select> 
      </td>
      <td>
      <select class="form-control" id="grange" name="grange" onchange='gmodel_load(this.value)'>
        <option value="0">-- select one -- </option>
      </select> 
      </td>
      <td>
      <select class="form-control" id="gmodel" name="gmodel" onchange='grate_view()' >
        <option value="0">-- select one -- </option>
      </select> 
      </td>
      <td>
        <input type="number" class="form-control" id="g_qty" placeholder="Quantity" name="dwidth" onkeyup='pwrloss(this.value); return isNumberKey(event,this);'>
      </td>
      <td>
        <input type="text" class="form-control" placeholder="Rating"  name="g_power" id='g_power' disabled>
      </td>
      <td>
        <input type="text" class="form-control" placeholder="Power Loss" id="pwrloss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-primary" id='sgadd' onclick='sgear_s_table()' disabled>Add</button>
      </td>
      

    </tr>
  </tbody>
</table>

<!--switch gear separate table load-->

<table class="table" id="sgsumm">
    <thead class="thead-dark">
      <tr>
      <th scope="col">Manufacturer</th>
      <th scope="col">Type</th>
      <th scope="col">Range</th>
      <th scope="col">Model</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rating (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>
  <b><span>Power Loss : </span><span id="sg_sum_value">0</span></b> <!--total power loss cal-->
<!--switch gear separate table load-->
</div>



<!--custom switch gear addition-->

<!--switch gear-->
<div class="panel panel-primary">
  <div class="panel-heading">Custom Switch Gear</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Manufacturer</th>
      <th scope="col">Model</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rating (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">></th>
      <td>Switch gear</td>
      <td>
        <input type='text' class="form-control" id="cusmnf" name="gmnf" placeholder='Manufacturer' onkeyup="csgear_add_dis()">      
      </td>
      <td>
      <input type='text' class="form-control" id="cusmodel" name="gmodel" placeholder='Model Name' onkeyup="csgear_add_dis()" >
      </td>
      <td>
        <input type="number" class="form-control" id="cus_qty" placeholder="Quantity" name="g_qty" onkeyup="csgear_add_dis()">
      </td>
      <td>
        <input type="number" class="form-control" placeholder="Rating"  name="g_power" id='cusg_power' onkeyup="csgear_add_dis()">
      </td>
      <td>
        <input type="number" class="form-control" placeholder="Power Loss" id="cuspwrloss" onkeyup="csgear_add_dis()">
      </td>
      <td>
        <button type="button" class="btn btn-primary" id='csgadd' onclick='csgear_s_table()' disabled>Add</button>
      </td>
    </tr>
  </tbody>
</table>

<!--switch gear separate table load-->

<table class="table" id="csgsumm">
    <thead class="thead-dark">
      <tr>
      <th scope="col">Manufacturer</th>
      <th scope="col">Model</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rating (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>
  <b><span>Power Loss : </span><span id="c_sg_sum_value">0</span></b> <!--total power loss cal-->
<!--switch gear separate table load-->
</div>
<!--custom sg ends here-->

<!--rated current summery-->
<table class="table" id="totplosssumm">
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>Power Loss</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>Busbar</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Power Cable</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Switch Gear</td>
        <td>0</td>
      </tr>
      <tr>
        <td>Custom Switch Gear</td>
        <td>0</td>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>
  <b><span>Raw Power Loss : </span><span id="total_sum_value"></span></b> <!--total power loss cal-->
  
<!--switch gear ends-->
</div>
<button type="button" class="btn btn-primary btn-lg" onclick="calcutaion()">Send</button>
<button type="button" class="btn btn-success btn-lg" onclick="save_gen()">View</button>
<button type="button" class="btn btn-success btn-lg" >Print</button>
<button type="button" class="btn btn-danger btn-lg" onclick="datains()" >Test</button>
  <!--ends here-->
    <br/><br/><br/><br/>
    <!--power loss summery-->
<table class="table" id="plosssumm">
    <thead class="thead-dark">
      <tr>
        <th>Cubicle Number</th>
        <th>Type</th>
        <th>Name</th>
        <th>Power Loss</th>
      </tr>
    </thead>
    <tbody> 
    </tbody>
  </table>



</div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2010-2019 <a href="#">KIK Lanka</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>

// Short-form of `document.ready`
$(function(){ //Hide all the divs on start

    $('[data-toggle="tooltip"]').tooltip(); 
    $("#natural").hide(); 
    $("#forced").hide();
    $("#air").hide();
    $("#larea").prop('disabled', true);
});


// Position Type change according Enclosure Type
let prices = {"Free standing panel":[{value:"Seperated",desc:"seperated"},{value:"Wall attached",desc:"Wall attached"}],
              "Free standing cubicle":[{value:"First / Last Separated",desc:"First / Last Separated"},{value:"First / Last Wall Attached",desc:"First / Last Wall Attached"},{value:"Central Seperated",desc:"Central Seperated"},{value:"Central Wall Attached",desc:"Central Wall Attached"}],
              "Wall Mounted":[{value:"Surface Mounted",desc:"Surface Mounted"},{value:"Flush Mounted",desc:"Flush Mounted"}]}
  document.getElementsByName('etype')[0].addEventListener('change', function(e) {
  document.getElementsByName('pos')[0].innerHTML = prices[this.value].reduce((acc, elem) => `${acc}<option value="${elem.value}">${elem.desc}</option>`, "");
});

function myFunction(one,two,three) { // Div selection to hide
  var x = document.getElementById(one);
  var y = document.getElementById(two);
  var z = document.getElementById(three);
   if (x.style.display === "none" ) {
    if(one=='natural'){
      $("#larea").prop('disabled', false);
    }
    else{
      $("#larea").prop('disabled', true);
    }
    y.style.display = "none";
    z.style.display = "none";
    x.style.display = "block";
  }} 

  function selFunction(name) { // //Div box selection function
  var selection=name;
  switch(selection) {
  case 'natural':
    myFunction('natural','forced','air');
    break;
  case 'forced':
    myFunction('forced','natural','air');
    break;
  case 'air':
    myFunction('air','forced','natural');
    break;
  default:
    alert("Select a valid option")
} 
  
} 

function calcutaion(){  //Ae Calculation

  var position = document.getElementById('pos').value;
  var height = document.getElementById('dheight').value;
  var width = document.getElementById('dwidth').value;
  var depth = document.getElementById('ddepth').value;
  var wFactor = document.getElementById('wFactor').value;

  if(position=="0"||height==""||width==""||depth==""){
    alert("Height, width, depth need to be filled");
  }
  else{
  // here comes dimension calculation
  var top =((width/wFactor)*depth)/(1000*1000);
  var bnf = ((width/wFactor)*height)/(1000*1000);
  var sides = (depth*height) / (1000*1000);
  $.ajax({
          type: 'POST',
          url: 'cal.php',
          data:
          {
            pos: position,
            top: top,
            bknfr: bnf,
            lfnrg: sides
          },
          dataType:'json',
          success: function calcutaion (response) {
            document.getElementById('Ae').value = response['Ae'].toFixed(2);
            ef_cooling();
          }
        });
        ef_cooling();

  }
}

function wfaccal(){ //width factor calculation
  var width = parseInt(document.getElementById('dwidth').value);
  var wfac=Math.floor(width/1500);
  if((width%1500)>0){wfac+=1;}
    document.getElementById('wFactor').value=wfac;
  }
  

  function gtype_load(val){ // switch gear type drop down depend on mnf

    sgear_add_dis(); // switch gear add button disable

    document.getElementById("gtype").options.length = 0;
    document.getElementById("grange").options.length = 0;
    document.getElementById("gmodel").options.length = 0;


    $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            gtype: val
            },
          dataType:'json',
          success: function gtype_load (response) {
            $("#gtype").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#gtype").append(new Option(response[i], response[i]));

          }
            
          }
        });
}

function startup(){   //page onload functions are included here.
  gmnf_load();        //switch gear manufacturer loader
  pcmaterial_load();  //power cable material loader
}

function gmnf_load(){ //gear manufacturers load - startup

  sgear_add_dis(); // switch gear add button disable

  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            gmnf: "ok"
            },
          dataType:'json',
          success: function gmnf_load (response) {
            for (i = 0; i < response.length; i++) {
             $("#gmnf").append(new Option(response[i], response[i]));

          }
            
          }
        });
}

function grange_load(val){ //gear range loader

  sgear_add_dis(); // switch gear add button disable

  document.getElementById("grange").options.length = 0;
  document.getElementById("gmodel").options.length = 0;
  var gmnf = document.getElementById("gmnf").value;
  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            typeg: val,
            mnfg: gmnf
          },
          dataType:'json',
          success: function grange_load (response) {
            $("#grange").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#grange").append(new Option(response[i], response[i]));

          }
            
          }
        });
}

function gmodel_load(val){ //gear range loader

  sgear_add_dis(); // switch gear add button disable

  document.getElementById("gmodel").options.length = 0;
  var mnfg = document.getElementById("gmnf").value;
  var typeg = document.getElementById("gtype").value;
  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            typg: typeg,
            mnfg: mnfg,
            rang: val
            },
          dataType:'json',
          success: function gmodel_load (response) {
            $("#gmodel").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#gmodel").append(new Option(response[i], response[i]));

          }
            
          }
        });
}


function grate_view(){ //gear current rate view

  sgear_add_dis(); // switch gear add button disable

  var mnfg = document.getElementById("gmnf").value;
  var typeg = document.getElementById("gtype").value;
  var rangeg = document.getElementById("grange").value;
  var modelg = document.getElementById("gmodel").value;
  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            typg: typeg,
            mnfg: mnfg,
            rag: rangeg,
            rateg:"ok",
            modelg:modelg
            },
          dataType:'json',
          success: function grate_view (response) {
            //alert(response["power"]);
            document.getElementById("g_power").value=response["g_ratedi"];
          }
        });
}

function pwrloss(val){ //power gear power loss calculation 

  sgear_add_dis(); // switch gear add button disable

  var mnfg = document.getElementById("gmnf").value;
  var typeg = document.getElementById("gtype").value;
  var rangeg = document.getElementById("grange").value;
  var modelg = document.getElementById("gmodel").value;

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            pwr: val,
            typg: typeg,
            mnfg: mnfg,
            rag: rangeg,
            modelg: modelg
          },
          dataType:'json',
          success: function pwrloss (response) {
            document.getElementById("pwrloss").value = response["p_loss"];
            
          }
        });
}

function pcmaterial_load(){ // cable material loader - startup

  /* 
  var pc_size = document.getElementById("pc_size").value = '';
  var pc_runs = document.getElementById("pc_runs").value = '';
  var pc_length = document.getElementById("pc_length").value = '';
  var pc_current = document.getElementById("pc_current").value = '';
  var pc_ploss = document.getElementById("pc_ploss").value = '';
  */
  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            c_mat: "ok"
            },
          dataType:'json',
          success: function pcmaterial_load (response) {
            for (i = 0; i < response.length; i++) {
             $("#pc_mat").append(new Option(response[i], response[i]));
          
          }
          pcable_cal(); // power cable calculations 
          }
        });
}


function pctype_load(val){ // power cable types loader

  pcable_add_dis();
  document.getElementById("pc_type").options.length = 0;


$.ajax({
        type: 'POST',
        url: 'cal-data.php', 
        data:
        {
          pc_type: val
        },
        dataType:'json',
        success: function pctype_load (response) {
          $("#pc_type").append(new Option('--select option--', '0'));
          for (i = 0; i < response.length; i++) {
            $("#pc_type").append(new Option(response[i], response[i]));
        
        }
        pcable_cal(); // power cable calculations 
        }
      });      
}

function pcable_cal(){ // power cable resistance calculator

  pcable_add_dis(); //power cable add button disble

  var pc_mat = document.getElementById("pc_mat").value;
  var pc_type = document.getElementById("pc_type").value;
  var pc_size = document.getElementById("pc_size").value;
  var pc_runs = document.getElementById("pc_runs").value;
  var pc_length = document.getElementById("pc_length").value;
  var pc_current = document.getElementById("pc_current").value;


  if(pc_name=='' || pc_size=='' || pc_runs=='' || pc_length=='' || pc_current==''){
    pc_size = 0;
    pc_runs = 0;
    pc_length = 0;
    pc_current = 0;
  }

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            pc_cal: 'ok',
            mat: pc_mat, // power cable material
            ptype: pc_type, // power cable type
            size: pc_size,  // pc_size
            runs: pc_runs,
            len: pc_length,
            curr: pc_current  
          },
          dataType:'json',
          success: function pcable_cal (response) { 
            document.getElementById("pc_ploss").value=response["sum"];
                     
          }
        });
}

function bbar_cal(){ // bus bar resistance calculator

  //document.getElementById("bbploss").value=0;

  var b_mat = document.getElementById("bbmaterial").value;
  var b_wid = document.getElementById("bbwidth").value;
  var b_thk = document.getElementById("bbthick").value;
  var b_run = document.getElementById("bbruns").value;
  var b_len = document.getElementById("bblength").value;
  var b_curr = document.getElementById("bbcurrent").value;

  bbar_add_dis(); // bus bar add button disable

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            bb_cal: 'ok',
            bmat: b_mat,  //bus bar material
            bwid: b_wid,  //bus bar width
            bthk: b_thk,  //bus bar thickness
            brun: b_run,  //bus bar run
            blen: b_len,  //bus bar length
            bcurr: b_curr //bus bar currency
          },
          dataType:'json',
          success: function bbar_cal (response) { 
            document.getElementById("bbploss").value=response["sum"];        
          }
        });
  }

  function isNumberKey(evt, element) { // Check whether the input is an integer
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
      return false;
    else {
      var len = $(element).val().length;
      var index = $(element).val().indexOf('.');
      if (index > 0 && charCode == 46) {
        return false;
      }
      if (index > 0) {
        var CharAfterdot = (len + 1) - index;
        if (CharAfterdot > 1) { // char after dot is numbers after dot.
          return false;
        }
      }
    }
    return true;
}

function prow(ele){ //  power loss row deletion
  row = ele.parentNode.parentNode.rowIndex;
  document.getElementById("rcsumm").deleteRow(row);
  ploss_calc();
}

 function bbdrow(ele) { //bus bar delete row
  row = ele.parentNode.parentNode.rowIndex;
  document.getElementById("bbsumm").deleteRow(row);
  bbploss_calc();
 }
 
 function pcdrow(ele) { //power cable delete row
  row = ele.parentNode.parentNode.rowIndex;
  document.getElementById("pcsumm").deleteRow(row);
  pcploss_calc();
 }

 function sgdrow(ele) { //switch gear delete row
  row = ele.parentNode.parentNode.rowIndex;
  document.getElementById("sgsumm").deleteRow(row);
  sgploss_calc();
 }
 
 function csgdrow(ele) { // custom switch gear delete row
  row = ele.parentNode.parentNode.rowIndex;
  document.getElementById("csgsumm").deleteRow(row);
  csgploss_calc();
 }

 function bburow(ele){ //bus bar individual table update
  row = ele.parentNode.parentNode.rowIndex;
  var theTbl = document.getElementById('bbsumm');
  document.getElementById('bbname').value = theTbl.rows[row].cells[0].innerHTML;
  document.getElementById('bbmaterial').value = theTbl.rows[row].cells[1].innerHTML;
  document.getElementById('bbwidth').value = theTbl.rows[row].cells[2].innerHTML;
  document.getElementById('bbthick').value = theTbl.rows[row].cells[3].innerHTML;
  document.getElementById('bbruns').value = theTbl.rows[row].cells[4].innerHTML;
  document.getElementById('bblength').value = theTbl.rows[row].cells[5].innerHTML;
  document.getElementById('bbcurrent').value = theTbl.rows[row].cells[6].innerHTML;
  document.getElementById('bbploss').value = theTbl.rows[row].cells[7].innerHTML;
  bbdrow(ele);
 
 }

 function pcurow(ele){ //power cable individual table update
  row = ele.parentNode.parentNode.rowIndex;
  var theTbl = document.getElementById('pcsumm');
  document.getElementById('pc_name').value = theTbl.rows[row].cells[0].innerHTML;
  document.getElementById('pc_mat').value = theTbl.rows[row].cells[1].innerHTML;
  document.getElementById('pc_type').value = theTbl.rows[row].cells[2].innerHTML;
  document.getElementById('pc_size').value = theTbl.rows[row].cells[3].innerHTML;
  document.getElementById('pc_runs').value = theTbl.rows[row].cells[4].innerHTML;
  document.getElementById('pc_length').value = theTbl.rows[row].cells[5].innerHTML;
  document.getElementById('pc_current').value = theTbl.rows[row].cells[6].innerHTML;
  document.getElementById('pc_ploss').value = theTbl.rows[row].cells[7].innerHTML;
  pcdrow(ele);
 }

 function sgurow(ele){ //switchgear individual table update
  row = ele.parentNode.parentNode.rowIndex;
  var theTbl = document.getElementById('sgsumm');
  document.getElementById('gmnf').value = theTbl.rows[row].cells[0].innerHTML;
  document.getElementById('gtype').value = theTbl.rows[row].cells[1].innerHTML;
  document.getElementById('grange').value = theTbl.rows[row].cells[2].innerHTML;
  document.getElementById('gmodel').value = theTbl.rows[row].cells[3].innerHTML;
  document.getElementById('g_qty').value = theTbl.rows[row].cells[4].innerHTML;
  document.getElementById('g_power').value = theTbl.rows[row].cells[5].innerHTML;
  document.getElementById('pwrloss').value = theTbl.rows[row].cells[6].innerHTML;
  sgdrow(ele);
 }

 function csgurow(ele){ //switchgear individual table update
  row = ele.parentNode.parentNode.rowIndex;
  var theTbl = document.getElementById('csgsumm');
  document.getElementById('cusmnf').value = theTbl.rows[row].cells[0].innerHTML;
  document.getElementById('cusmodel').value = theTbl.rows[row].cells[1].innerHTML;
  document.getElementById('cus_qty').value = theTbl.rows[row].cells[2].innerHTML;
  document.getElementById('cusg_power').value = theTbl.rows[row].cells[3].innerHTML;
  document.getElementById('cuspwrloss').value = theTbl.rows[row].cells[4].innerHTML;
  csgdrow(ele);
 }


function bbploss_calc(){ //bus bar power loss calc
  var table = document.getElementById("bbsumm"), sumVal = 0;
    for(var i = 1; i < table.rows.length; i++)
    {
      sumVal = sumVal + parseFloat(table.rows[i].cells[7].innerHTML);
    }
    document.getElementById("bb_sum_value").innerHTML = sumVal.toFixed(2);
    t_ploss_calc();
   
}

function pcploss_calc(){ // power cable power loss
    var table = document.getElementById("pcsumm"), sumVal = 0;
    for(var i = 1; i < table.rows.length; i++)
    {
      sumVal = sumVal + parseFloat(table.rows[i].cells[7].innerHTML);
    }
    document.getElementById("pc_sum_value").innerHTML = sumVal.toFixed(2);
    t_ploss_calc();
}

function sgploss_calc(){ // switch gear power loss
  var table = document.getElementById("sgsumm"), sumVal = 0;
    for(var i = 1; i < table.rows.length; i++)
    {
      sumVal = sumVal + parseFloat(table.rows[i].cells[6].innerHTML);
    }
    document.getElementById("sg_sum_value").innerHTML = sumVal.toFixed(2);
    t_ploss_calc();
}

function csgploss_calc(){ // custom switch gear power loss
  var table = document.getElementById("csgsumm"), sumVal = 0;
    for(var i = 1; i < table.rows.length; i++)
    {
      sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);
    }
    document.getElementById("c_sg_sum_value").innerHTML = sumVal.toFixed(2);
    t_ploss_calc();
}

function t_ploss_calc(){ // total power loss calculation

    bb = document.getElementById("bb_sum_value").innerHTML;
    pc = document.getElementById("pc_sum_value").innerHTML;
    sg = document.getElementById("sg_sum_value").innerHTML;
    csg = document.getElementById("c_sg_sum_value").innerHTML;

  var tot = parseFloat(bb) + parseFloat(pc) + parseFloat(sg) + parseFloat(csg);
  document.getElementById("total_sum_value").innerHTML = tot.toFixed(2);

}

function ploss_calc(){ //sample total power loss calculation
  var table = document.getElementById("rcsumm"), sumVal = 0;
    for(var i = 1; i < table.rows.length; i++)
    {
      sumVal = sumVal + parseFloat(table.rows[i].cells[1].innerHTML);
    }
  document.getElementById("total_sum_value").innerHTML = sumVal;
} 

function sgear_add_dis(){ //swich gear add buton disable
    
    var qtyg = document.getElementById("g_qty").value; //space gear add button
    var mnfg = document.getElementById("gmnf").value;
    var typeg = document.getElementById("gtype").value;
    var rangeg = document.getElementById("grange").value;
    var modelg = document.getElementById("gmodel").value;

      //alert(qtyg);
      if(qtyg!='' && mnfg !='0' && typeg!='0' && rangeg!='0' && modelg!='0'){
        document.getElementById("sgadd").disabled = false; 
      }
      else{
        document.getElementById("sgadd").disabled = true; 
      }
}

function pcable_add_dis(){ //power cable add buton disable
    
    var namep = document.getElementById("pc_name").value;
    var matp = document.getElementById("pc_mat").value;
    var typep = document.getElementById("pc_type").value;
    var sizep = document.getElementById("pc_size").value;
    var runsp = document.getElementById("pc_runs").value;
    var lenp = document.getElementById("pc_length").value;
    var currp = document.getElementById("pc_current").value;

      if(namep!= '' && sizep!='' && runsp != '' && lenp != '' && currp != '' && matp !='0' && typep !='0'){
        document.getElementById("pcadd").disabled = false; 
      }
      else{
        document.getElementById("pcadd").disabled = true; 
      }
}

function bbar_add_dis(){ //bus bar add buton disable
    
    var nameb = document.getElementById("bbname").value; 
    var matb = document.getElementById("bbmaterial").value; 
    var widb = document.getElementById("bbwidth").value;
    var thickb = document.getElementById("bbthick").value;
    var runsb = document.getElementById("bbruns").value;
    var lenb = document.getElementById("bblength").value;
    var currb = document.getElementById("bbcurrent").value;

      if(nameb !='' && widb != '' && thickb != '' && runsb != '' && lenb !='' && currb !='' && matb !='0'){
        document.getElementById("bbadd").disabled = false; 
      }
      else{
        document.getElementById("bbadd").disabled = true; 
      }
}

function csgear_add_dis(){ //custom switch gear disable 

  var csg_ploss = $('#cuspwrloss').val();
  var csg_mnf = $('#cusmnf').val();
  var csg_model = $('#cusmodel').val();
  var csg_range = $('#cus_qty').val();
  var csg_qty = $('#cusg_power').val();

  if(csg_ploss !='' && csg_mnf != '' && csg_model != '' && csg_range != '' && csg_qty !=''){
        document.getElementById("csgadd").disabled = false; 
      }
  else{
        document.getElementById("csgadd").disabled = true; 
      }


}
//bus bar separate table addition

function bbar_s_table(){ //bus bar separate table load

  var bbploss = $('#bbploss').val();
  var bbname = $('#bbname').val();
  var bbmaterial = $('#bbmaterial').val();
  var bbwidth = $('#bbwidth').val();
  var bbthick = $('#bbthick').val();
  var bbruns = $('#bbruns').val();
  var bblength = $('#bblength').val();
  var bbcurrent = $('#bbcurrent').val();
 
  var newrow = '<tr><td>'+bbname+'</td><td>'+bbmaterial+'</td><td>'+bbwidth+'</td><td>'+bbthick+'</td><td>'+bbruns+'</td><td>'+bblength+'</td><td>'+bbcurrent+'</td><td>' + bbploss + '</td><td><button type="button" class="btn btn-danger" onclick="bbdrow(this)">Delete</button><button type="button" class="btn btn-warning" onclick="bburow(this)">Update</button></td></tr>';
  $('#bbsumm tr:last').after(newrow);

  document.getElementById("bbname").value = "";
  document.getElementById("bbwidth").value = "";
  document.getElementById("bbthick").value = "";
  document.getElementById("bbruns").value = "";
  document.getElementById("bblength").value = "";
  document.getElementById("bbcurrent").value = "";
  document.getElementById("bbploss").value = "";
  document.getElementById("bbadd").disabled = true;

  bbploss_calc();
  change_value();

}


function pcable_s_table(){

  var pc_ploss = $('#pc_ploss').val();
  var pc_mat = $('#pc_mat').val();
  var pc_name = $('#pc_name').val();
  var pc_type = $('#pc_type').val();
  var pc_size = $('#pc_size').val();
  var pc_runs = $('#pc_runs').val();
  var pc_length = $('#pc_length').val();
  var pc_current = $('#pc_current').val();
  var newrow = '<tr><td>'+pc_name+'</td><td>'+pc_mat+'</td><td>'+pc_type+'</td><td>'+pc_size+'</td><td>'+pc_runs+'</td><td>'+pc_length+'</td><td>'+pc_current+'</td><td>' + pc_ploss + '</td><td><button type="button" class="btn btn-danger" onclick="pcdrow(this)" >Delete</button><button type="button" class="btn btn-warning" onclick="pcurow(this)">Update</button></td></tr>';
  $('#pcsumm tr:last').after(newrow);

  document.getElementById("pc_name").value = "";
  document.getElementById("pc_size").value = "";
  document.getElementById("pc_runs").value = "";
  document.getElementById("pc_length").value = "";
  document.getElementById("pc_current").value = "";
  document.getElementById("pcadd").disabled = true;

  pcploss_calc()
  change_value();


}

function sgear_s_table(){
  // switch gear separate table load

var sg_ploss = $('#pwrloss').val();
var sg_mnf = $('#gmnf').val();
var sg_type = $('#gtype').val();
var sg_model = $('#gmodel').val();
var sg_range = $('#grange').val();
var sg_qty = $('#g_qty').val();
var sg_rate = $('#g_power').val();
var sg_ploss = $('#pwrloss').val();

document.getElementById("g_qty").value = "";
document.getElementById("sgadd").disabled = true; 


var newrow = '<tr><td>'+ sg_mnf +'</td><td>'+ sg_type +'</td><td>'+ sg_range +'</td><td>'+ sg_model +'</td><td>'+ sg_qty +'</td><td>' + sg_rate + '</td><td>' + sg_ploss + '</td><td><button type="button" class="btn btn-danger" onclick="sgdrow(this)" >Delete</button><button type="button" class="btn btn-warning" onclick="sgurow(this)">Update</button></td></tr>';
$('#sgsumm tr:last').after(newrow);
document.getElementById("g_qty").value = "";
document.getElementById("sgadd").disabled = true; 
sgploss_calc();
change_value();
}


function csgear_s_table(){
  // custom switch gear separate table load

var csg_ploss = $('#cuspwrloss').val();
var csg_mnf = $('#cusmnf').val();
var csg_model = $('#cusmodel').val();
var csg_range = $('#cus_qty').val();
var csg_qty = $('#cusg_power').val();

document.getElementById("cus_qty").value = "";
document.getElementById("csgadd").disabled = true; 


var newrow = '<tr><td>'+ csg_mnf +'</td><td>'+ csg_model +'</td><td>'+ csg_range +'</td><td>'+ csg_qty +'</td><td>'+ csg_ploss + '</td><td><button type="button" class="btn btn-danger" onclick="csgdrow(this)" >Delete</button><button type="button" class="btn btn-warning" onclick="csgurow(this)">Update</button></td></tr>';
$('#csgsumm tr:last').after(newrow);
document.getElementById("cus_qty").value = "";
document.getElementById("cuspwrloss").value = "";
document.getElementById("cusmnf").value = "";
document.getElementById("cusmodel").value = "";
document.getElementById("cus_qty").value = "";
document.getElementById("cusg_power").value = "";

document.getElementById("csgadd").disabled = true; 
csgploss_calc();
change_value();
}


function ef_cooling(){ //t0.5 calculation
        
  var ae = document.getElementById("Ae").value; // ae
  var cs = document.getElementById("csys").value;// cool system
  var height = document.getElementById('dheight').value; // height
  var width = document.getElementById('dwidth').value; // width
  var depth = document.getElementById('ddepth').value; // depth
  var wFactor = document.getElementById('wFactor').value; // width factor
  var pos = document.getElementById('pos').value; // position
  var top = ((width/wFactor)*depth)/(1000*1000); // top dimention
  var hs = document.getElementById("hseparation").value; // horizontal sep
  var Dfactor = document.getElementById("Dfactor").value; // Demand Factor
  var rpwrloss = document.getElementById("total_sum_value").innerHTML; //row power loss
  var larea = document.getElementById("larea").value;
  
  if (ae != '' || cs != ''){ // to find ae or cooling system is blank
  //to send data to T0.5 calculation.
    if(ae > 1.25 && (cs=='forced' || cs=='air')){ 
      
      $.ajax({
          type: 'POST',
          url: 'cal.php',
          data:
          {
            l125wo: '123',
            horz: hs,  //horizontal separation
            po: pos,   //position
            he: height, //height
            wid: width, // width
            wf: wFactor, // width factor
            dp: depth, //depth
            pwrloss: rpwrloss, // row power loss
            Ae: ae, // Ae value 
            dfac: Dfactor // demand factor
          },
          dataType:'json',
          success: function ef_cooling (response) { 
            alert(response["t05"]);           
          }
        });
    }
  else if(ae > 1.25 && (cs=='natural')){
    $.ajax({
          type: 'POST',
          url: 'cal.php',
          data:
          {
            l125w: '123',
            Ae: ae, // Ae value 
            la: larea, //larea
            horz: hs, //horizontal Area
            he: height, //height
            wid: width, // width
            wf: wFactor, // width factor
            dp: depth, //depth
            pwrloss: rpwrloss, // row power loss
            dfac: Dfactor // demand factor

          },
          dataType:'json',
          success: function ef_cooling (response) { 
            alert(response["t05"]);         

          }
        });
  }
  else if(ae < 1.25 && (cs=='natural')){
    $.ajax({
          type: 'POST',
          url: 'cal.php',
          data:
          {
            h125w: '123',
            Ae: ae, // Ae value
            he: height, //height
            wid: width, // width
            wf: wFactor, // width factor
            pwrloss: rpwrloss, // row power loss
            dfac: Dfactor // demand factor 
          },
          dataType:'json',
          success: function ef_cooling (response) { 
            alert(response["t05"]);           
          }
        });
  }
  }
  else{
    alert("Fill the empty boxes");
  }
}

function save_gen(){

  //var row  = document.getElementById("myTable").rows.length;
  var cub = parseFloat(document.getElementById("cub_num").innerHTML);

  var bbtable = document.getElementById("bbsumm");    //bus bar
  var pctable = document.getElementById("pcsumm");    //power cable
  var sgtable = document.getElementById("sgsumm");    //switch gear
  var csgtable = document.getElementById("csgsumm");  //custom switch gear

  for(var i = 1; i < bbtable.rows.length; i++) //for busbar table
  {
    var name = bbtable.rows[i].cells[0].innerHTML;
    var ploss = bbtable.rows[i].cells[7].innerHTML;
    var newrow = '<tr><td>'+ cub +'</td><td>Bus bar</td><td>'+ name +'</td><td>'+ ploss +'</td></tr>';
    $('#plosssumm tr:last').after(newrow);
  }
  
  for(var i = 1; i < pctable.rows.length; i++) //for power cable
  {
    var name = pctable.rows[i].cells[0].innerHTML;
    var ploss = pctable.rows[i].cells[7].innerHTML;
    var newrow = '<tr><td>'+ cub +'</td><td>Power Cable</td><td>'+ name +'</td><td>'+ ploss +'</td></tr>';
    $('#plosssumm tr:last').after(newrow);
  }

  for(var i = 1; i < sgtable.rows.length; i++) //for switch gear
  {
    var name = sgtable.rows[i].cells[0].innerHTML +" "+ sgtable.rows[i].cells[1].innerHTML +" "+ sgtable.rows[i].cells[2].innerHTML +" "+ sgtable.rows[i].cells[3].innerHTML;
    var ploss = sgtable.rows[i].cells[6].innerHTML;
    var newrow = '<tr><td>'+ cub +'</td><td>Switch gear</td><td>'+ name +'</td><td>'+ ploss +'</td></tr>';
    $('#plosssumm tr:last').after(newrow);
  }

  for(var i = 1; i < csgtable.rows.length; i++) //for custom switch gear
  {
    var name = csgtable.rows[i].cells[0].innerHTML +" "+ csgtable.rows[i].cells[1].innerHTML;
    var ploss = csgtable.rows[i].cells[4].innerHTML;
    var newrow = '<tr><td>'+ cub +'</td><td>Switch gear</td><td>'+ name +'</td><td>'+ ploss +'</td></tr>';
    $('#plosssumm tr:last').after(newrow);
  }

    $("#bbsumm").find("tr:gt(0)").remove();
    $("#pcsumm").find("tr:gt(0)").remove();
    $("#sgsumm").find("tr:gt(0)").remove();
    $("#csgsumm").find("tr:gt(0)").remove();

    document.getElementById("bb_sum_value").innerHTML = 0;
    document.getElementById("pc_sum_value").innerHTML = 0;
    document.getElementById("sg_sum_value").innerHTML = 0;
    document.getElementById("c_sg_sum_value").innerHTML = 0;
    document.getElementById("total_sum_value").innerHTML = 0;

    document.getElementById('totplosssumm').rows[parseInt(1,10)].cells[parseInt(1,10)].innerHTML= 0;
  document.getElementById('totplosssumm').rows[parseInt(2,10)].cells[parseInt(1,10)].innerHTML= 0;
  document.getElementById('totplosssumm').rows[parseInt(3,10)].cells[parseInt(1,10)].innerHTML= 0;
  document.getElementById('totplosssumm').rows[parseInt(4,10)].cells[parseInt(1,10)].innerHTML= 0;


    document.getElementById("cub_num").innerHTML = cub+1;


}

function change_value(){
  document.getElementById('totplosssumm').rows[parseInt(1,10)].cells[parseInt(1,10)].innerHTML= document.getElementById("bb_sum_value").innerHTML;
  document.getElementById('totplosssumm').rows[parseInt(2,10)].cells[parseInt(1,10)].innerHTML= document.getElementById("pc_sum_value").innerHTML;
  document.getElementById('totplosssumm').rows[parseInt(3,10)].cells[parseInt(1,10)].innerHTML= document.getElementById("sg_sum_value").innerHTML;
  document.getElementById('totplosssumm').rows[parseInt(4,10)].cells[parseInt(1,10)].innerHTML= document.getElementById("c_sg_sum_value").innerHTML;


}

function bbar_ins(){ // busbar insert to db 

  var bbtable = document.getElementById("bbsumm");    //busbar

  for(var i = 1; i < bbtable.rows.length; i++) //for busbar table
  {
    var cub = document.getElementById("cub_num").innerHTML;
    var des = bbtable.rows[i].cells[0].innerHTML;
    var mat = bbtable.rows[i].cells[1].innerHTML;
    var wid = bbtable.rows[i].cells[2].innerHTML;
    var thi = bbtable.rows[i].cells[3].innerHTML;
    var run = bbtable.rows[i].cells[4].innerHTML;
    var len = bbtable.rows[i].cells[5].innerHTML;
    var curr = bbtable.rows[i].cells[6].innerHTML;
    var ploss = bbtable.rows[i].cells[7].innerHTML;
    $.ajax({
        type: 'POST',
        url: 'cal-insert.php',
        data:
        {
          bb_ins: 'ok',
          bcub: cub, // bus bar cubicle
          bdes: des,    //bus bar description
          bmat: mat,    //bus bar material
          bwid: wid,    //bus bar width
          bthk: thi,    //bus bar thickness
          brun: run,    //bus bar run
          blen: len,    //bus bar length
          bcurr: curr,  //bus bar currenct
          bploss: ploss //bus bar power loss
        },
        dataType:'json',
        success: function bbar_ins (response) { 
          alert("ok");        
        }
      });
  }
}


function pcables_ins(){ // power cables insert to db 

  var pctable = document.getElementById("pcsumm");    //power cable

for(var i = 1; i < pctable.rows.length; i++) //for power cable table
{
  var cub = document.getElementById("cub_num").innerHTML;
  var des = pctable.rows[i].cells[0].innerHTML;
  var mat = pctable.rows[i].cells[1].innerHTML;
  var type = pctable.rows[i].cells[2].innerHTML;
  var size = pctable.rows[i].cells[3].innerHTML;
  var run = pctable.rows[i].cells[4].innerHTML;
  var len = pctable.rows[i].cells[5].innerHTML;
  var curr = pctable.rows[i].cells[6].innerHTML;
  var ploss = pctable.rows[i].cells[7].innerHTML;
  $.ajax({
      type: 'POST',
      url: 'cal-insert.php',
      data:
      {
        pc_ins: 'ok',
        pcub: cub,    //power cable cubicle
        pdes: des,    //power cable description
        pmat: mat,    //power cable material
        ptype: type,    //power cable type
        psize: size,    //power cable size
        prun: run,    //power cable run
        plen: len,    //power cable length
        pcurr: curr,  //power cable currenct
        pploss: ploss //power cable power loss
      },
      dataType:'json',
      success: function pcables_ins (response) { 
        alert("ok");        
      }
    });
}
}


function sgear_ins(){ // switch gear insert to db 

  var sgtable = document.getElementById("sgsumm");    //switch gear

for(var i = 1; i < sgtable.rows.length; i++) //for power cable table
{
var cub = document.getElementById("cub_num").innerHTML;
var des = pctable.rows[i].cells[0].innerHTML;
var mat = pctable.rows[i].cells[1].innerHTML;
var type = pctable.rows[i].cells[2].innerHTML;
var size = pctable.rows[i].cells[3].innerHTML;
var run = pctable.rows[i].cells[4].innerHTML;
var len = pctable.rows[i].cells[5].innerHTML;
var curr = pctable.rows[i].cells[6].innerHTML;
var ploss = pctable.rows[i].cells[7].innerHTML;
$.ajax({
    type: 'post',
    url: 'cal-insert.php',
    data:
    {
      pc_ins: 'ok',
      pcub: cub,    //power cable cubicle
      pdes: des,    //power cable description
      pmat: mat,    //power cable material
      ptype: type,    //power cable type
      psize: size,    //power cable size
      prun: run,    //power cable run
      plen: len,    //power cable length
      pcurr: curr,  //power cable currenct
      pploss: ploss //power cable power loss
    },
    dataType:'json',
    success: function pcables_ins (response) { 
      alert("ok");        
    }
  });
}
}




function datains(){ // database sending function collection
  bbar_ins(); //bus bar insert
  pcables_ins(); // power cable insert

}




</script>

</body>
</html>
