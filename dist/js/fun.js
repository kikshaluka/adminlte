
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
    if(one=='forced'){
      $("#fan_sel").show();
    }
    else{
      $("#fan_sel").hide();
    }
    y.style.display = "none";
    z.style.display = "none";
    x.style.display = "block";
  }} 

  function selFunction(name) { // Div box selection function
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
  fan_mnf() // fan manufacturer load
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
  act_ploss_calc(tot); // actual power loss.

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
  viewdis();

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

  pcploss_calc();
  change_value();
  viewdis();


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
viewdis();

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
viewdis();
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
  var larea = document.getElementById("larea").value; // louver area
  var ambtemp = document.getElementById("atemp").value; // ambient temp
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
				
			document.getElementById("delta_five").innerHTML = response["t05"].toFixed(2);
			document.getElementById("delta_one").innerHTML = response["t1"].toFixed(2);
			document.getElementById('Tmaxheight').value = ambtemp + response["t1"].toFixed(2);
       
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
			document.getElementById("delta_five").innerHTML = response["t05"].toFixed(2);
			document.getElementById("delta_one").innerHTML = response["t1"].toFixed(2);
			document.getElementById("Tmaxheight").value = ambtemp + response["t1"].toFixed(2);
            alert(response["t05"]);         
            alert(response["t1"]);         

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
		  document.getElementById("delta_five").innerHTML = response["t05"].toFixed(2);
			document.getElementById("delta_one").innerHTML = response["t1"].toFixed(2);
			document.getElementById("Tmaxheight").value = ambtemp + response["t1"].toFixed(2);
            alert(response["t05"]);           
            alert(response["t1"]);           
          }
        });
  }
  }
  else{
    alert("Fill the empty boxes");
  }
}

function save_gen(){
	
	viewdis(); // view button disable
	
	
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
	
	var dfive = document.getElementById("delta_five").innerHTML;
	var newrow = '<tr><td>&#916;t0.5 </td><td>'+ dfive +'</td></tr>';
	$('#plosssumm tr:last').after(newrow);
	
	
	
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

  
  function order_ref(){
  $.ajax({
      type: 'POST',
      url: 'cal-data.php',
      data:
      {
        ref_req: 'y',
      },
      dataType:'json',
      success: function order_ref (response) { 
        //alert(response["ref"]);
		document.getElementById("prefno").innerHTML = "Project No: "+response["ref"];
      }
    });  
}
  
  
function bbar_ins(){ // busbar insert to db 

  var bbtable = document.getElementById("bbsumm");    //busbar

  for(var i = 1; i < bbtable.rows.length; i++) //for busbar table
  {
    var cub = document.getElementById("cub_num").innerHTML;
	var pnum = document.getElementById("prefno").innerHTML;
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
          bploss: ploss, //bus bar power loss
          bbpnum: pnum //project number
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
  var pnum = document.getElementById("prefno").innerHTML;
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
        pploss: ploss, //power cable power loss
		pppnum: pnum     // project number
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
  var pnum = document.getElementById("prefno").innerHTML;
  var man = sgtable.rows[i].cells[0].innerHTML;
  var type = sgtable.rows[i].cells[1].innerHTML;
  var range = sgtable.rows[i].cells[2].innerHTML;
  var model = sgtable.rows[i].cells[3].innerHTML;
  var qnty = sgtable.rows[i].cells[4].innerHTML;
  var rate = sgtable.rows[i].cells[5].innerHTML;
  var ploss = sgtable.rows[i].cells[6].innerHTML;
  $.ajax({
      type: 'POST',
      url: 'cal-insert.php',
      data:
      {
        sg_ins: 'ok',
        sgcub: cub,     //switch gear cubicle
        sgman:man ,     //switch gear description
        sgtype: type,   //switch gear material
        sgrange: range, //switch gear type
        sgmodel: model, //switch gear size
        sgqnty: qnty,   //switch gear run
        sgrate: rate,   //switch gear length
        sgploss: ploss,  //switch gear power loss
		sgpnum: pnum     // project number
      },
      dataType:'json',
      success: function sgear_ins (response) { 
        alert("ok");        
      }
    });
  }
}

function order_ins(){
  
  var pnum = document.getElementById("prefno").innerHTML;
  
  $.ajax({
      type: 'POST',
      url: 'cal-insert.php',
      data:
      {
        or_ins: 'ok',
		orpnum: pnum     // project number
      },
      dataType:'json',
      success: function order_ins (response) { 
        alert("ok"); 
	
      }
    });
  
}


function datains(){ // database sending function collection

  bbar_ins();     //  bus bar insert
  pcables_ins();  //  power cable insert
  sgear_ins();    //  switch gear insert
  order_ins(); 	// order details insert


}

function test(){
	alert("test");
}

function viewdis(){ // view button disable
	var bbar = document.getElementById('totplosssumm').rows[parseInt(1,10)].cells[parseInt(1,10)].innerHTML; // busbar
	var pc = document.getElementById('totplosssumm').rows[parseInt(2,10)].cells[parseInt(1,10)].innerHTML; // power cable
	var sg = document.getElementById('totplosssumm').rows[parseInt(3,10)].cells[parseInt(1,10)].innerHTML; // switch gear
	var csg = document.getElementById('totplosssumm').rows[parseInt(4,10)].cells[parseInt(1,10)].innerHTML; // custom switch gear
	if(bbar > 0 && pc > 0 && sg > 0){
		//alert ("all filled");
		document.getElementById("view_btn").disabled = false; 
	}
	else{
		//alert ("3 need to be filed");
		document.getElementById("view_btn").disabled = true;
	}
}

function act_ploss_calc(rawploss){ // actual power loss calculator

  var Dfac = document.getElementById("Dfactor").value;
  var act_ploss = rawploss*(Dfac**2);
  document.getElementById("act_ploss").innerHTML = act_ploss.toFixed(2);

}

function showFanTable(){ // fan div display
  document.getElementById('table').style.visibility = "visible";
}

function hideFanTable(){ // hide fan div
  document.getElementById('table').style.visibility = "hidden";
}

function fan_mnf(){
  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            fmnf: "ok"
            },
          dataType:'json',
          success: function fan_mnf (response) {
            $("#fanmnf").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#fanmnf").append(new Option(response[i], response[i]));

          }
          }
        });
}

function fan_model(){ // fan models selector per manifacturer

  var man = document.getElementById("fanmnf").value;

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            fan_model: "ok",
            fan_man: man
            },
          dataType:'json',
          success: function fan_mnf (response) {
            document.getElementById("fanmodel").options.length = 0;
            $("#fanmodel").append(new Option('--select model--', '0'));
            for (i = 0; i < response.length; i++) {
              $("#fanmodel").append(new Option(response[i], response[i]));

          }
          }
        });
      }

function af_sel(){ // air flow 
  var fmodel = document.getElementById("fanmodel").value;
  var fmanf = document.getElementById("fanmnf").value;
 
  $.ajax({
    type: 'POST',
    url: 'cal-data.php',
    data:
    {
      fan_airf: "ok",
      fn_model: fmodel,
      fn_man: fmanf
      },
    dataType:'json', 
    success: function af_sel (response) { 
      document.getElementById("fanaf").value = response["af"];
      document.getElementById("fnadd").disabled = false;

    }
  });


}
