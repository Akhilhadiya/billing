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
            <h1>User Creation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:rgb(40,73,7);">Home</a></li>
              <li class="breadcrumb-item" >User Creation</li>
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
          <div class="col-md-6">
           
                      <!-- Horizontal Form -->
            <div class="card">
              <div class="card-header"  style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title" style="black">User Creation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="userinput.php">
				  <?php
											include('config.php');
					$query = mysqli_query($con,"SELECT MAX(code) FROM login");
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
	$qry="SELECT * FROM `login` WHERE `code` = '$code'";
					//echo $qry;
	
	$result=mysqli_query($con,$qry);
	if(count($result==1)){
		
			$row=mysqli_fetch_array($result);
		
				$code1=$row['code'];
				$name=$row['name'];
				$pwd=$row['pwd'];
				$type=$row['type'];
				$ip=$row['ip'];
			 }  
	}
				  ?>
	
											
                            		  
				  
				  
				  
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
                                                    <label for="hf-password" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" value="<?php if(isset($_GET['edit'])){echo $name;} ?>" placeholder="Name" class="form-control">
                                                    
                                                </div>
                                            </div>
											
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="pwd" name="pwd" value="<?php if(isset($_GET['edit'])){echo $pwd;}?>" placeholder="Password" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
													<select name="type" id="type" class="form-control" required>
														<?php if(isset($_GET['edit'])){ ?><option><?php echo $type; ?></option><?php } ?>
														<option value="">~~SELECT~~</option>
														<option>admin</option>
														<option>user</option>
														<option>master</option>
														<option>client</option>
														<option>HR</option>
													</select>
                                                   
                                                </div>
                                            </div>
										<div class="row form-group" id="ip">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">IP Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="ip" name="ip" value="<?php if(isset($_GET['edit'])){echo $ip;} ?>" placeholder="IP Address" class="form-control">
                                                    
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
		<div class="col-6">
            <div class="card">
              <div class="card-header" style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title"style="black">User Creation</h3>

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
												<th>Type</th>
												<th>Edit</th>
												<th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php  include('config.php');
							//ini_set("display_errors",1);
							//error_reporting(E_ALL);
							$sql="SELECT * FROM `login`";
						
							if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($data))
						{ 
							?>
	
											
											<tr style="color:black">
												<td style="color:black"><?php echo $row[0]; ?></td>
												<td style="color:black"><?php echo $row[1]; ?></td>
												<td style="color:black"><?php echo $row[3]; ?></td>
												
												<td style="color:black"><a href ="user.php?edit=<?php echo $row['code'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="far fa-edit"></i>
									</button></a></td>
								<td style="color:black"><a href="userinput.php?delete=<?php echo $row['code'];?>"><button class="btn btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"  onclick="return confirm('Are you sure you want to delete this entry?')">
                                                            <i class="far fa-trash-alt"></i>
									</button></a></td>
											</tr>
					 
					  <?php  }} ?>
					
											
					  

                  </tbody>
                </table>
				 <!-- <a id="back-to-top" href="#" class="btn  back-to-top" style="background-color:#17a2b8" role="button" aria-label="Scroll to top">
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
	<script src="js/jquery.min.js"></script>
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
 $(document).ready(function(){
	var type = $('#type').val();
	
	if(type=='user'){
	$('#ip').show();
		
	}
	 else{
   $('#ip').hide();
	 }
});
	$( function() {
$('#type').change(function(){
	
	var type = $('#type').val();
	
	if(type=='user'){
	$('#ip').show();
		
	}
		
 });
	})	
	 </script>
<script>
$( document ).ready(function() {
$("#billing").addClass("menu-open");
$("#billinga").addClass("active");
$("#billinga").css("background-color","rgb(40,73,7)");
$("#msts").addClass("menu-open");
$("#mstsa").addClass("active");
$("#mstsa").css("background-color","F0F0F0");	
$("#uscr").addClass("active");
$("#uscr").css("background-color","F0F0F0");
});

</script>
</body>
</html>
