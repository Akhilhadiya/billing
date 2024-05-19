
<?php
session_start();
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];}
include ("config.php");
include('../PHPMailer/PHPMailerAutoload.php');
		ini_set("display_errors",1);
								error_reporting(E_ALL);				

								//echo"connected...";	
	
								if (!$con)
								{
									
										echo"connection unsuccessfull";}
								else{
									
									$invno=$_POST['invno'];
									$dt=$_POST['dt'];
									$billto=$_POST['billto'];
									$del=$_POST['del'];
									$mode=$_POST['mode'];
									$ship=$_POST['ship'];
									$oref=$_POST['oref'];
									$bookno=$_POST['bookno'];
									$bookdt=$_POST['bookdt'];
									$disp=$_POST['disp'];
									$dest=$_POST['dest'];
										$dterms=$_POST['dterms'];
										$cgst=$_POST['tcgst'];
										$sgst=$_POST['tsgst'];
										$igst=$_POST['tigst'];
										$roundoff=$_POST['roundoff'];
										$total=$_POST['tamt'];
									$txamt=$_POST['ttl'];
									$cper=$_POST['cgst'];
									$sper=$_POST['sgst'];
									$iper=$_POST['igst'];
									$recpt=$_POST['recpt'];
									$sez=$_POST['sez'];
							
									$query = mysqli_query($con,"SELECT code FROM cust_master where name='$billto'");
	$results = mysqli_fetch_array($query);
	$bcode = $results['code']	;
									mysqli_query($con,"insert into autopinv(`unm`)values('$username')");
									
									$query = mysqli_query($con,"SELECT MAX(code) as invno1 FROM autopinv where unm='$username'");
	$results = mysqli_fetch_array($query);
	$invno = $results['invno1'];		
				  
				  $clen=strlen($invno);
				  //echo $clen;
				  if($clen=='1'){
				  $ad='000';
				  }
				  elseif($clen=='2'){
				  $ad='00';
				  }
					elseif($clen=='3'){$ad='0';}				
					else{$ad="";}
				if($year=='2021-2022')
				  {$prefix='PI/2021-22/';}
				  elseif($year=='2022-2023'){$prefix='PI/2022-23/';}
					elseif($year=='2023-2024'){$prefix='PI/2023-24/';}
				//$cur_auto_id1=$prefix.$ad.$cur_auto_id1;					
				$invno=$prefix.$ad.$invno;
				  
									
									mysqli_query($con,"INSERT INTO `pinv_main`(`invno`,`dt`,`billto`,`delnote`,`mode`,`ship`,`oref`,`bookno`,`bdt`,`disp`,`dest`,`delterms`,`cgst`,`sgst`,`igst`,`round`,`total`,`txamt`,`cper`,`sper`,`iper`,`recpt`,sez) VALUES ('$invno','$dt','$bcode','$del','$mode','$ship','$oref','$bookno','$bookdt','$disp','$dest','$dterms','$cgst','$sgst','$igst','$roundoff','$total','$txamt','$cper','$sper','$iper','$recpt','$sez')");
									
									//mysqli_query($con,"INSERT INTO `cust_ac`(`code`,`dt`,`custid`,`add`,`less`,`other`) VALUES ('$invno','$dt','$bcode','$total','0','0')");
									
							$desc1=$_POST['desc1'];		
							$hsn1=$_POST['hsn1'];
							$qty1=$_POST['qty1'];
							$rate1=$_POST['rate1'];		
							$gstrate1=$_POST['gstrate1'];
							$gstamt1=$_POST['gstamt1'];
							$size1=$_POST['size1'];
									
							$amt1=$_POST['amt1'];
							$desc2=$_POST['desc2'];		
							$hsn2=$_POST['hsn2'];
							$qty2=$_POST['qty2'];
							$rate2=$_POST['rate2'];		
							$gstrate2=$_POST['gstrate2'];
							$gstamt2=$_POST['gstamt2'];
							$amt2=$_POST['amt2'];
							$size2=$_POST['size2'];		
									
							$desc3=$_POST['desc3'];		
							$hsn3=$_POST['hsn3'];
							$qty3=$_POST['qty3'];
							$rate3=$_POST['rate3'];		
							$gstrate3=$_POST['gstrate3'];
							$gstamt3=$_POST['gstamt3'];
							$amt3=$_POST['amt3'];
							$size3=$_POST['size3'];		
									
							$desc4=$_POST['desc4'];		
							$hsn4=$_POST['hsn4'];
							$qty4=$_POST['qty4'];
							$rate4=$_POST['rate4'];		
							$gstrate4=$_POST['gstrate4'];
							$gstamt4=$_POST['gstamt4'];
							$amt4=$_POST['amt4'];
							$size4=$_POST['size4'];		
									
									
							$desc5=$_POST['desc5'];		
							$hsn5=$_POST['hsn5'];
							$qty5=$_POST['qty5'];
							$rate5=$_POST['rate5'];		
							$gstrate5=$_POST['gstrate5'];
							$gstamt5=$_POST['gstamt5'];
							$amt5=$_POST['amt5'];	
							$size5=$_POST['size5'];
							
								$query1 = mysqli_query($con,"SELECT code FROM prod_master where pname='$desc1'");
							$results1 = mysqli_fetch_array($query1);
							$dcode1 = $results1['code']	;
									
							$query2 = mysqli_query($con,"SELECT code FROM prod_master where pname='$desc2'");
							$results2 = mysqli_fetch_array($query2);
							$dcode2 = $results2['code']	;
								
							$query3 = mysqli_query($con,"SELECT code FROM prod_master where pname='$desc3'");
							$results3 = mysqli_fetch_array($query3);
							$dcode3 = $results3['code']	;		
									
							$query4 = mysqli_query($con,"SELECT code FROM prod_master where pname='$desc4'");
							$results4 = mysqli_fetch_array($query4);
							$dcode4 = $results4['code']	;
									
							$query5 = mysqli_query($con,"SELECT code FROM prod_master where pname='$desc5'");
							$results5 = mysqli_fetch_array($query5);
							$dcode5 = $results5['code']	;		
								
									
							if($desc1<>""){
							mysqli_query($con,"insert into `pinv_child`(`invno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`,`size`) values('$invno','1','$dcode1','$hsn1','$qty1','$rate1','$gstrate1','$gstamt1','$amt1','$size1')");
							}
							if($desc2<>""){
							mysqli_query($con,"insert into `pinv_child`(`invno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`,`size`) values('$invno','2','$dcode2','$hsn2','$qty2','$rate2','$gstrate2','$gstamt2','$amt2','$size2')");
							}
							if($desc3<>""){
							mysqli_query($con,"insert into `pinv_child`(`invno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`,`size`) values('$invno','3','$dcode3','$hsn3','$qty3','$rate3','$gstrate3','$gstamt3','$amt3','$size3')");
							}
							if($desc4<>""){
							mysqli_query($con,"insert into `pinv_child`(`invno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`,`size`) values('$invno','4','$dcode4','$hsn4','$qty4','$rate4','$gstrate4','$gstamt4','$amt4','$size4')");
							}
							if($desc5<>""){
							mysqli_query($con,"insert into `pinv_child`(`invno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`,`size`) values('$invno','5','$dcode5','$hsn5','$qty5','$rate5','$gstrate5','$gstamt5','$amt5','$size5')");
							}		
				/*$i="1";				
		for($i=1;$i<=5;$i++){
			$d[i]=$_POST['desc[0]'];
			$h[i]=$_POST['hsn[i]'];
			$q[i]=$_POST['qty[i]'];
                 if($d[i]<>""){
				 mysqli_query($con,"Insert into `inv_child` (`descript`,`hsn`,`qty`) values('$d[i]','$h[i]','$q[i]')");
				 }			}*/
				
		$sql="select email,aemail,name from cust_master where code='$bcode'";
									//echo $sql;
									$data=mysqli_query($con,$sql);
									$row=mysqli_fetch_array($data);
									$email=$row['email'];
									$aemail=$row['aemail'];
									$name=$row['name'];
									$date=date('d-m-Y',strtotime($dt));
									
									

									$subject = 'PROFORMA INVOICE';
									$message = $_REQUEST['message'];

									$mail = new PHPMailer;
									// echo !extension_loaded('openssl')?"Not Available":"Available";
									$mail->isSMTP();               // Set mailer to use SMTP
									//$mail->SMTPDebug = 1;
									//$mail->Host = 'mail.suprementerprise.com'; //'smtp.gmail.com';
									$mail->Host = 'ssl://smtp.gmail.com'; //'smtp.gmail.com';
									$mail->SMTPAuth = true;   // Enable SMTP authentication
									$mail->Username = 'info@mksoftservice.com';
									$mail->Password = 'ajwusstvddhavwck'; // SMTP password

									$mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `ssl` al
									$mail->Port = 465;                 // TCP port to connect to

									$mail->setFrom('info@mksoftservice.com', 'M K SoftService');
									//$mail->addAddress('khyati.ruparel2000@gmail.com');
		
									$mail->addAddress($email);
									$mail->addAddress($aemail);
									$mail->isHTML(true);  // Set email format to HTML
								
								$message ="<html> 
											<head> 
        										<title>Jagwani Shipping</title> 
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
												<td style='padding-left:55px;font-weight:bold;padding-top:40px;font-size:15px'>Welcome To Jagwani Shipping..!</td>
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

									
									header("location:perinvoice.php?code=$invno");
									if($recpt==""){
									}
									else{
								/*	$recptcode=$invno;
									$code=substr($recptcode,12,3);
									$code='R'.$code;
									
									mysqli_query($con,"INSERT INTO `receipt`(`recptcode`,`code`) VALUES ('$recptcode','$code')");
									mysqli_query($con,"INSERT INTO `cust_ac`(`code`) VALUES ('$code')");	
								header("location:annexure.php?code=$invno");*/
									}
			
	}


?>