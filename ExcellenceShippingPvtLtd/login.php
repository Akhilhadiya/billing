<?php 
session_start();
//echo $_SESSION['uname'];
define('DB_SERVER','dbm.mksoftservice.com');
define('DB_USER','excelsiorschool');
define('DB_PASS' ,'rapy6uzy4');
define('DB_NAME', 'dbserver_excelsiorschool');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	
}
else{
  
 if(isset($_POST['submit']))
	 
 {
	  $name= $_POST['name'];
 	  $pass= $_POST['password'];
	
	 $query= mysqli_query($con,"SELECT `name`,`pwd`,`type`,`ip` From `login` where `name`='$name' and BINARY `pwd`= BINARY '$pass' and type<>'emp'");
	 $num=mysqli_fetch_array($query);
	 $result=sizeof($num);
if($result>0){
	
	$_SESSION['jsname']=$num['name'];
	$_SESSION['jstype']=$num['type'];
	$dbip=$num['ip'];
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if($_POST['year']<>"")
	{
		$_SESSION['jsyear']=$_POST['year'];
			if($num['type']=='user')
			{
					if($dbip==$ip)
					{
						if($_SESSION['jsyear']=='2023-2024')
						{
							header("Location:index.php");
						}
						else
						{	
							echo "<h4>You Can Login Only In Current Year..!!</h4>";
						}
					}
			}
			elseif($num['type']=='client')
			{
				header("Location:index.php");
			}
			else
			{
				header("Location:index.php");
			}
	}
	}
	else{
 			$error="Login Failed!!!";
 			
 		}
 		}
 		
 	
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admintemplate/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admintemplate/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admintemplate/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
   <div class="card-header text-center">
		<a href="" class="h1"><img src="jsimg/exlogo.jpeg" style="height:200px;width:220px"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="color:black">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		  <input type="hidden" name="type" id="type" value="<?php echo $_SESSION['jstype']; ?>">
		  <div class="input-group mb-3">
			 <select class="form-control" name="year" required>
				 <option value="">~~SELECT~~</option>
				<option>2023-2024</option>
		  </select>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-4">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
			<!--<div class="col-6">
            <a href="emplogin.php"><button type="button" class="btn btn-primary btn-block">Employee Login</button></a>
          </div>-->
          <!-- /.col -->
        </div>
      </form>

      
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../admintemplate/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admintemplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admintemplate/dist/js/adminlte.min.js"></script>
</body>
</html>
