<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
	
}
?>
 <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
    <!-- Brand Logo -->
    <!--<a href="" class="brand-link">
		<img src="jsimg/exlogo.jpeg" style="height:170px;width:230px">
      
    </a>-->
<!--<img class="profile-user-img img-fluid img-circle"
                       src="jsimg/exlogo.jpeg"
                       alt="User profile picture" style="height:250px;width:290px">-->
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
			<?php if($type=='HR'){ ?>
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
                               <a href="loanScr.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Entry</p>
                </a>

              </li>
				    <li class="nav-item">
                <a href="salary-sheet.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Sheet1/p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="loanScr.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Entry</p>
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
				  <!--<li class="nav-item">
                <a href="dattendreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance Report</p>
                </a>
              </li>-->
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
			<?php }else{ ?>
          <li class="nav-item" id="index">
            <a href="index.php" class="nav-link" id="indexa">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
           
          </li>
			<!--for main billing -->
			<li class="nav-item" id="billing">
				<a href="#" class="nav-link" id="billinga">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Billing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<!--for billing-->	
		<ul class="nav nav-treeview">
           <li class="nav-item" id="msts">
            <a href="#" class="nav-link" id="mstsa">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Masters
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cust-master.php" class="nav-link" id="custmst">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="prod-master.php" class="nav-link" id="prodmst">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Master</p>
                </a>
              </li>
				<?php if(($type=="admin")||($type=="master")){ ?>
				 <li class="nav-item">
                <a href="user.php" class="nav-link" id="uscr">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Creation</p>
                </a>
              </li>
				<?php } ?>
               </ul>
          </li>
          
          <li class="nav-item" id="entries">
            <a href="" class="nav-link" id="entriesa">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Entries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="invoice-entry.php" class="nav-link" id="inventry">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Entry</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="forexinv-entry.php" class="nav-link" id="frxinventry">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forex Invoice Entry</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="credit-entry.php" class="nav-link" id="crentry">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Note Entry</p>
                </a>
              </li>
				
			  </ul>
          </li>
			<?php if(($type=="admin")||($type=="master")){  ?>
          <li class="nav-item" id="reports">
            <a href="" class="nav-link" id="reportsa">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				 <li class="nav-item">
                <a href="invoice-search.php" class="nav-link" id="invreport">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Entry Search</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="forexinv-search.php" class="nav-link" id="frxinvreport">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forex Invoice Search</p>
                </a>
              </li>
				 <li class="nav-item">
                <a href="credit-search.php" class="nav-link" id="crreport">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Note Search</p>
                </a>
              </li>
				
				
			  </ul>
          </li>
				<?php } ?>
				</ul>
			</li>

			<?php if(($type=="admin")||($type=="master")){ ?>
			<!--For Taxation-->
			<!--<li class="nav-item" id="tax">
				<a href="#" class="nav-link" id="taxa">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              	Taxation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
		<ul class="nav nav-treeview">
			
			<li class="nav-item">
            <a href="gstr1.php" class="nav-link" id="gstr1">
              <i class="nav-icon fas fa-book"></i>
              <p>
               GSTR1 Report
               
              </p>
            </a>
			</li>
			
		  </ul>
			</li>-->
      <?php } ?>
			<?php } ?>
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

