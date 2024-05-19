<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
$cyear=substr($year,0,4);
$nyear=substr($year,5,4);	
}

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Naisha |Monthwise Inventory Report</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admintemplate/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../admintemplate/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../admintemplate/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../admintemplate/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../admintemplate/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../admintemplate/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../admintemplate/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../admintemplate/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../admintemplate/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../admintemplate/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admintemplate/dist/css/adminlte.min.css">
	<script type="text/javascript">
function ExportToExcel(){
       var htmltable= document.getElementById('tbl1');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    }
</script>
	<script type="text/javascript">
function ExportToExcel2(){
       var htmltable= document.getElementById('tbl2');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    }
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light" style="background-color:#17a2b8">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
<li class="nav-item">
			<h3 style="color:white;padding-top:5px;font-weight:bold">NAISHA EMPTY PARK PVT. LTD.</h3>
		</li>
    </ul>

   
    <!-- Right navbar links -->
	  
    <ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<h4 style="color:white;padding-top:5px;font-weight:bold;text-decoration:underline;"><?php echo $year; ?></h4>
		</li>
           <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
		
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->
<?php include('sidemenu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Monthwise Inventory Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:#17a2b8;">Home</a></li>
              <li class="breadcrumb-item" >Monthwise Inventory Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
			<form action="" method="post">
				
			<div class="row">
					                               <?php if(isset($_POST['search'])){ $month=$_POST['month']; $ship=$_POST['ship'];}else{$month=""; $ship="";}
													
													?>
													
				<div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">Month</label>
                                                </div>
                                                <div class="col-12 col-md-9">

													<select class="form-control" id="month" name="month" style="width: 100%;">												  <?php if($month<>""){?> <option> <?php echo $month; ?></option> <?php } ?>
                    								<option value="">~~SELECT~~</option>
														<option>April <?php echo $cyear; ?></option>
														<option>May <?php echo $cyear; ?></option>
														<option>June <?php echo $cyear; ?></option>
														<option>July <?php echo $cyear; ?></option>
														<option>August <?php echo $cyear; ?></option>
														<option>September <?php echo $cyear; ?></option>
														<option>October <?php echo $cyear; ?></option>
														<option>November <?php echo $cyear; ?></option>
														<option>December <?php echo $cyear; ?></option>
														<option>January <?php echo $nyear; ?></option>
														<option>February <?php echo $nyear; ?></option>
														<option>March <?php echo $nyear; ?></option>
                    							 </select>
                                                    
                                                </div>
                                            </div>
				
			<div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">Shipping Line</label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <select class="form-control select2bs4" id="ship" name="ship" style="width: 100%;">												  <?php if($ship<>""){?> <option selected="selected"> <?php echo $ship; ?></option> <?php } ?>
                    								<option value="">~~SELECT~~</option>
													 <?php
                    include('config.php');
                       $res= mysqli_query($con,"select * from `line_mst` order by `line name` asc");
								?>
								
								<?php
                       while($row= mysqli_fetch_array($res))
                       {
                      ?>
                      <option><?php echo $row["line name"]; ?></option>
                      <?php
                      }
                      ?>
                    							 </select>
                                                </div>
                                            </div>
					
					
			<div class="row form-group">
			<div class="col-md-6" style="margin-left:5px;margin-top:30px">
				<button type="submit" name="search" id="srch" class="btn btn-success">Search</button>
				</div>
			</div>
				</div>
				
			</form>
		  <span style="font-weight:bold;color:black"><?php echo $month;?></span><span style="padding-left:170px;font-weight:bold;color:black"><?php echo $ship; ?></span>
		  
		  <div class="row form-group">
          <div class="col-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Monthly Inventory</h3>
  <div class="card-tools">
                  <div class="input-group input-group-sm" style="width:120px;">
                   <button type="submit" name="dwnld" id="dwnld" onclick="ExportToExcel()" class="btn btn-default" style="color:#17a2b8;font-weight:bold">Download</button>
                  </div>
				</div>
                <!--<div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="tbl1" border="1">
                  <thead>
                    <tr>
												<th>Shipping Line</th>
                     						    <th>Opn.Inv.</th>
                                                <th>In</th>
												
                                                <th>Out</th>
                                                <th>Bal.Inv.</th>
												<th>20FT</th>
												<th>40FT</th>
												
                    </tr>
                  </thead>
                  <tbody>
                     <?php  //include('config.php');
							//ini_set("display_errors",1);
							//error_reporting(E_ALL);
							
							$frmdt="";
							$todt="";
							
							$curdate=date( 'Y-m-d', time () );
							
						
			if(isset($_POST['search'])){ $month=$_POST['month']; $ship=$_POST['ship'];}else{ $month=""; $ship="";}
						$query = mysqli_query($con,"SELECT code FROM `line_mst` where `line name`='$ship'");
									$results = mysqli_fetch_array($query);
									$lcode = $results['code']	;
					  /**Monthwise dates list**/
					  if($month=='April'." ".$cyear){
					  $frmdt=$cyear.'-04-01';
					  $todt=$cyear.'-04-30';
					  }
					  elseif($month=='May'." ".$cyear){
					  $frmdt=$cyear.'-05-01';
					  $todt=$cyear.'-05-31';
					  }
					  elseif($month=='June'." ".$cyear){
					  $frmdt=$cyear.'-06-01';
					  $todt=$cyear.'-06-30';
					  }
					  elseif($month=='July'." ".$cyear){
					  $frmdt=$cyear.'-07-01';
					  $todt=$cyear.'-07-31';
					  }
					  elseif($month=='August'." ".$cyear){
					  $frmdt=$cyear.'-08-01';
					  $todt=$cyear.'-08-30';
					  }
					  elseif($month=='September'." ".$cyear){
					  $frmdt=$cyear.'-09-01';
					  $todt=$cyear.'-09-31';
					  }
					  elseif($month=='October'." ".$cyear){
					  $frmdt=$cyear.'-10-01';
					  $todt=$cyear.'-10-30';
					  }
					  elseif($month=='November'." ".$cyear){
					  $frmdt=$cyear.'-11-01';
					  $todt=$cyear.'-11-30';
					  }
					  elseif($month=='December'." ".$cyear){
					  $frmdt=$cyear.'-12-01';
					  $todt=$cyear.'-12-31';
					  }
					  elseif($month=='January'." ".$nyear){
					  $frmdt=$nyear.'-01-01';
					  $todt=$nyear.'-01-31';
					  }
					  elseif($month=='February'." ".$nyear){
					  $frmdt=$nyear.'-02-01';
					  $todt=$nyear.'-02-28';
					  }
					  elseif($month=='March'." ".$nyear){
					  $frmdt=$nyear.'-03-01';
					  $todt=$nyear.'-03-31';
					  }
					  /****/
					  
					  
					  
					 $opndt= date('Y-m-d', strtotime("-1 day", strtotime($frmdt)));
					 
				if(($month<>"")&&($ship<>"")){
						$sql="SELECT sum(cast(`add` as decimal)-cast(`less` as decimal)) FROM `stk_ac` WHERE `dt`<='$opndt' and `line`='$lcode'";
						//echo $sql;
						$data =mysqli_query($con,$sql);
						$topen=0;
						$tin=0;
						$tout=0;
						$tbal=0;
						$row = mysqli_fetch_array($data);
						 
							$open=$row[0];
								$sql2="SELECT line,sum(cast(`add` as decimal)),sum(cast(`less` as decimal)) FROM `stk_ac` WHERE `dt` between '$frmdt' and '$todt' and `line`='$lcode'";
					
								$data2= mysqli_query($con,$sql2);
								$row2=mysqli_fetch_array($data2);
								$lcode=$row2[0];
								$add=$row2[1];
					
								$less=$row2[2];
								$balance=$open+$add-$less;
					$sql3="select `line name` from line_mst where code='$lcode'";
					$data3=mysqli_query($con,$sql3);
					$row3=mysqli_fetch_array($data3);
					$line=$row3[0];
				
					  $qry1=mysqli_query($con,"select sum(cast(`add` as decimal)-cast(`less` as decimal)) from stk_ac where size='20' and `line`='$lcode'");
	  $res1=mysqli_fetch_array($qry1);
	  $bal20=$res1['0'];
	  
	  $qry2=mysqli_query($con,"select sum(cast(`add` as decimal)-cast(`less` as decimal)) from stk_ac where size='40' and `line`='$lcode'");
	  $res2=mysqli_fetch_array($qry2);
	  $bal40=$res2['0'];
	
										?>	
											<tr style="color:black">
												<td style="color:black"><?php echo $line; ?></td>
												<td style="color:black"><?php echo $open; ?></td>
												<td style="color:black"><?php echo $add; ?></td>
												<td style="color:black"><?php echo $less; ?></td>
												<td style="color:black"><?php echo $balance; ?></td>
												<td style="color:black"><?php echo $bal20; ?></td>
												<td style="color:black"><?php echo $bal40; ?></td>
											</tr>
					 <?php
						$topen=$topen+$open;
						$tin=$tin+$add;
						$tout=$tout+$less;
						$tbal=$tbal+$balance;
					$tbal20=$tbal20+$bal20;
					$tbal40=$tbal40+$bal40;
						?>
					  <tr>
						  <td></td>
						  <td><?php echo $topen; ?></td>
						  <td><?php echo $tin; ?></td>
						  <td><?php echo $tout; ?></td>
						  <td><?php echo $tbal; ?></td>
						  <td><?php echo $tbal20; ?></td>
						  <td><?php echo $tbal40; ?></td>
					  </tr><?php }
					  else{ 
						  $sql="SELECT line,sum(cast(`add` as decimal)),sum(cast(`less` as decimal)) FROM `stk_ac` group by line";
			//echo $sql;
						$data =mysqli_query($con,$sql);
							$tin=0;
							$tout=0;
							$tbal=0;
						while($row = mysqli_fetch_array($data)){
						 	$lcode=$row[0];
							//$open=$row[1];
							$add=$row[1];
							$less=$row[2];
								$balance=$add-$less;
					$sql3="select `line name` from line_mst where code='$lcode'";
					$data3=mysqli_query($con,$sql3);
					$row3=mysqli_fetch_array($data3);
					$line=$row3[0];
				
					   $qry1=mysqli_query($con,"select sum(cast(`add` as decimal)-cast(`less` as decimal)) from stk_ac where size='20' and `line`='$lcode'");
	  $res1=mysqli_fetch_array($qry1);
	  $bal20=$res1['0'];
	  
	  $qry2=mysqli_query($con,"select sum(cast(`add` as decimal)-cast(`less` as decimal)) from stk_ac where size='40' and `line`='$lcode'");
	  $res2=mysqli_fetch_array($qry2);
	  $bal40=$res2['0'];
	
										?>	
											<tr style="color:black">
												<td style="color:black"><?php echo $line; ?></td>
												<td style="color:black"><?php echo $open; ?></td>
												<td style="color:black"><?php echo $add; ?></td>
												<td style="color:black"><?php echo $less; ?></td>
												<td style="color:black"><?php echo $balance; ?></td>
												<td style="color:black"><?php echo $bal20; ?></td>
												<td style="color:black"><?php echo $bal40; ?></td>
											</tr> 
					 
					  <?php
						$tin=$tin+$add;
						$tout=$tout+$less;
						$tbal=$tbal+$balance;
						$tbal20=$tbal20+$bal20;
					$tbal40=$tbal40+$bal40;
						}
						?>
					  <tr>
						  <td></td>
						  <td></td>
						  <td><?php echo $tin; ?></td>
						  <td><?php echo $tout; ?></td>
						  <td><?php echo $tbal; ?></td>
						  <td><?php echo $tbal20; ?></td>
						  <td><?php echo $tbal40; ?></td>
						  
					  </tr>
						<?php } ?> 					
					  

                  </tbody>
                </table>
				  <a id="back-to-top" href="#" class="btn  back-to-top" style="background-color:#17a2b8;" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
		 
		  
		  
		  
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
     <strong>Copyright &copy; 2021 <a href="https://www.mksoftservice.com" style="color:#17a2b8">M.K.Softservice</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../admintemplate/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admintemplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../admintemplate/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../admintemplate/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../admintemplate/plugins/moment/moment.min.js"></script>
<script src="../admintemplate/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../admintemplate/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../admintemplate/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../admintemplate/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../admintemplate/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../admintemplate/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../admintemplate/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../admintemplate/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admintemplate/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
</body>
</html>
