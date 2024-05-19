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
									
									$crno=$_POST['crno'];
									mysqli_query($con,"delete from `einv2`");
									mysqli_query($con,"INSERT INTO `einv2`(`inv`,`sez`) VALUES ('$crno','')");
							
							header("location:credit-entry.php?edit=$crno&irn=Yes");
	}

	

?>