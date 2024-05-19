<?php
session_start();
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];}
include ("config.php");

		//ini_set("display_errors",1);
		//error_reporting(E_ALL);	
								if (!$con)
								{
									
										echo"connection unsuccessfull";}
								else{
									$crno=$_POST['crno'];
									$irnno=$_POST['irnno'];
									$ackno=$_POST['ackno'];
									$ackdt=$_POST['ackdt'];
									mysqli_query($con,"Update `credit_main` set `irnno`='$irnno',`ackno`='$ackno',`ackdt`='$ackdt' where crno='$crno'");
									mysqli_query($con,"Delete from einv2");
									
									$sql="select billto,email,aemail,name,crdt,ship,qty,invno from credit_main,cust_master,cr_child where credit_main.crno='$crno' and billto=cust_master.code and cr_child.crno=credit_main.crno";
									//echo $sql;
									$data=mysqli_query($con,$sql);
									$row=mysqli_fetch_array($data);
									$email=$row['email'];
									$aemail=$row['aemail'];
									$name=$row['name'];
									$dt=$row['crdt'];
									$date=date('d-m-Y',strtotime($dt));
									$ship=$row['ship'];
									$qty=$row['qty'];
									$invno=$row['invno'];
									include('../PHPMailer/PHPMailerAutoload.php');

									$subject = 'CREDIT NOTE';
									$message = $_REQUEST['message'];

									$mail = new PHPMailer;
									// echo !extension_loaded('openssl')?"Not Available":"Available";
									$mail->isSMTP();               // Set mailer to use SMTP
									//$mail->SMTPDebug = 1;
									//$mail->Host = 'mail.suprementerprise.com'; //'smtp.gmail.com';
									$mail->Host = 'ssl://smtp.gmail.com'; //'smtp.gmail.com';
									$mail->SMTPAuth = true;   // Enable SMTP authentication
									//$mail->Username = 'info@mksoftservice.com';
									//$mail->Password = 'Vrushti#25316'; // SMTP password
									$mail->Username = 'noreply@naishagroup.com';
									$mail->Password = 'nG@123456'; // SMTP password
									$mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `ssl` al
									$mail->Port = 465;                 // TCP port to connect to

									//$mail->setFrom('info@mksoftservice.com', 'M K SoftService');
									$mail->setFrom('noreply@naishagroup.com','Naisha Group');
									//$mail->addAddress('khyati.ruparel2000@gmail.com');
		
									$mail->addAddress($email);
									$mail->addAddress($aemail);
	
									$mail->isHTML(true);  // Set email format to HTML
								
													$message ="<html> 
											<head> 
        										<title>Naisha Empty Park Private Limited</title> 
    										</head> 
    									<body> 
        									<table cellspacing='0' style='background-color:#e5e5e5;width: 100%;'> 
											<tr> 
												<td>
													<center>
											<table style='background-color:white;width:70%;border-radius:5px;margin:10px;'>
												<tr>
													<td><center><img src='http://mksoftservice.com/Naisha/dist/img/nep.jpeg' style='width:260px;height:120px;'></center></td>
												</tr>
												<tr>
												<td style='padding-left:55px;font-weight:bold;padding-top:40px;font-size:15px'>Welcome To Naisha Empty Park Private Limited..!</td>
											</tr>
						<tr>
							<td style='padding-left:55px;padding-top:20px;font-size:15px'>Please Click Below To Login and Download Your Credit Note And Ledger<br><a href='http://mksoftservice.com/Naisha/customerlogin.php'>http://mksoftservice.com/Naisha/customerlogin.php</a></td>
						</tr>
						<tr>
							<td style='padding-left:55px;padding-top:20px'><b>Your Credit Note Details Are As Below :</b>
							</td>
						</tr>
						<tr>
							<td>
								<center>
						<table style='background-color:#ecf8ff;width:80%;margin-bottom:40px;margin-top:20px'>
						<tr>
						
							<td style='padding-left:40px;padding-top:20px;padding-bottom:20px'><?php echo '<br><b>Cr Date : </b>$date<br><br><b>Cr No :  </b>$crno<br><br><b>Against Invoice No :  $invno</b><br><br><b>Party Name :  </b>$name<br><br><b>Container :  </b>$qty<br><br><b>Line Name :  </b>$ship </td>
						</tr>
						</table>
								</center>
							</td>
						</tr>
							<tr>
							<td style='padding-left:55px;padding-top:10px'><b>Your Registered Email Id :</b>
							</td>
						</tr>
						<tr>
							<td>
								<center>
						<table style='background-color:#ecf8ff;width:80%;margin-bottom:40px;margin-top:20px'>
						<tr>
							<td style='padding-left:40px;padding-top:20px;padding-bottom:20px'>$email<br>$aemail</td>
						</tr>
						</table>
								</center>
							</td>
						</tr>
					</table>
					</center>
				</td>
            </tr> 
        </table> 
    </body> 
    </html> ";

									$mail->Subject = $subject;
									$mail->Body = $message." ";

									header("location:credit.php?crno=$crno");
	}

	

?>