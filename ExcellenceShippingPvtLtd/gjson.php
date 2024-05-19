<?php
session_start();
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];}
include ("config.php");

		ini_set("display_errors",1);
		error_reporting(E_ALL);	
								if (!$con)
								{
									
										echo"connection unsuccessfull";}
								else{
									
									$invno=$_POST['invno'];
									$sez=$_POST['sez'];
									mysqli_query($con,"delete from `einv`");
									mysqli_query($con,"INSERT INTO `einv`(`inv`,`sez`) VALUES ('$invno','$sez')");
							
							header("location:invoice-entry.php?edit=$invno&irn=Yes");
	}

	

?>