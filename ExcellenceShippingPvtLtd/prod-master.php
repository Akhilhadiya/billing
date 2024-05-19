<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
}
include('header.php');
include('sidemenu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:rgb(40,73,7);">Home</a></li>
              <li class="breadcrumb-item" >Product Master</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
           
                      <!-- Horizontal Form -->
            <div class="card">
              <div class="card-header"style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title" style="black">Product Master</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="prodinput.php">
				  <?php
											include('config.php');
					$query = mysqli_query($con,"SELECT MAX(code) FROM prod_master");
	$results = mysqli_fetch_array($query);
	$cur_auto_id1 = $results['MAX(code)'] + 1;						
											
		date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d', time () -3600 );
		?>
				  
				  
		<?php
$update= false;
			if(isset($_GET['edit'])){
						
								include('config.php');
								//$con = mysqli_connect($servername,$username,$password,$db);

	$code=$_GET['edit'];
					//echo $code;
	$update= true;
	$qry="SELECT * FROM `prod_master` WHERE `code` = '$code'";
					//echo $qry;
	
	$result=mysqli_query($con,$qry);
	if(count($result==1)){
		
			$row=mysqli_fetch_array($result);
		
				$code1=$row['code'];
				$pname=$row['pname'];
				$hsn=$row['hsn'];
				$cgst=$row['cgst'];
				$sgst=$row['sgst'];
				$igst=$row['igst'];
		}  
					
					
}	  ?>
	
											
                            		  
				  
				  
				  
                <div class="card-body">
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Code</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="code" name="code" value="<?php if(isset($_GET['edit'])){ echo $code1;} else{ echo $cur_auto_id1;} ?>" placeholder="code" class="form-control" readonly>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="pname" name="pname" value="<?php if(isset($_GET['edit'])){echo $pname;} ?>" placeholder="Product Name" class="form-control" required>
                                                    
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>HSN</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hsn" name="hsn" value="<?php if(isset($_GET['edit'])){echo $hsn;}?>" placeholder="HSN" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>C-GST</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="cgst" name="cgst" value="<?php if(isset($_GET['edit'])){echo $cgst;}?>" placeholder="C-GST" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">S-GST</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="sgst" name="sgst" value="<?php if(isset($_GET['edit'])){echo $sgst;}?>" placeholder="S-GST" class="form-control" readonly>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">I-GST</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="igst" name="igst" value="<?php if(isset($_GET['edit'])){echo $igst;}?>" placeholder="I-GST" class="form-control" readonly>
                                                    
                                                </div>
                                            </div>
					
					
					
			</div>
				 <!-----footer----->
                                <div class="card-footer">
								<?php if($update=="true"): ?>
                                        <button type="submit" name="update" value="Update" class="btn btn-primary">
											Update
										</button>
										<?php else : ?>	
                  <button type="submit" name="save" value="Save" class="btn btn-success">Save</button>
									<?php endif; ?>
                  <a href="logout.php"><button type="button" class="btn btn-danger float-right">Quit</button></a>
                </div>
     
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
		<div class="col-12">
            <div class="card">
              <div class="card-header" style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title" style="black">Product Master Search</h3>

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
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                     						    <th>Code</th>
                                                <th>Product Name</th>
                                                <th>HSN</th>
                                                <th>C-GST</th>
												<th>S-GST</th>
												<th>I-GST</th>
												<th>Edit</th>
												<th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php  include('config.php');
							//ini_set("display_errors",1);
							//error_reporting(E_ALL);
							
							$frmdt="";
							$todt="";
							
							$curdate=date( 'Y-m-d', time () );
							
							$sql="SELECT * FROM `prod_master`";
						
							if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($data))
						{ 
							?>
	
											
											<tr style="color:black">
												<td style="color:black"><?php echo $row[0]; ?></td>
												<td style="color:black"><?php echo $row[1]; ?></td>
												<td style="color:black"><?php echo $row[2]; ?></td>
												<td style="color:black"><?php echo $row[3]; ?></td>
												<td style="color:black"><?php echo $row[4]; ?></td>
												<td style="color:black"><?php echo $row[5]; ?></td>
												<td style="color:black"><a href ="prod-master.php?edit=<?php echo $row['code'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="far fa-edit"></i>
									</button></a></td>
								<td style="color:black"><a href="prodinput.php?delete=<?php echo $row['code'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"  onclick="return confirm('Are you sure you want to delete this entry?')">
                                                            <i class="far fa-trash-alt"></i>
									</button></a></td>
											</tr>
					 
					  <?php  }} ?>
					
											
					  

                  </tbody>
                </table>
				<!--  <a id="back-to-top" href="#" class="btn  back-to-top" style="background-color:#17a2b8" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!--<b>Version</b> 3.1.0-rc-->
    </div>
    <strong>Copyright &copy; 2023 <a href="http://www.mksoftservice.com" style="color:#233971;">M.K.Softservice</a>.</strong> All rights reserved.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
	<script src="../admintemplate/js/jquery.min.js"></script>
	<!--<script src="js/main.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
<script src="../admintemplate/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admintemplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../admintemplate/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../admintemplate/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admintemplate/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
	
<script>
	
$(document).ready(function() {
	$("#other").hide();
	$("#otherlbl").hide();
	});
	$('#oc').blur(function(){
		var oc = $('#oc').val();
	if (oc =='Other'){
		
  $("#other").show();
  $("#otherlbl").show();
	}
  });
	


		$('#cgst').keyup(function(){
			    
				var cgst= $('#cgst').val();
							    
					if(cgst==""){
					cgst=0;
					}
					
				$('#sgst').val(parseFloat(cgst));	
			$('#igst').val(parseFloat(cgst)*parseFloat(2));
			
					});
		$('#rate2').keyup(function(){
			    
				var rate2= $('#rate2').val();
				var qty2= $('#qty2').val();
			    var amt1= $('#amt1').val();
			    var amt2= $('#amt2').val();
					if(rate2==""){
					rate2=0;
					}
					if(qty2==""){
					qty2=0;
					}
					
$('#amt2').val(parseFloat(rate2)*parseFloat(qty2));
			var amt2 = $('#amt2').val();
				$('#tamt').val(parseFloat(amt1)+parseFloat(amt2));
				$('#netamt').val(parseFloat(amt1)+parseFloat(amt2));
					});
		$('#rate3').keyup(function(){
			    
				var rate3= $('#rate3').val();
				var qty3= $('#qty3').val();
			    var amt1= $('#amt1').val();
			    var amt2= $('#amt2').val();
				var amt3= $('#amt3').val();
					if(rate3==""){
					rate3=0;
					}
					if(qty3==""){
					qty3=0;
					}
					
$('#amt3').val(parseFloat(rate3)*parseFloat(qty3));
			var amt3 = $('#amt3').val();
				$('#tamt').val(parseFloat(amt1)+parseFloat(amt2)+parseFloat(amt3));
				$('#netamt').val(parseFloat(amt1)+parseFloat(amt2));
					});

		$('#rate4').keyup(function(){
			    
				var rate4= $('#rate4').val();
				var qty4= $('#qty4').val();
			    var amt1= $('#amt1').val();
			    var amt2= $('#amt2').val();
				var amt3= $('#amt3').val();
				var amt4= $('#amt4').val();
					if(rate4==""){
					rate4=0;
					}
					if(qty4==""){
					qty4=0;
					}
					
$('#amt4').val(parseFloat(rate4)*parseFloat(qty4));
			var amt4 = $('#amt4').val();
				$('#tamt').val(parseFloat(amt1)+parseFloat(amt2)+parseFloat(amt3)+parseFloat(amt4));
				$('#netamt').val(parseFloat(amt1)+parseFloat(amt2));
					});
$('#rate5').keyup(function(){
			    
				var rate5= $('#rate5').val();
				var qty5= $('#qty5').val();
			    var amt1= $('#amt1').val();
			    var amt2= $('#amt2').val();
				var amt3= $('#amt3').val();
				var amt4= $('#amt4').val();
				var amt5= $('#amt5').val();
					if(rate5==""){
					rate5=0;
					}
					if(qty5==""){
					qty5=0;
					}
					
$('#amt5').val(parseFloat(rate5)*parseFloat(qty5));
			var amt5 = $('#amt5').val();
				$('#tamt').val(parseFloat(amt1)+parseFloat(amt2)+parseFloat(amt3)+parseFloat(amt4)+parseFloat(amt5));
				$('#netamt').val(parseFloat(amt1)+parseFloat(amt2));
					});
$('#adv').keyup(function(){
			    
				var tamt= $('#tamt').val();
				var adv= $('#adv').val();
			    
					if(tamt==""){
					tamt=0;
					}
					if(adv==""){
					adv=0;
					}
					
$('#netamt').val(parseFloat(tamt)-parseFloat(adv));
			
				
					});
$('#disc').keyup(function(){
			    
				var tamt= $('#tamt').val();
	var adv= $('#adv').val();
				var disc= $('#disc').val();
			    
					if(adv==""){
					adv=0;
					}
					if(disc==""){
					disc=0;
					}
					
$('#netamt').val(parseFloat(tamt)-parseFloat(disc)-parseFloat(adv));
			
				
					});

	</script>
<script>
$( document ).ready(function() {
$("#billing").addClass("menu-open");
$("#billinga").addClass("active");
$("#billinga").css("background-color","rgb(40,73,7)");
$("#msts").addClass("menu-open");
$("#mstsa").addClass("active");
$("#mstsa").css("background-color","F0F0F0");		
$("#prodmst").addClass("active");
$("#prodmst").css("background-color","F0F0F0");
});

</script>
</body>
</html>
