<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
}

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>

	<script type="text/javascript">
function ExportToExcel(){
       var htmltable= document.getElementById('tbl1');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    }
</script>
<?php
include('header.php');
include('sidemenu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proforma Invoice Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:#17a2b8;">Home</a></li>
              <li class="breadcrumb-item" >Proforma Invoice Search</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
			<form action="" method="post">
				<div class="row form-group">
			<div class="row form-group">
				<?php 
													
													
													if(isset($_POST['search'])){ $frmdt=$_POST['fromdate']; $todt=$_POST['todate'];$cust=$_POST['cust'];$billno=$_POST['billno']; }else{ $frmdt=""; $todt="";$cust="";$billno="";}
													
													?>
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">From Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="fromdate" name="fromdate" value="<?php echo $frmdt; ?>" placeholder="From Date" class="form-control">
													
                                                    
                                                </div>
                                            </div>
			<div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">To Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="todate" name="todate" value="<?php echo $todt; ?>" placeholder="To Date" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">Customer</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <select class="form-control select2bs4" id="cust" name="cust" style="width: 100%;">												  <?php if(isset($_GET['search'])){?> <option selected="selected"> <?php echo $cust; ?></option> <?php } ?>
                    								<option value="">~~SELECT~~</option>
													 <?php
                     include('config.php');
                       $res= mysqli_query($con,"select * from cust_master order by name asc");
								?>
								
								<?php
                       while($row= mysqli_fetch_array($res))
                       {
                      ?>
                      <option><?php echo $row["name"]; ?></option>
                      <?php
                      }
                      ?>
                    							 </select>
                                                </div>
                                            </div>	
					<div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">Bill No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control select2bs4" id="billno" name="billno" style="width: 100%;">
														<?php if(isset($_GET['search'])){?><option><?php echo $billno; ?></option><?php } ?>
                    								<option value="">~~SELECT~~</option>
													 <?php
                     include('config.php');
                       $res= mysqli_query($con,"select * from pinv_main order by invno asc");
								?>
								
								<?php
                       while($row= mysqli_fetch_array($res))
                       {
                      ?>
                      <option><?php echo $row["invno"]; ?></option>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title">Proforma Invoice Search</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width:120px;">
                   <button type="submit" name="dwnld" id="dwnld" onclick="ExportToExcel()" class="btn btn-default" style="color:rgb(40,73,7);font-weight:bold">Download</button>
					   <!--<button type="button" name="pdf" id="pdf" class="btn btn-default" style="color:#17a2b8;font-weight:bold">To pdf</button>-->
					  
                  </div>
				</div>
              </div>
              <!-- /.card-header -->
				<div class="card-body table-responsive p-0" >
                <table  class="table  table-hover text-nowrap" id="tbl1" border="1">
             
                  <thead>
                    <tr>
                     						    <th>Sr No</th>
                                                <th>Date</th>
												<th>Inv No</th>
                                                <th>Customer</th>
                                                <th>Bill Amt</th>
												<th>CGST</th>
												<th>SGST</th>
												<th>IGST</th>
												<th>Total Amt</th>
												<th>Cust. GSTNo</th>
												<th>Edit</th>
												<th>Delete</th>
												<th>Print Invoice</th>
												<th>Send Mail</th>
												
                    </tr>
                  </thead>
                  <tbody>
                     <?php  include('config.php');
							//ini_set("display_errors",1);
							//error_reporting(E_ALL);
							
							$frmdt="";
							$todt="";
							
							$curdate=date( 'Y-m-d', time () );
							
						
			if(isset($_POST['search'])){ $frmdt=$_POST['fromdate']; $todt=$_POST['todate'];$cust=$_POST['cust']; $billno=$_POST['billno']; }else{ $frmdt=""; $todt="";$cust="";$billno="";}
							
					 $query = mysqli_query($con,"SELECT code FROM cust_master where name='$cust'");
									$results = mysqli_fetch_array($query);
									$cust = $results['code']	; 
					  
				if(($frmdt<>"")&&($todt<>"")&&($cust<>"")&&($billno<>"")){
						$sql="SELECT * FROM `pinv_main` WHERE `dt` between '".$frmdt."' and '".$todt."' and `billto`='$cust' and `invno`='$billno' order by invno desc";
					 }
				elseif(($frmdt<>"")&&($todt<>"")&&($cust<>"")&&($billno=="")){	
								
						$sql="SELECT * FROM `pinv_main` WHERE `dt` between '".$frmdt."' and '".$todt."' and `billto`='$cust' order by invno desc";
				}
					  
	 			elseif(($frmdt<>"")&&($todt<>"")&&($cust=="")&&($billno<>"")){	
								
						$sql="SELECT * FROM `pinv_main` WHERE `dt` between '".$frmdt."' and '".$todt."' and `invno`='$billno' order by invno desc";
				}
					  
				elseif(($frmdt=="")&&($todt=="")&&($cust=="")&&($billno<>"")){	
								
						$sql="SELECT * FROM `pinv_main` WHERE  `invno`='$billno' order by invno desc";
				}
					  				
			  elseif(($frmdt=="")&&($todt=="")&&($cust<>"")&&($billno=="")){	
								
					$sql="SELECT * FROM `pinv_main` WHERE  `billto`='$cust' order by invno desc";
			  }
					  				
							
							else{
							$sql="SELECT *  FROM `pinv_main` order by invno desc ";
							
							}
					  $qry=mysqli_query($con,'select count(*) from `pinv_main`');
					  $rs=mysqli_fetch_array($qry);
					  $count=$rs[0];
					  $count=$count+1;
					 
					  $total='0';
					  //$srno='0';
					  $tbill=0;
					  $tcgst=0;
					  $tsgst=0;
					  $tigst=0;
							if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
								
						while ($row = mysqli_fetch_array($data))
						{ 
							
							$count=$count-1;
							$bto=$row['billto'];
							?>
	
											
											<tr style="color:black">
												
												<td style="color:black">
													
													<?php echo $count; ?>
												</td>
												<td style="color:black">
													<?php 
														$dt=date("d-m-Y",strtotime($row['dt']));
														echo $dt;
													?>
												</td>
												<td style="color:black"><?php echo $row['invno']; ?></td>
												<td style="color:black">
													<?php 
							
												$billto=$row['billto'];
												$query1 = mysqli_query($con,"SELECT name FROM cust_master where code=$billto");
												$results1 = mysqli_fetch_array($query1);
												$cname = $results1['name']	;
												echo $cname; 
													?>
												</td>
												<td style="color:black"><?php echo $row['txamt']; ?></td>
												<td style="color:black"><?php echo $row['cgst']; ?></td>
												<td style="color:black"><?php echo $row['sgst']; ?></td>
												<td style="color:black"><?php echo $row['igst']; ?></td>
												<td style="color:black"><?php echo $row['total']; ?></td>
												
												<td style="color:black">
													<?php
							
														$query=mysqli_query($con,"SELECT * FROM cust_master where `name`='$cname'");
														
														$results = mysqli_fetch_array($query);
														
														$gstno=$results['gstno'];
														echo $gstno;
													?>
												</td>
												<td style="color:black"><a href ="perinvoice-entry.php?edit=<?php echo $row['invno'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="far fa-edit"></i>
									</button></a></td>
								<td style="color:black"><a href="pinvdel.php?delete=<?php echo $row['invno'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                            <i class="far fa-trash-alt"></i>
									</button></a></td>
										<td style="color:black"><a href="perinvoice.php?code=<?php echo $row['invno'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Print">
                                                            <i class="fas fa-print"></i>
									</button></a></td>	
											<td style="color:black"><a href="pinvmail.php?code=<?php echo $row['invno'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Mail">
                                                            <i class="fas fa-envelope"></i>
									</button></a></td>		
											</tr>
					  <?php
							$total=$total+$row['total'];
					  		$tbill=$tbill+$row['txamt'];
							$tcgst=$tcgst+$row['cgst'];
							$tigst=$tigst+$row['igst'];
							$tsgst=$tsgst+$row['sgst'];
					  ?>
					  <?php  }} ?>
					  <tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td><?php echo $tbill; ?></td>
						  <td><?php echo $tcgst; ?></td>
						  <td><?php echo $tsgst; ?></td>
						  <td><?php echo $tigst; ?></td>
						  <td><?php echo $total; ?></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
					  </tr>
											
					  

                  </tbody>
                </table>
				 
				<!--  <a id="back-to-top" href="#" class="btn  back-to-top" style="background-color:#17a2b8;" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>-->
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
      <!--<b>Version</b> 3.1.0-rc-->
    </div>
    <strong>Copyright &copy; <a href="" style="color:rgb(40,73,7)">2023</a>.</strong> All rights reserved.
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
	
</script>
	
	<script>
 /*$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });*/
</script>
</body>
</html>
<?php
if(isset($_GET['flag'])){
$invno=$_GET['flag'];
$qr=mysqli_query($con,"select email,aemail from pinv_main,cust_master where invno='$invno' and billto=cust_master.code");	
$res=mysqli_fetch_array($qr);
$email=$res['email'];
$aemail=$res['aemail'];
$popupmsg="Mail Has Been Sent To : <br>".$email."<br>".$aemail;
	?>
<script>
	$(document).ready(function() {
            		 swal('<?php echo $popupmsg; ?>').then(function() {
 				  			window.location = "http://mksoftservice.com/Naisha/pinvoice-search.php";
							});
				});
      
</script>	
<?php
}
if(isset($_GET['fail'])){

$popupmsg="Mail Not Sent !!";
	?>
<script>
	$(document).ready(function() {
            		 swal('<?php echo $popupmsg; ?>').then(function() {
 				  			window.location = "http://mksoftservice.com/Naisha/invoice-search.php";
							});
				});
      
</script>	
<?php
}
?>
<script>
$( document ).ready(function() {
$("#billing").addClass("menu-open");
$("#billinga").addClass("active");
$("#billinga").css("background-color","rgb(40,73,7)");
$("#reports").addClass("menu-open");
$("#reportsa").addClass("active");
//$("#reportsa").css("background-color","F0F0F0");	
$("#pinvreport").addClass("active");
//$("#pinvreport").css("background-color","F0F0F0");
});

</script>