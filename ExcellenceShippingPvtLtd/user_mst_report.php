<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
	include('config.php');
}

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jagwani Shipping | Container Sheet Report</title>

<!-- DataTables -->
  <link rel="stylesheet" href="../admintemplate/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../admintemplate/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../admintemplate/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admintemplate/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admintemplate/dist/css/adminlte.min.css">
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
  <!-- Jquery JS-->
    <script src="../admintemplate/vendor/jquery-3.2.1.min.js"></script>
	<!-- Theme style -->
  <link rel="stylesheet" href="../admintemplate/dist/css/adminlte.min.css">
	
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<!----------SWEETALERT--------->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'> 
	<script src="../admintemplate/plugins/select2/js/select2.full.min.js"></script>
	<!-- Bootstrap CSS-->
    <link href="../admintemplate/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- DataTables  & Plugins -->
<script src="../admintemplate/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admintemplate/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../admintemplate/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../admintemplate/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../admintemplate/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../admintemplate/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../admintemplate/plugins/jszip/jszip.min.js"></script>
<script src="../admintemplate/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../admintemplate/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../admintemplate/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../admintemplate/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../admintemplate/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<!----------------------------->

	<style>
	.des{
	border:1px solid black;
		width:300px;
		margin-top:10px;
	}
	#searchResult{
 list-style: none;
 padding: 0px;
 width: 100%;
 position: relative;
 margin: 0;
}

#searchResult li{
 background:  #BDACAC;
 padding: 10px;
 font-size:13px;
	
}

#searchResult li:nth-child(even){
 background:  #BDACAC;
letter-spacing: 1px;
}

#searchResult li:hover{
 cursor: pointer;
}
	#searchResult2{
 list-style: none;
 padding: 0px;
 width: 100%;
 position: relative;
 margin: 0;
}

#searchResult2 li{
 background:  #BDACAC;
 padding: 10px;
 font-size:13px;
	
}

#searchResult2 li:nth-child(even){
 background:  #BDACAC;
letter-spacing: 1px;
}

#searchResult2 li:hover{
 cursor: pointer;
}
	#searchResult3{
 list-style: none;
 padding: 0px;
 width: 100%;
 position: relative;
 margin: 0;
}

#searchResult3 li{
 background:  #BDACAC;
 padding: 10px;
 font-size:13px;
	
}

#searchResult3 li:nth-child(even){
 background:  #BDACAC;
letter-spacing: 1px;
}

#searchResult3 li:hover{
 cursor: pointer;
}
	#searchResult4{
 list-style: none;
 padding: 0px;
 width: 100%;
 position: relative;
 margin: 0;
}

#searchResult4 li{
 background:  #BDACAC;
 padding: 10px;
 font-size:13px;
	
}

#searchResult4 li:nth-child(even){
 background:  #BDACAC;
letter-spacing: 1px;
}

#searchResult4 li:hover{
 cursor: pointer;
}
	#searchResult5{
 list-style: none;
 padding: 0px;
 width: 100%;
 position: relative;
 margin: 0;
}

#searchResult5 li{
 background:  #BDACAC;
 padding: 10px;
 font-size:13px;
	
}

#searchResult5 li:nth-child(even){
 background:  #BDACAC;
letter-spacing: 1px;
}

#searchResult5 li:hover{
 cursor: pointer;
}

	</style>

	
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
			<h3 style="color:white;padding-top:5px;font-weight:bold">Jagwani Shipping</h3>
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

 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
	<img src="dist/img/nep2.jpg" style="height:170px;width:230px" alt="AdminLTE Logo" >
      <!--<img src="dist/img/clogo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <!--<span class="brand-text font-weight-light">SMS ORDER</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->
       <div class="info">
          <a href="#" class="d-block" style="font-size:20px;font-weight:bold">Welcome To <?php echo $username; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
           
          </li>
          
			<!--for main billing -->
			<li class="nav-item">
				<a href="#" class="nav-link active" style="background-color:#17a2b8" >
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Billing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<!--for billing-->	<ul class="nav nav-treeview">
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Masters
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cust-master.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="prod-master.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Master</p>
                </a>
              </li>
				<?php if(($type=="admin")||($type=="master")){ ?>
				 <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Creation</p>
                </a>
              </li>
				<?php } ?>
               </ul>
          </li>
          
          <li class="nav-item menu-open">
            <a href="" class="nav-link active" >
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Entries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item active">
                <a href="invoice-entry.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Entry</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="credit-entry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Note Entry</p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="advreceipt.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advance Receipt Entry</p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="annexure.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Annexure Entry</p>
                </a>
              </li>
			  </ul>
          </li>
			<?php if(($type=="admin")||($type=="master")){ ?>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="invoice-search.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Entry Search</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="credit-search.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Note Search</p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="advreceiptsearch.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advance Receipt Search</p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="debtors.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debtors Report</p>
                </a>
              </li>
				
			  </ul>
          </li>
				<?php } ?>
				</ul>
			</li>
	
<!--for main inventory -->
			<li class="nav-item">
				<a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<ul class="nav nav-treeview">
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Masters
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="line_mst.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Line Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transport_mst.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transporter Master</p>
                </a>
              </li>
				
               </ul>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link" >
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Entries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="gatepass.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gatepass Entry</p>
                </a>
              </li>
				 <li class="nav-item">
            <a href="loadingentry.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Loading Pass Entry
               
              </p>
            </a>
			</li>
			
			  </ul>
          </li>
			
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="gatepass_search.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gatepass Entry Search</p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="container_sheet.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Container Sheet Report</p>
                </a>
              </li> 
				<li class="nav-item">
            <a href="loadingreport.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Loading Pass Report
               
              </p>
            </a>
			</li>
			  </ul>
          </li>	
				</ul>
			</li> 
<!--for main expense -->
			<li class="nav-item">
				<a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<ul class="nav nav-treeview">
			<?php if(($type=="admin")||($type=="master")){ ?>
			<!--<li class="nav-item">
            <a href="adexpreport.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Admin Report
               
              </p>
            </a>
			</li>-->
			<?php } ?>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Direct Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="directexp.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dexpreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
				
				
               </ul>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link" >
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Indirect Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="indirectexp.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry</p>
                </a>
              </li>
				  <li class="nav-item">
                <a href="idexpreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
			  </ul>
          </li>
			
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Revenue Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="revexp.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry</p>
                </a>
              </li>
				  <li class="nav-item">
                <a href="revexpreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li> 
			  </ul>
          </li>
		
				</ul>
			</li> 
         	
			<?php if(($type=="admin")||($type=="master")){ ?>
			<!--For Taxation-->
			<li class="nav-item">
				<a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              	Taxation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<ul class="nav nav-treeview">
			
			<li class="nav-item">
            <a href="gstr1.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               GSTR1 Report
               
              </p>
            </a>
			</li>
			
		  </ul>
			</li>
			<?php } ?>
			<!--For Line Report-->
			<li class="nav-item">
				<a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              	Line Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<ul class="nav nav-treeview">
			
			<li class="nav-item">
            <a href="dailyreport.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Daily Line Report
               
              </p>
            </a>
			</li>
			<li class="nav-item">
            <a href="cont-status.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Container Status Update
               
              </p>
            </a>
			</li>
			<li class="nav-item">
            <a href="cont-status-report.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Container Status Report
               
              </p>
            </a>
			</li>
		  </ul>
			</li>
			<!--for main hr -->
		<li class="nav-item">
				<a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              	HR Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<ul class="nav nav-treeview">
			
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Salary
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Masters
					 <i class="fas fa-angle-left right"></i> 
					</p>
                </a>
				  <ul class="nav nav-treeview">
				  <li class="nav-item">
                <a href="desig_mst.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation Master</p>
                </a>
              </li>
					 <li class="nav-item">
                <a href="dept_mst.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department Master</p>
                </a>
              </li>
					<li class="nav-item">
                <a href="bank_mst.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Master</p>
                </a>
              </li>  
					<li class="nav-item">
                <a href="emp_mst.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employer Master</p>
                </a>
              </li>    
				  </ul>
				</li>
			   </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Entries
					 <i class="fas fa-angle-left right"></i> 
					</p>
                </a>
				  <ul class="nav nav-treeview">
				  <li class="nav-item">
                <a href="dattend.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance Entry</p>
                </a>
              </li>
				    <li class="nav-item">
                <a href="salary-sheet.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Sheet</p>
                </a>
              </li>
				  </ul>
				</li>
			   </ul>
 <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Reports
					 <i class="fas fa-angle-left right"></i> 
					</p>
                </a>
				  <ul class="nav nav-treeview">
				  <li class="nav-item">
                <a href="dattendreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance Report</p>
                </a>
              </li>
				     <li class="nav-item">
                <a href="mattendreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Attendance Report</p>
                </a>
              </li>
					<li class="nav-item">
                <a href="salary-report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Sheet Report</p>
                </a>
              </li>  
				  </ul>
				</li>
			   </ul>
				
				
               </ul>
          </li>
          
           <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
                
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Container Sheet Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:#007cbc">Home</a></li>
              <li class="breadcrumb-item" >Container Sheet Report</li>
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
			<?php if(isset($_POST['search'])){$line=$_POST['line'];$invno=$_POST['invno'];$party=$_POST['party'];$contno=$_POST['contno'];}else{$line="";$invno="";$party="";$contno="";}?>
					<div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">Line</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <select class="form-control select2" id="line" name="line" style="width: 100%;">												  <?php if(isset($_GET['search'])){?> <option selected="selected"> <?php echo $line; ?></option> <?php } ?>
                    								<option value="">~~SELECT~~</option>
													 <?php
                     include('config.php');
                       $res= mysqli_query($con,"select * from line_mst order by `line name` asc");
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
                                                <div class="col col-md-6">
                                                    <label for="hf-password" class=" form-control-label">Party Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="select2" id="party" name="party" style="width: 100%;">
														<?php if(isset($_GET['search'])){?><option><?php echo $party; ?></option><?php } ?>
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
                                                    <label for="hf-password" class=" form-control-label">Invoice Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="select2" id="invno" name="invno" style="width: 100%;">
														<?php if(isset($_GET['search'])){?><option><?php echo $invno; ?></option><?php } ?>
                    								<option value="">~~SELECT~~</option>
													 <?php
                     include('config.php');
                       $res= mysqli_query($con,"select * from inv_main order by invno asc");
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
                                                <div class="col col-md-7">
                                                    <label for="hf-password" class=" form-control-label">Container Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="select2" id="contno" name="contno" style="width: 100%;">
														<?php if(isset($_GET['search'])){?><option><?php echo $contno; ?></option><?php } ?>
                    								<option value="">~~SELECT~~</option>
													 <?php
                     include('config.php');
                       $res= mysqli_query($con,"select distinct contno from stk_ac order by contno asc");
								?>
								
								<?php
                       while($row= mysqli_fetch_array($res))
                       {
                      ?>
                      <option><?php echo $row["contno"]; ?></option>
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
      
		<div class="col-md-12">
            <div class="card">
              <div class="card-header" style="margin-bottom:10px">
				  <h3 class="card-title"><b>Container Sheet Report</b></h3>
				  <div class="card-tools">
                  <div class="input-group input-group-sm" style="width:120px;">
                   <button type="submit" name="dwnld" id="dwnld" onclick="ExportToExcel()" class="btn btn-default" style="color:#17a2b8;font-weight:bold">Download</button>
					   <!--<button type="button" name="pdf" id="pdf" class="btn btn-default" style="color:#17a2b8;font-weight:bold">To pdf</button>-->
					  
                  </div>
				</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-bordered text-nowrap table-striped" id="example1">
                  <thead>
                    <tr>
                     						    <th>Sr No</th>
                                                <th>Container No</th>
												<th>Size</th>
                                                <th>Vessel</th>
                                                <th>Line</th>
												<th>In Date</th>
												<th>Invoice No</th>
												<th>Party Name</th>
												<th>Out Date</th>
												<th>Days</th>
												
                    </tr>
                  </thead>
                  <tbody>
                                         <?php  include('config.php');
							//ini_set("display_errors",1);
							//error_reporting(E_ALL);
							
							$frmdt="";
							$todt="";
							
							$curdate=date( 'd-m-Y', time () );
							
						
			if(isset($_POST['search'])){$line=$_POST['line'];$party=$_POST['party'];$invno=$_POST['invno'];$contno=$_POST['contno'];}else{$line="";$party="";$invno="";$contno="";}
					  
									$qry1=mysqli_query($con,"select code from line_mst where `line name`='$line'");
									$row=mysqli_fetch_array($qry1);
									$lcode=$row['code'];
									$qry2=mysqli_query($con,"select code from cust_master where `name`='$party'");
									$row2=mysqli_fetch_array($qry2);
									$pcode=$row2['code'];
					  
				if(($line<>"")&&($party=="")){
						$sql="SELECT * FROM `stk_ac` WHERE `line`='$lcode' and `less`=0";
					 }
					 elseif(($line<>"")&&($party<>"")){
					  $sql="SELECT * FROM `stk_ac`,`annexure`,`inv_main` where inv_main.invno=annexure.invno and stk_ac.contno=annexure.contno and  inv_main.billto=$pcode and `less`=0 and stk_ac.line='$lcode'";
					 }
					  elseif(($invno<>"")&&($party<>"")){
					  $sql="SELECT * FROM `stk_ac`,`annexure`,`inv_main` where inv_main.invno=annexure.invno and stk_ac.contno=annexure.contno and annexure.invno='$invno' and inv_main.billto=$pcode and `less`=0";
					  
					  }
					  elseif(($invno<>"")&&($party=="")){
					 $sql="SELECT * FROM `stk_ac`,`annexure` where stk_ac.contno=annexure.contno and annexure.invno='$invno' and `less`=0";
					 }
					  elseif(($party<>"")&&($invno=="")){
					  $sql="SELECT * FROM `stk_ac`,`annexure`,`inv_main` where inv_main.invno=annexure.invno and stk_ac.contno=annexure.contno and  inv_main.billto=$pcode and `less`=0";
					  }
					  elseif(($contno<>"")&&($invno=="")&&($party=="")){
					  $sql="SELECT * FROM `stk_ac`,`annexure`,`inv_main` where inv_main.invno=annexure.invno and stk_ac.contno=annexure.contno and  stk_ac.contno='$contno' and `less`=0";
					  }
					else{
							$sql="SELECT *  FROM `stk_ac` where `less`=0";
							
							}
					 $srno=0;
					 //echo $sql;
							if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
								
						while ($row = mysqli_fetch_array($data))
						{ 
							
							$srno=$srno+1;
							
							?>
	
											
											<tr style="color:black">
												
												<td style="color:black"><?php echo $srno; ?></td>
												<td style="color:black"><?php echo $row['contno'];$contno=$row['contno']; ?></td>
												
												<td style="color:black">
													<?php 
													$qr1=mysqli_query($con,"select cont1,cont2,size1,size2 from gatepass where cont1='$contno' or cont2='$contno'");
													$rs1=mysqli_fetch_array($qr1);
													$cont1=$rs1[0];
													$cont2=$rs1[1];
													if($cont1==$contno){
													$size=$rs1[2];
														echo $size;
													}else{
													$size=$rs1[3];
														echo $size;
													}
													?>
													</td>
												<td style="color:black">
													<?php echo $row['vessel']; ?>
												</td>
												<td style="color:black"><?php 
							
												$line=$row['line'];
												$query1 = mysqli_query($con,"SELECT `line name` FROM line_mst where code=$line");
												$results1 = mysqli_fetch_array($query1);
												$line = $results1['line name']	;
												echo $line; 
													?></td>
												<td style="color:black"><?php 
														//$dt=$row['1'];
														$dt=date("d-m-Y",strtotime($row[1]));
														echo $dt;
													?></td>
												
												<td><?php
													$qr=mysqli_query($con,"select invno from annexure where contno='$contno'");
													$rs=mysqli_fetch_array($qr);
													$invno=$rs[0];
							echo $invno;
													?></td>
												<td>
												<?php $qr2=mysqli_query($con,"select billto from inv_main where invno='$invno'");
													$res=mysqli_fetch_array($qr2);
													$billto=$res[0];
													$qr3=mysqli_query($con,"select name from cust_master where code='$billto'");
													$res3=mysqli_fetch_array($qr3);
													$cname=$res3[0];
													echo $cname;
													?>
												</td>
												<td><?php
													$qr=mysqli_query($con,"select outdt from annexure where contno='$contno'");
													$rs=mysqli_fetch_array($qr);
													$outdt=$rs[0];
													if(($outdt=='0000-00-00')){
														
													echo '00-00-0000';
													}else{
													$outdt=date("d-m-Y",strtotime($outdt));
														if($outdt=='01-01-1970'){
														echo '00-00-0000';
														}else{
														echo $outdt;}}
													?></td>
												<td>
													<?php
													$curdate=date('Y-m-d',time());
													//$outdt="00-00-0000";
													if((!empty((int)$outdt))||($outdt<>'01-01-1970')){
													$date1=date_create($outdt);
													}
													if((empty((int)$outdt))||($outdt=='01-01-1970')){
													$date1=date_create($curdate);
													}
													$date2=date_create($dt);
													
													$diff=date_diff($date1,$date2);

													echo $diff->format("%a");
													?>
												</td>
											</tr>
					  
					  
					  <?php }}?>
                  </tbody>
                </table>
				  <a id="back-to-top" href="#" class="btn  back-to-top" style="background-color:#007cbc" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
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
    <strong>Copyright &copy; 2022 <a href="https://www.mksoftservice.com" style="color:#007cbc">M.K.Softservice</a>.</strong> All rights reserved.
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
		   // $("#billto").select2().on('select2-focus',function(){ $(this).select2('open'); });
		   var tabPressed = false;

    $(document).keydown(function (e) {
        // Listening tab button.
        if (e.which == 9) {
            tabPressed = true;
        }
    });

    $(document).on('focus', '.select2', function() {
        if (tabPressed) {
            tabPressed = false;
            $(this).siblings('select').select2('open');
        }
    });
	  </script>

	   <script src="../admintemplate/plugins/select2/js/select2.full.min.js"></script>
	  <script>
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
	})
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })  
			
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
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
  });
</script>
	<script>
$( document ).ready(function() {
$("#masters").addClass("menu-open");
$("#mastera").addClass("active");
$("#mastera").css("background-color","#004466");
$("#umst").addClass("active");
$("#umst").css("background-color","#006699");
});
</script>

</body>
</html>
