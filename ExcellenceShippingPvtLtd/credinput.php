
<?php
session_start();
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];}
include ("config.php");
									

if(isset($_GET['delete'])){
		 
			$code = $_GET['delete'];
			$rcode= substr($code,13,3);
			mysqli_query($con,"Delete from credit_main where `crno`='$code'");
			mysqli_query($con,"Delete from cr_child where `crno`='$code'");
			mysqli_query($con,"Delete from cust_ac where `code`='$code'");
			//mysqli_query($con,"Delete from cust_ac where code='$code'");
			header("location: credit-search.php");
}

if($_POST['send']=="Save"){
		ini_set("display_errors",1);
								error_reporting(E_ALL);				

								//echo"connected...";	
	
								if (!$con)
								{
									
										echo"connection unsuccessfull";}
								else{
									$crno=$_POST['crno'];
									$crdt=$_POST['crdt'];
									$invno=$_POST['invno'];
									$invdt=$_POST['invdt'];
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
									
							
									$query = mysqli_query($con,"SELECT code FROM cust_master where name='$billto'");
	$results = mysqli_fetch_array($query);
	$bcode = $results['code']	;
									mysqli_query($con,"insert into autocr(`unm`)values('$username')");
									
									$query = mysqli_query($con,"SELECT MAX(code) as crno1 FROM autocr where unm='$username'");
	$results = mysqli_fetch_array($query);
	$crno = $results['crno1'];		
				  
				  $clen=strlen($crno);
				  echo $clen;
				  if($clen=='1'){
				  $ad='00';
				  }
				  elseif($clen=='2'){
				  $ad='0';
				  }else{$ad="";}
				$crno="EMSCRN/22-23/".$ad.$crno;
				  
									
									mysqli_query($con,"INSERT INTO `credit_main`(`crno`,`crdt`,`invno`,`invdt`,`billto`,`delnote`,`mode`,`ship`,`oref`,`bookno`,`bdt`,`disp`,`dest`,`delterms`,`cgst`,`sgst`,`igst`,`round`,`total`,`txamt`,`cper`,`sper`,`iper`) VALUES ('$crno','$crdt','$invno','$invdt','$bcode','$del','$mode','$ship','$oref','$bookno','$bookdt','$disp','$dest','$dterms','$cgst','$sgst','$igst','$roundoff','$total','$txamt','$cper','$sper','$iper')");
									
									mysqli_query($con,"INSERT INTO `cust_ac`(`code`,`dt`,`custid`,`add`,`less`,`other`) VALUES ('$crno','$crdt','$bcode','0','$total','0')");
									
							$desc1=$_POST['desc1'];		
							$hsn1=$_POST['hsn1'];
							$qty1=$_POST['qty1'];
							$rate1=$_POST['rate1'];		
							$gstrate1=$_POST['gstrate1'];
							$gstamt1=$_POST['gstamt1'];
									
							$amt1=$_POST['amt1'];
							$desc2=$_POST['desc2'];		
							$hsn2=$_POST['hsn2'];
							$qty2=$_POST['qty2'];
							$rate2=$_POST['rate2'];		
							$gstrate2=$_POST['gstrate2'];
							$gstamt2=$_POST['gstamt2'];
							$amt2=$_POST['amt2'];
									
							$desc3=$_POST['desc3'];		
							$hsn3=$_POST['hsn3'];
							$qty3=$_POST['qty3'];
							$rate3=$_POST['rate3'];		
							$gstrate3=$_POST['gstrate3'];
							$gstamt3=$_POST['gstamt3'];
							$amt3=$_POST['amt3'];
									
							$desc4=$_POST['desc4'];		
							$hsn4=$_POST['hsn4'];
							$qty4=$_POST['qty4'];
							$rate4=$_POST['rate4'];		
							$gstrate4=$_POST['gstrate4'];
							$gstamt4=$_POST['gstamt4'];
							$amt4=$_POST['amt4'];		
									
							$desc5=$_POST['desc5'];		
							$hsn5=$_POST['hsn5'];
							$qty5=$_POST['qty5'];
							$rate5=$_POST['rate5'];		
							$gstrate5=$_POST['gstrate5'];
							$gstamt5=$_POST['gstamt5'];
							$amt5=$_POST['amt5'];		
							
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
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','1','$dcode1','$hsn1','$qty1','$rate1','$gstrate1','$gstamt1','$amt1')");
							}
							if($desc2<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','2','$dcode2','$hsn2','$qty2','$rate2','$gstrate2','$gstamt2','$amt2')");
							}
							if($desc3<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','3','$dcode3','$hsn3','$qty3','$rate3','$gstrate3','$gstamt3','$amt3')");
							}
							if($desc4<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','4','$dcode4','$hsn4','$qty4','$rate4','$gstrate4','$gstamt4','$amt4')");
							}
							if($desc5<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','5','$dcode5','$hsn5','$qty5','$rate5','$gstrate5','$gstamt5','$amt5')");
							}		
					
								header("location:credit.php?crno=$crno");
									}
			
	}
if($_POST['update']=="Update"){
		 
			
								//echo"connected...";	
	
								if (!$con)
								{
									
										echo"connection unsuccessfull";}
								else{
									
									$crno=$_POST['crno'];
									mysqli_query($con,"Delete from credit_main where crno='$crno'");
									mysqli_query($con,"Delete from cust_ac where code='$crno'");
									mysqli_query($con,"Delete from cr_child where crno='$crno'");
									
									$crdt=$_POST['crdt'];
									$invno=$_POST['invno'];
									$invdt=$_POST['invdt'];
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
									
							
									$query = mysqli_query($con,"SELECT code FROM cust_master where name='$billto'");
	$results = mysqli_fetch_array($query);
	$bcode = $results['code']	;
								
									mysqli_query($con,"INSERT INTO `credit_main`(`crno`,`crdt`,`invno`,`invdt`,`billto`,`delnote`,`mode`,`ship`,`oref`,`bookno`,`bdt`,`disp`,`dest`,`delterms`,`cgst`,`sgst`,`igst`,`round`,`total`,`txamt`,`cper`,`sper`,`iper`) VALUES ('$crno','$crdt','$invno','$invdt','$bcode','$del','$mode','$ship','$oref','$bookno','$bookdt','$disp','$dest','$dterms','$cgst','$sgst','$igst','$roundoff','$total','$txamt','$cper','$sper','$iper')");
									
									mysqli_query($con,"INSERT INTO `cust_ac`(`code`,`dt`,`custid`,`add`,`less`,`other`) VALUES ('$crno','$crdt','$bcode','0','$total','0')");
									
							$desc1=$_POST['desc1'];		
							$hsn1=$_POST['hsn1'];
							$qty1=$_POST['qty1'];
							$rate1=$_POST['rate1'];		
							$gstrate1=$_POST['gstrate1'];
							$gstamt1=$_POST['gstamt1'];
									
							$amt1=$_POST['amt1'];
							$desc2=$_POST['desc2'];		
							$hsn2=$_POST['hsn2'];
							$qty2=$_POST['qty2'];
							$rate2=$_POST['rate2'];		
							$gstrate2=$_POST['gstrate2'];
							$gstamt2=$_POST['gstamt2'];
							$amt2=$_POST['amt2'];
									
							$desc3=$_POST['desc3'];		
							$hsn3=$_POST['hsn3'];
							$qty3=$_POST['qty3'];
							$rate3=$_POST['rate3'];		
							$gstrate3=$_POST['gstrate3'];
							$gstamt3=$_POST['gstamt3'];
							$amt3=$_POST['amt3'];
									
							$desc4=$_POST['desc4'];		
							$hsn4=$_POST['hsn4'];
							$qty4=$_POST['qty4'];
							$rate4=$_POST['rate4'];		
							$gstrate4=$_POST['gstrate4'];
							$gstamt4=$_POST['gstamt4'];
							$amt4=$_POST['amt4'];		
									
							$desc5=$_POST['desc5'];		
							$hsn5=$_POST['hsn5'];
							$qty5=$_POST['qty5'];
							$rate5=$_POST['rate5'];		
							$gstrate5=$_POST['gstrate5'];
							$gstamt5=$_POST['gstamt5'];
							$amt5=$_POST['amt5'];		
							
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
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','1','$dcode1','$hsn1','$qty1','$rate1','$gstrate1','$gstamt1','$amt1')");
							}
							if($desc2<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','2','$dcode2','$hsn2','$qty2','$rate2','$gstrate2','$gstamt2','$amt2')");
							}
							if($desc3<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','3','$dcode3','$hsn3','$qty3','$rate3','$gstrate3','$gstamt3','$amt3')");
							}
							if($desc4<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','4','$dcode4','$hsn4','$qty4','$rate4','$gstrate4','$gstamt4','$amt4')");
							}
							if($desc5<>""){
							mysqli_query($con,"insert into `cr_child`(`crno`,`srno`,`descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount`) values('$crno','5','$dcode5','$hsn5','$qty5','$rate5','$gstrate5','$gstamt5','$amt5')");
							}		
					
								header("location:credit-search.php");
									}
			
	}


?>