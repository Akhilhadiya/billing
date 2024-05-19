<?php
if(isset($_GET['code'])){

									include('config.php');
									$invno=$_GET['code'];
									$sql="select billto,email,aemail,name,dt,ship,qty from pinv_main,cust_master,pinv_child where pinv_main.invno='$invno' and billto=cust_master.code and pinv_child.invno=pinv_main.invno";
									//echo $sql;
									$data=mysqli_query($con,$sql);
									$row=mysqli_fetch_array($data);
									$email=$row['email'];
									$aemail=$row['aemail'];
									$name=$row['name'];
									$dt=$row['dt'];
									$date=date('d-m-Y',strtotime($dt));
									$ship=$row['ship'];
									$qty=$row['qty'];
									include('../PHPMailer/PHPMailerAutoload.php');

									$subject = 'PROFORMA INVOICE';
									$message = $_REQUEST['message'];

									$mail = new PHPMailer;
									// echo !extension_loaded('openssl')?"Not Available":"Available";
									$mail->isSMTP();               // Set mailer to use SMTP
									//$mail->SMTPDebug = 1;
									//$mail->Host = 'mail.suprementerprise.com'; //'smtp.gmail.com';
									$mail->Host = 'ssl://smtp.gmail.com'; //'smtp.gmail.com';
									$mail->SMTPAuth = true;   // Enable SMTP authentication
									$mail->Username = 'noreply@naishagroup.com';
									$mail->Password = 'nG@123456'; // SMTP password

									$mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `ssl` al
									$mail->Port = 465;                 // TCP port to connect to

									$mail->setFrom('noreply@naishagroup.com', 'Naisha Group');
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
							<td style='padding-left:55px;padding-top:20px;font-size:15px'>Please Click Below To Login and Download Your Proforma Invoice And Ledger<br><a href='http://mksoftservice.com/Naisha/customerlogin.php'>http://mksoftservice.com/Naisha/customerlogin.php</a></td>
						</tr>
						<tr>
							<td style='padding-left:55px;padding-top:20px'><b>Your Invoice Details Are As Below :</b>
							</td>
						</tr>
						<tr>
							<td>
								<center>
						<table style='background-color:#ecf8ff;width:80%;margin-bottom:40px;margin-top:20px'>
						<tr>
						
							<td style='padding-left:40px;padding-top:20px;padding-bottom:20px'><?php echo '<br><b>Proforma Invoice Date : </b>$date<br><br><b>Proforma Invoice No :  </b>$invno<br><br><b>Party Name :  </b>$name<br><br><b>Container :  </b>$qty<br><br><b>Line Name :  </b>$ship </td>
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
							<td style='padding-left:40px;padding-top:20px;padding-bottom:20px'><?php echo $email<br>$aemail</td>
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

									if(!$mail->send()) {
										header("location:pinvoice-search.php?fail=no");
			
									} else {
										header("location:pinvoice-search.php?flag=$invno");
									}
									//mail ends here..
														
}
?>