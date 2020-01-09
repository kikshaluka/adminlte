<?php
session_start();


?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head>

<!DOCTYPE html>
<body>

<button class="btn btn-primary" onclick="myFunction()">+ Add New Cubicle</button><br/>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
         <h2>Build the cubical</h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="home" aria-selected="true">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="powercable-tab" data-toggle="tab" href="#pcable" role="tab" aria-controls="profile" aria-selected="false">Power Cable</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="busbar-tab" data-toggle="tab" href="#bbar" role="tab" aria-controls="contact" aria-selected="false">Bus Bar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="switch gear-tab" data-toggle="tab" href="#sgear" role="tab" aria-controls="contact" aria-selected="false">Switch Gear</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">..this is general.</div>
  <div class="tab-pane fade" id="pcable" role="tabpanel" aria-labelledby="powercable-tab">. this is power cable..</div>
  <div class="tab-pane fade" id="bbar" role="tabpanel" aria-labelledby="busbar-tab">..this is bus bar..</div>
  <div class="tab-pane fade" id="sgear" role="tabpanel" aria-labelledby="switch gear-tab">..this is switch gear..</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>



</body>

<script>
var num = 1;

function openModal(currentObj) {
  $("#myModal").find(".modal-title").text("Cube " + $(currentObj).attr("id"));
  $("#myModal").modal("show");
}

function myFunction() {
  var btn = document.createElement("BUTTON");
  btn.innerHTML = "Cube " + num;
  btn.className = "sam";
  btn.id = num;
  document.body.appendChild(btn);
  btn.onclick = function() {
    openModal(this);
  }
  num++
}
</script>
<style>

.sam{
    height:150px;
    width:100px;
}

</style>



</html>
