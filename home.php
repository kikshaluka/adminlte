<?php

session_start();
include_once('conn.php');
if(!isset($_SESSION['name'])){
  header("Location: index.php"); 
}
else{
  $name=$_SESSION['name'];
  $id=$_SESSION['id'];
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                <a href="saved.php" class="nav-link">
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
    <div class="container-fluid">
<div class="page-header">
    <p id ="prefno"></p>    
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

    <div class="form-group">
    <label class="control-label col-sm-3" for="wFactor" data-toggle="tooltip" title="Width Factor">Width Factor:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="wFactor" placeholder="Width Factor" name="wFactor" disabled>
    </div>
    </div>
	
	<div class="form-group">
    <label class="control-label col-sm-3" for="Ae" data-toggle="tooltip" title="Ae">Ae:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Ae" placeholder="Ae" name="Ae" disabled>
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
        <th>Item</th>
        <th>Power Loss</th>
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
  <b><span>Raw Power Loss : </span><span id="total_sum_value"></span></b> <br/><!--total power loss cal-->
  <b><span>	&#916;t0.5 : </span><span id="delta_five"></span></b> <br/><!--delta 0.5-->
  <b><span>&#916;t1 : </span><span id="delta_one"></span></b> <!--delta 1-->
  
<!--switch gear ends-->
</div>
<button type="button" class="btn btn-primary btn-lg" onclick="calcutaion()">Show</button>
<button type="button" class="btn btn-success btn-lg" id="view_btn" onclick="save_gen()" disabled>Add</button>
<button type="button" class="btn btn-success btn-lg" >Print</button>
<button type="button" class="btn btn-danger btn-lg" onclick="datains()" >Save project</button>
<button type="button" class="btn btn-danger btn-lg" onclick="viewdis()" >Test</button>
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
      Heat Rise calculator
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
 <!--built in functions-->
<script src="dist/js/fun.js"></script>
<script>

// Short-form of `document.ready`
$(function(){ //Hide all the divs on start

    $('[data-toggle="tooltip"]').tooltip(); 
    $("#natural").hide(); 
    $("#forced").hide();
    $("#air").hide();
    $("#larea").prop('disabled', true);

	
});

window.onload = function(){
	order_ref();
};

</script>

</body>
</html>
