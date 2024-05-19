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
            <h1>Customer Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:rgb(40,73,7);">Home</a></li>
              <li class="breadcrumb-item" >Customer Master</li>
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
              <div class="card-header"  style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title" style="black">Customer Master</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="custinput.php">
				  <?php
											include('config.php');
					$query = mysqli_query($con,"SELECT MAX(code) FROM cust_master");
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
	$qry="SELECT * FROM `cust_master` WHERE `code` = '$code'";
					//echo $qry;
	
	$result=mysqli_query($con,$qry);
	if(count($result==1)){
		
			$row=mysqli_fetch_array($result);
		
				$code1=$row['code'];
				$name=$row['name'];
				$adrs=$row['adrs'];
				$city=$row['city'];
				$state=$row['state'];
				$stcode=$row['stcode'];
				$gstno=$row['gstno'];
				$panno=$row['panno'];
				$email=$row['email'];
				$mobile=$row['mobile'];
				$opnbal=$row['opnbal'];
				$aemail=$row['aemail'];
				$wportal=$row['wportal'];
				$pincode=$row['pincode'];
				$oemail=$row['oemail'];
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
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" value="<?php if(isset($_GET['edit'])){echo $name;} ?>" placeholder="Name" class="form-control" required>
                                                    
                                                </div>
                                            </div>
											
											 <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
													<textarea name="adrs" placeholder="Address" class="form-control" required><?php echo $adrs; ?></textarea>
                                                    
                                                    
                                                </div>
                                         </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>City</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="city" name="city" value="<?php if(isset($_GET['edit'])){echo $city;}?>" placeholder="City" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>State</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="state" name="state" value="<?php if(isset($_GET['edit'])){echo $state;}?>" placeholder="State" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>St.Code</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stcode" name="stcode" value="<?php if(isset($_GET['edit'])){echo $stcode;}?>" placeholder="State Code" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>PIN Code</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="pincode" name="pincode" value="<?php if(isset($_GET['edit'])){echo $pincode;}?>" placeholder="PIN Code" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"><span style="color:red;font-weight:bold;margin-right:2px">*</span>GST No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="gstno" name="gstno" value="<?php if(isset($_GET['edit'])){echo $gstno;}?>" placeholder="GST No" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">PAN No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="panno" name="panno" value="<?php if(isset($_GET['edit'])){echo $panno;}?>" placeholder="Pan No" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Email(Operation)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email" name="email" value="<?php if(isset($_GET['edit'])){echo $email;}?>" placeholder="Email" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Email(Account)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="aemail" name="aemail" value="<?php if(isset($_GET['edit'])){echo $aemail;}?>" placeholder="Email" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Email(Other)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="oemail" name="oemail" value="<?php if(isset($_GET['edit'])){echo $oemail;}?>" placeholder="Email" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Mobile</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="mobile" name="mobile" value="<?php if(isset($_GET['edit'])){echo $mobile;}?>" placeholder="Mobile" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Opening Balance</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="opnbal" name="opnbal" value="<?php if(isset($_GET['edit'])){echo $opnbal;}?>" placeholder="Opening Balance" class="form-control">
                                                    
                                                </div>
                                            </div>
					<!--<div class="row form-group">
						<div class="col col-md-3">
							<label>Web Portal Login Option</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="radio" name="wportal" id="yes" value="Yes" <?php if($wportal=='Yes'){echo "checked";} ?>>
							<label for="yes">Yes</label>
							<input type="radio" name="wportal" id="no" value="No" <?php if($wportal=='No'){echo "checked";} ?> style="margin-left:15px">
							<label for="no">No</label>
						</div>
						</div>-->
			</div>
				 <!-----footer----->
                                <div class="card-footer">
								<?php if($update=="true"): ?>
                                        <button type="submit" name="update" value="Update" class="btn btn-primary">
											Update
										</button>
									<!--<button type="submit" name="sendmail" value="Sendmail" class="btn btn-info">
											Send Mail
										</button>-->
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
              <div class="card-header"style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title"style="black">Customer Master Search</h3>

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
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>City</th>
												<th>State</th>
												<th>St.Code</th>
						<th>PIN Code</th>
						<th>GST No</th>
						<th>PAN No</th>
						<th>Email</th>
						<th>Mobile</th>
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
							
							$sql="SELECT * FROM `cust_master`";
						
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
												<td><?php echo $row['pincode']; ?></td>
												<td style="color:black"><?php echo $row[6]; ?></td>
												<td style="color:black"><?php echo $row[7]; ?></td>
												<td style="color:black"><?php echo $row[8]; ?></td>
												<td style="color:black"><?php echo $row[9]; ?></td>
												<td style="color:black"><a href ="cust-master.php?edit=<?php echo $row['code'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="far fa-edit"></i>
									</button></a></td>
								<td style="color:black"><a href="custinput.php?delete=<?php echo $row['code'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"  onclick="return confirm('Are you sure you want to delete this entry?')">
                                                            <i class="far fa-trash-alt"></i>
									</button></a></td>
											</tr>
					 
					  <?php  }} ?>
					
											
					  

                  </tbody>
                </table>
				 
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
	
$('#gstno').blur(function(){
	var gstno = $('#gstno').val();
 	var pan = gstno.substr(2,10);
	$('#panno').val(pan);
});
		$('#rate1').keyup(function(){
			    
				var rate1= $('#rate1').val();
				var qty1= $('#qty1').val();
			    
					if(rate1==""){
					rate1=0;
					}
					if(qty1==""){
					qty1=0;
					}
					
			$('#amt1').val(parseFloat(rate1)*parseFloat(qty1));
			var amt1 = $('#amt1').val();
				$('#tamt').val(parseFloat(amt1));
				$('#netamt').val(parseFloat(amt1));
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
$("#custmst").addClass("active");
$("#custmst").css("background-color","F0F0F0");
});

</script>
<script>
/*$( document ).ready(function() {
$("#entries").addClass("menu-open");
$("#entriesa").addClass("active");
$("#entriesa").css("background-color","#e20010");
$("#permitentry").addClass("active");
});*/
</script>
</body>
</html>
