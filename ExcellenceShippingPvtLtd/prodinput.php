<?php
/*session_start();
if ($_SESSION['uname']==''){header("Location:login.php");}else{
$username=$_SESSION['uname'];}*/
include ("config.php");

	if(isset($_GET['delete'])){
		 
			$code = $_GET['delete'];
			mysqli_query($con,"Delete from prod_master where code = '$code'") ;
			
				header("location: prod-master.php");
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
									$pname=$_POST['pname'];
									$hsn=$_POST['hsn'];
									$cgst=$_POST['cgst'];
									$sgst=$_POST['sgst'];
									$igst=$_POST['igst'];
									
									mysqli_query($con,"INSERT INTO `prod_master`(`pname`,`hsn`,`cgst`,`sgst`,`igst`) VALUES ('$pname','$hsn','$cgst','$sgst','$igst')");
								
								header("location:prod-master.php");
				
			
	}
}


if($_POST['update']=="Update")
{
	//ini_set("display_errors",1);
											//error_reporting(E_ALL);
					 					$code=$_POST['code'];
									$pname=$_POST['pname'];
									$hsn=$_POST['hsn'];
									$cgst=$_POST['cgst'];
									$sgst=$_POST['sgst'];
									$igst=$_POST['igst'];
				mysqli_query($con,"UPDATE `prod_master` SET `pname`='$pname',`hsn`='$hsn',`cgst`='$cgst',`sgst`='$sgst',`igst`='$igst' WHERE code='$code'") or die(mysqli_error());
				
				header("location:prod-master.php");

}

					?>
