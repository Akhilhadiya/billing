<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
	include('config.php');
}
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include('header.php');
include('sidemenu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <!--<div class="content-wrapper" style="background-image:url('jsimg/jslogo.png');background-repeat:no-repeat;background-size:100% 100%">-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div>
		  </div><br>
		  <?php
		  	$q1=mysqli_query($con,"select count(*) from inv_main");
		  	$r1=mysqli_fetch_array($q1);
		  	$ttlinv=$r1[0];
		  	$q2=mysqli_query($con,"select count(*) from forexinv_main");
		  	$r2=mysqli_fetch_array($q2);
		  	$ttlfinv=$r2[0];
		  	$q3=mysqli_query($con,"select count(*) from credit_main");
		  	$r3=mysqli_fetch_array($q3);
		  	$ttlcrn=$r3[0];
		  ?>
			 <div class="row">
      <!-- ./col -->
          <div class="col-lg-3 col-8">
            <!-- small box -->
            <div class="small-box bg-warning" style="height:163px;background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
              <div class="inner">
                <h3><?php echo $ttlinv; ?></h3>

                <p>Total Invoice</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i></div>
            
              <a href="invoice-search.php" class="small-box-footer" style="margin-top: 20px;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-8">
            <!-- small box -->
            <div class="small-box bg-warning" style="height:163px;background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
              <div class="inner">
                <h3><?php echo $ttlfinv; ?></h3>

                <p>Total Forex Invoice </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="forexinv-search.php" class="small-box-footer" style="margin-top: 20px;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-8">
            <!-- small box -->
            <div class="small-box bg-warning" style="height:163px;background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
              <div class="inner">
                <h3><?php echo $ttlcrn; ?></h3>

                <p>Total Credit Note</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="credit-search.php" class="small-box-footer" style="margin-top: 20px;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
      <!-- ./col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="http://www.mksoftservice.com" style="color:#233971;">M.K.Softservice</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
$( document ).ready(function() {
$("#index").addClass("menu-open");
$("#indexa").addClass("active");
$("#indexa").css("background-color","rgb(40,73,7)");
});
</script>	
</body>
</html>
