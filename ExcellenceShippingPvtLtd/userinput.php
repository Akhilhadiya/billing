<?php
/*session_start();
if ($_SESSION['uname']==''){header("Location:login.php");}else{
$username=$_SESSION['uname'];}*/
include ("config.php");

	if(isset($_GET['delete'])){
		 
			$code = $_GET['delete'];
			mysqli_query($con,"Delete from login where code = '$code'") ;
			
				header("location: user.php");
}

if($_POST['save']=="Save")
			  {
								ini_set("display_errors",1);
								error_reporting(E_ALL);				

								//echo"connected...";	
	
								if (!$con)
								{
									
										echo"connection unsuccessfull";}
								else{
									
									$code=$_POST['code'];
									$name=$_POST['name'];
									$pwd=$_POST['pwd'];
									$type=$_POST['type'];
									$ip=$_POST['ip'];
									mysqli_query($con,"INSERT INTO `login`(`name`,`pwd`,`type`,`ip`) VALUES ('$name','$pwd','$type','$ip')");
								
								header("location:user.php");
				
			
	}
}


if($_POST['update']=="Update")
{
	//ini_set("display_errors",1);
											//error_reporting(E_ALL);
					 					$code=$_POST['code'];
									$name=$_POST['name'];
									$pwd=$_POST['pwd'];
									$type=$_POST['type'];
									$ip=$_POST['ip'];
				mysqli_query($con,"UPDATE `login` SET `name`='$name',`pwd`='$pwd',`type`='$type',`ip`='$ip' WHERE code='$code'") or die(mysqli_error());
				
				header("location:user.php");

}

					?>
