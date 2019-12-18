<?php

include_once('conn.php');


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

  <title>KIK Lanka | Temp Calc</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--searchable drop down dependencies-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
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
      <img src="dist/img/KIK_Logo.png" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KIK Lanka</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">[User name place holder]</a>
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
                Calculations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calculator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Save</p>
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
            <h1 class="m-0 text-dark">Calculation Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calculation Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">   
    <form>

<table class="table" >
<tbody>
      <tr>
        <td>Rated Current(A)</td>
        <td>  <div class="col-xs-6" >
       <!-- <select class='selectpicker' id="rc" data-live-search="true" onchange="drop(this.value)">-->
       <select class='form-control' id="rc" onchange="drop(this.value)">
          <?php
            $stmt = $conn->query("SELECT DISTINCT rated_current FROM busbars ORDER BY rated_current ASC");
              while ($row = $stmt->fetch_assoc()):
                    $rc = $row['rated_current'];?>
                    <option value="<?php echo $rc?>" data-tokens="<?php echo $rc?>"><?php echo $rc?></option>
              <?php endwhile;?>

              </select>
            </div>
        </td>
        <td>Bus bar size</td>
        <td><div class="col-xs-6" >
                <select class='form-control' id="bus" onchange="busdrop(this.value)">
                <option value="">-- select one -- </option>
                </select>
            </div>
        </td>
      </tr>
     
    </tbody>
</table>

<table class="table">
<thead class="thead-dark">
<tr>
    <th colspan="5">200</th>
</tr>
      <tr class="danger">
        <td>30K / 3P</td>
        <td>30K / 3P+N</td>
        <td>70K</td>
        <td>70K / 3P+N</td>
        <td>Cu weight</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input class="form-control input-sm" id="200303p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="200303pn" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="200703p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="200703pn" type="text" disabled></td>
        <td><input class="form-control input-sm" id="200cu" type="text"  disabled></td>
      </tr>
     
    </tbody>
  </table>


<table class="table">
<thead class="thead-dark">
<tr>
    <th colspan="5">1000</th>
</tr>
      <tr class="danger">
        <td>30K / 3P</td>
        <td>30K / 3P+N</td>
        <td>70K</td>
        <td>70K / 3P+N</td>
        <td>Cu weight</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input class="form-control input-sm" id="1000303p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000303pn" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000703p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000703pn" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000cu" type="text"  disabled></td>
      </tr>
     
    </tbody>
  </table>



<table class="table">
<tbody>
<tr>
    <td>Select K rating</td>
<td>
      <div class="col-xs-6">
  <select class="form-control" id="krating" onchange="buslencalc()">
    <option value="30K / 3P">30K / 3P</option>
    <option value="30K / 3P+N">30K / 3P+N</option>
    <option value="70K / 3P">70K / 3P</option>
    <option value="30K / 3P+N">30K / 3P+N</option>
  </select>
  </td>
  <td>
  Bus Bar Length
  </td>
  <td>
  <div class="col-xs-6">
    <input class="form-control input-sm" id="bblen" type="text" placeholder="Bus bar length" onkeyup="buslencalc()">
  </td>
  <td>
  Total
  </td>
  <td>
  <div class="col-xs-6">
    <input class="form-control input-sm" id="bbtotal" type="text" placeholder="total" disabled>
  </td>
</tr>
</table>
</form>
<button type="button" class="btn btn-success" onclick="tableload()">Add</button>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table" id="rcsumm">
    <thead class="thead-dark">
      <tr>
        <th>Rated Current</th>
        <th>Busbar Size</th>
        <th>K Rating</th>
        <th>Busbar Length</th>
        <th>W/1M</th>
        <th>Total</th>
        <th>Option</th>


      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>
              </div>
              <b><span id="total_sum_value"></span></b>
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
    <strong>Copyright &copy; 2019 <a href="https://kikglobal.com/">kikglobal</a>.</strong> All rights reserved.
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
</body>

<script>
    function drop(rc){ //rated current dropdown
  //$("#bus").append(new Option("option text", "value"));
  //alert(rc);
  document.getElementById("bus").options.length = 0;
  $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            rcdrop_option: rc
            },
          dataType:'json',
          success: function drop (response) {
            $("#bus").append(new Option('0', '0'));
            for (i = 0; i < response.length; i++) {
             $("#bus").append(new Option(response[i], response[i]));

          }
          }
        });
}

function busdrop(val){ // bus dropdown menu
  $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            busdrop_option: val
            },
          dataType:'json',
          success: function drop (response) {
            $('#200303p').val(response['30k3p']);
            $('#200303pn').val(response['30k3p+n']);
            $('#200703p').val(response['70k3p']);
            $('#200703pn').val(response['70k3p+n']);
            $('#200cu').val(response['200cu']);
            $('#1000303p').val(response['100030k3p']);
            $('#1000303pn').val(response['100030k3p+n']);
            $('#1000703p').val(response['100070k3p']);
            $('#1000703pn').val(response['100070k3p+n']);
          }
        });
}

function buslencalc(){ // weight over bus bar calculation

  var krating=document.getElementById('krating').value;
  var ttp=document.getElementById('1000303p').value;
  var ttpn=document.getElementById('1000303pn').value;
  var stp=document.getElementById('1000703p').value;
  var stpn=document.getElementById('1000703pn').value;
  var bblen=document.getElementById('bblen').value;
  
  switch(krating) {
  case "30K / 3P":
    var tot = bblen*ttp;
    document.getElementById('bbtotal').value=tot;
    break;
  case "30K / 3P+N":
    var tot = bblen*ttpn;
    document.getElementById('bbtotal').value=tot;
    break;
  case "70K / 3P":
    var tot = bblen*stp;
    document.getElementById('bbtotal').value=tot;
    break;
  
  case "30K / 3P+N":

  var tot = bblen*stpn;
    document.getElementById('bbtotal').value=tot;
    break;

  default:
    alert("Try again");
}

}

function tableload(){

  var rc = $('#rc').val();
  var bbsize = $('#bus').val();
  var krate = $('#krating').val();
  var bblen = $('#bblen').val();
  var bbtotal = $('#bbtotal').val();
  var w1m = (bbtotal/bblen);

  var newrow = '<tr><td>' + rc + '</td><td>' + bbsize + '</td><td>' + krate + '</td><td>' + bblen + '</td><td>' + w1m + '</td><td>' + bbtotal + '</td><td><button type="button" class="btn btn-danger">Delete</button></td></tr>';
  $('#rcsumm tr:last').after(newrow);
  calc();

}

function calc(){
            var table = document.getElementById("rcsumm"), sumVal = 0;
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[5].innerHTML);
            }
            document.getElementById("total_sum_value").innerHTML = "Total = " + sumVal;
            console.log(sumVal);
       }

</script>

</html>
