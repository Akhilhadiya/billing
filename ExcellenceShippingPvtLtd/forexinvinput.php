
<?php
session_start();
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];}
include ("config.php");
if(isset($_GET['delete'])){
			$code = $_GET['delete'];
			mysqli_query($con,"Delete from forexinv_main where invno='$code'");
			mysqli_query($con,"Delete from forexinv_child where invno='$code'");
			header("location: forexinv-search.php");
}
if($_POST['save']=="Save")
			  {
						//ini_set("display_errors",1);
						//error_reporting(E_ALL);				
						if (!$con)
						{
							echo"connection unsuccessfull";
						}
						else{
									$invno=$_POST['invno'];
									$dt=$_POST['dt'];
									$date=date('d-m-Y',strtotime($dt));
									$billto=$_POST['billto'];
									$pod=$_POST['pod'];
									$pol=$_POST['pol'];
									$ship=$_POST['ship'];
									$eta=$_POST['eta'];
									$etd=$_POST['etd'];
									$hblno=$_POST['hblno'];
									$mblno=$_POST['mblno'];
									$contlot=$_POST['contlot'];
									$exrate=$_POST['exrate'];
									$cgst=$_POST['tcgst'];
									$sgst=$_POST['tsgst'];
									$igst=$_POST['tigst'];
									$roundoff=$_POST['roundoff'];
									$total=$_POST['tamt'];
									$txamt=$_POST['ttl'];
									$cper=$_POST['cgst'];
									$sper=$_POST['sgst'];
									$iper=$_POST['igst'];
									$sez=$_POST['sez'];
									$usdtamt=$_POST['usdtamt'];		
									$country=$_POST['country'];
									$query = mysqli_query($con,"SELECT code FROM cust_master where name='$billto'");
									$results = mysqli_fetch_array($query);
									$bcode = $results['code'];
									mysqli_query($con,"insert into autofrxinv(`unm`)values('$username')");
									$query = mysqli_query($con,"SELECT MAX(code) as invno1 FROM autofrxinv where unm='$username'");
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
									if($year=='2023-2024'){$prefix='ESFRX/23-24/';}
									//$cur_auto_id1=$prefix.$ad.$cur_auto_id1;					
									$invno=$prefix.$ad.$invno;
				  					$sql="INSERT INTO `forexinv_main`(`invno`, `dt`, `billto`, `pod`, `pol`, `ship`, `eta`, `etd`, `hblno`, `mblno`, `contlot`, `exrate`, `cgst`, `sgst`, `igst`, `round`, `total`, `txamt`, `cper`, `sper`, `iper`, `sez`,`usdtamt`,`country`) VALUES ('$invno','$dt','$bcode','$pod','$pol','$ship','$eta','$etd','$hblno','$mblno','$contlot','$exrate','$cgst','$sgst','$igst','$roundoff','$total','$txamt','$cper','$sper','$iper','$sez','$usdtamt','$country')";
									//echo $sql;
									if(mysqli_query($con,$sql)){
									
									for ($i=0;$i<count($_POST['desc']);$i++)
										{		
											$j=$i+1;
											$qr="INSERT INTO `forexinv_child`(`invno`, `srno`, `descript`, `hsn`, `qty`, `rate`, `gstrate`, `gstamount`, `amount`, `size`) VALUES('$invno','$j','".$_POST['desc'][$i]."','".$_POST['hsn'][$i]."','".$_POST['qty'][$i]."','".$_POST['rate'][$i]."','".$_POST['gstrate'][$i]."','".$_POST['gstamt'][$i]."','".$_POST['amt'][$i]."','".$_POST['size'][$i]."')";
											mysqli_query($con,$qr);
										}
									}
									header("location:forexinv-entry.php");
						
						}
									
	}
if($_POST['update']=="Update")
			  {
						//ini_set("display_errors",1);
						//error_reporting(E_ALL);				
						if (!$con)
						{
							echo"connection unsuccessfull";
						}
						else{
									$invno=$_POST['invno'];
									$dt=$_POST['dt'];
									$date=date('d-m-Y',strtotime($dt));
									$billto=$_POST['billto'];
									$pod=$_POST['pod'];
									$pol=$_POST['pol'];
									$ship=$_POST['ship'];
									$eta=$_POST['eta'];
									$etd=$_POST['etd'];
									$hblno=$_POST['hblno'];
									$mblno=$_POST['mblno'];
									$contlot=$_POST['contlot'];
									$exrate=$_POST['exrate'];
									$cgst=$_POST['tcgst'];
									$sgst=$_POST['tsgst'];
									$igst=$_POST['tigst'];
									$roundoff=$_POST['roundoff'];
									$total=$_POST['tamt'];
									$txamt=$_POST['ttl'];
									$cper=$_POST['cgst'];
									$sper=$_POST['sgst'];
									$iper=$_POST['igst'];
									$sez=$_POST['sez'];
									$usdtamt=$_POST['usdtamt'];		
									$country=$_POST['country'];
							
									$query = mysqli_query($con,"SELECT code FROM cust_master where name='$billto'");
									$results = mysqli_fetch_array($query);
									$bcode = $results['code'];
							
									mysqli_query($con,"Delete from forexinv_main where invno='$invno'");
									mysqli_query($con,"Delete from forexinv_child where invno='$invno'");
									
									$sql="INSERT INTO `forexinv_main`(`invno`, `dt`, `billto`, `pod`, `pol`, `ship`, `eta`, `etd`, `hblno`, `mblno`, `contlot`, `exrate`, `cgst`, `sgst`, `igst`, `round`, `total`, `txamt`, `cper`, `sper`, `iper`, `sez`,`usdtamt`,`country`) VALUES ('$invno','$dt','$bcode','$pod','$pol','$ship','$eta','$etd','$hblno','$mblno','$contlot','$exrate','$cgst','$sgst','$igst','$roundoff','$total','$txamt','$cper','$sper','$iper','$sez','$usdtamt','$country')";
									if(mysqli_query($con,$sql)){
									for ($i=0;$i<count($_POST['desc']);$i++)
										{		
											$j=$i+1;
											$qr="INSERT INTO `forexinv_child`(`invno`, `srno`, `descript`, `hsn`, `qty`, `rate`, `gstrate`, `gstamount`, `amount`, `size`) VALUES('$invno','$j','".$_POST['desc'][$i]."','".$_POST['hsn'][$i]."','".$_POST['qty'][$i]."','".$_POST['rate'][$i]."','".$_POST['gstrate'][$i]."','".$_POST['gstamt'][$i]."','".$_POST['amt'][$i]."','".$_POST['size'][$i]."')";
											mysqli_query($con,$qr);
										}
									}
									header("location:forexinv-search.php");
						
						}
									
	}
?>