<?php
/*session_start();
if ($_SESSION['uname']==''){header("Location:login.php");}else{
$username=$_SESSION['uname'];}*/
include ("config.php");

	if(isset($_GET['delete'])){
		 
			$code = $_GET['delete'];
			mysqli_query($con,"Delete from cust_master where code = '$code'") ;
			
				header("location: cust-master.php");
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
									$adrs=$_POST['adrs'];
									$city=$_POST['city'];
									$state=$_POST['state'];
									$stcode=$_POST['stcode'];
									$gstno=$_POST['gstno'];
									$panno=$_POST['panno'];
									$email=$_POST['email'];
									$mobile=$_POST['mobile'];
									$opnbal=$_POST['opnbal'];
									$aemail=$_POST['aemail'];
									$wportal=$_POST['wportal'];
									$pincode=$_POST['pincode'];
									$oemail=$_POST['oemail'];
									mysqli_query($con,"INSERT INTO `cust_master`(`name`,`adrs`,`city`,`state`,`stcode`,`gstno`,`panno`,`email`,`mobile`,`opnbal`,`aemail`,`wportal`,`pincode`,`oemail`) VALUES ('$name','$adrs','$city','$state','$stcode','$gstno','$panno','$email','$mobile','$opnbal','$aemail','$wportal','$pincode','$oemail')");
								
								header("location:cust-master.php");
				
			
	}
}
if($_POST['sendmail']=="Sendmail")
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
									$pwd=$code*1234;
									$email=$_POST['email'];
									$aemail=$_POST['aemail'];
									$oemail=$_POST['oemail'];
									//echo $code;
									//echo $pwd;
									$qry=mysqli_query($con,"select name from `login` where `name`='$email'");
									
									$res1=mysqli_fetch_array($qry);
									$lnm=$res1['name'];
									//echo $lnm;
									if($lnm==$email){echo "out";}
									else{echo "in";
								mysqli_query($con,"INSERT INTO `login`(`name`,`pwd`,`type`) VALUES ('$email','$pwd','client')");
									}
								include('PHPMailer/PHPMailerAutoload.php');

		$subject = 'Login Details For'."  ".$name;
		$message = $_REQUEST['message'];

		$mail = new PHPMailer;
		// echo !extension_loaded('openssl')?"Not Available":"Available";
		$mail->isSMTP();               // Set mailer to use SMTP
		//$mail->SMTPDebug = 1;
		//$mail->Host = 'mail.suprementerprise.com'; //'smtp.gmail.com';
		$mail->Host = 'ssl://smtp.gmail.com'; //'smtp.gmail.com';
		$mail->SMTPAuth = true;   // Enable SMTP authentication
		$mail->Username = 'noreply@naishagroup.com';
		$mail->Password = 'Qwe!@#12345'; // SMTP password

		$mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `ssl` al
		$mail->Port = 465;                 // TCP port to connect to

		$mail->setFrom('noreply@naishagroup.com', 'Naisha Group');
		//$mail->addAddress('khyati.ruparel2000@gmail.com');
		//$mail->addAddress('kuldeep@mksoftservice.com');
		$mail->addAddress($email);
		$mail->addAddress($aemail);
		$mail->addAddress($oemail);
		$mail->isHTML(true);  // Set email format to HTML
	
	$message = "Click here for login<br>http://mksoftservice.com/Naisha/login.php<br><br>Your Login Id Is : ".$email. "<br> Your Password Is : ".$pwd;
	
		$mail->Subject = $subject;
		$mail->Body = $message." ";

		if(!$mail->send()) {
			$resp = $mail->ErrorInfo;
			
		} else {
			$resp = "Email Sent";
		}
	
	echo "<div class='w3-panel w3-green' style='margin-top: 0px; margin-bottom: 0px;'>
    <center><h3>Success!</h3>
    <p>Thank You For your support</p></center>
  </div>";

								header("location:cust-master.php");
				
			
	}
}





if($_POST['update']=="Update")
{
	//ini_set("display_errors",1);
											//error_reporting(E_ALL);
					 					$code=$_POST['code'];
									$name=$_POST['name'];
									$adrs=$_POST['adrs'];
									$city=$_POST['city'];
									$state=$_POST['state'];
									$stcode=$_POST['stcode'];
									$gstno=$_POST['gstno'];
									$panno=$_POST['panno'];
									$email=$_POST['email'];
									$mobile=$_POST['mobile'];
									$opnbal=$_POST['opnbal'];
									$aemail=$_POST['aemail'];
									$wportal=$_POST['wportal'];
									$pincode=$_POST['pincode'];
									$oemail=$_POST['oemail'];
				mysqli_query($con,"UPDATE `cust_master` SET `name`='$name',`adrs`='$adrs',`city`='$city',`state`='$state',`stcode`='$stcode',`gstno`='$gstno',`panno`='$panno',`email`='$email',`mobile`='$mobile',`opnbal`='$opnbal',`aemail`='$aemail',`wportal`='$wportal',`pincode`='$pincode',`oemail`='$oemail' WHERE code='$code'") or die(mysqli_error());
				
				header("location:cust-master.php");

}

					?>
