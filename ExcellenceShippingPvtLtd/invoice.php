<?php


//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once '../admintemplate/vendor3/autoload.php';
ob_start();
include('config.php');
session_start();

$_SESSION['var']='print';
$username=$_SESSION['uname'];
//$username="K R ROADLINES";
$invno=$_GET['code'];


$sql="select * from `inv_main` where invno='$invno'";

if(mysqli_query($con,$sql)){
                        $data =mysqli_query($con,$sql);
						$row = mysqli_fetch_array($data);
	
										$invno=$row['invno'];
										$dt=$row['dt'];
										if(($dt=="")||($dt=="0000-00-00")){$dt="";}else{
										$dt = date("d-m-Y", strtotime($dt));}
										$billto=$row['billto'];
	$query = mysqli_query($con,"SELECT name FROM cust_master where code='$billto'");
	$results = mysqli_fetch_array($query);
	$bcode = $results['name']	;
										$delnote=$row['delnote'];
										$mode=$row['mode'];
										$ship=$row['ship'];
											$oref=$row['oref'];
											$bookno=$row['bookno'];
											$bdt=$row['bdt'];
											if(($bdt=="")||($bdt=="0000-00-00")){$bdt="";}
											else{
											$bdt= date("d-m-Y",strtotime($bdt));}
											$disp=$row['disp'];
											$dest=$row['dest'];
											$delterms=$row['delterms'];
											$cgst=$row['cgst'];
											$sgst=$row['sgst'];
											$igst=$row['igst'];
											$round=$row['round'];
											$total=$row['total'];
											$sez=$row['sez'];
											$irnno=$row['irnno'];
											$ackno=$row['ackno'];
											$ackdt=$row['ackdt'];
									}
else{echo "not working";}
$query = mysqli_query($con,"SELECT * FROM cust_master where name='$bcode'");
	$results = mysqli_fetch_array($query);
	$adrs = $results['adrs'];
	$city= $results['city'];
	$state=$results['state'];
	$stcode=$results['stcode'];
	$gstno=$results['gstno'];
	$email=$results['email'];

/*for receipt*/
$sql1="select * from `receipt` where recptcode='$invno'";

if(mysqli_query($con,$sql1)){
                        $data1 =mysqli_query($con,$sql1);
						$row1 = mysqli_fetch_array($data1);
				$rcustid=$row1['custname'];
	$query1 = mysqli_query($con,"SELECT name FROM cust_master where code='$rcustid'");
	$result1 = mysqli_fetch_array($query1);
	$rcust=$result1['name'];
					$rdt=$row1['dt'];
					$rdt= date("d-m-Y",strtotime($rdt));
					$rmode=$row1['mode'];
					$rrecamt=$row1['recamt'];
					$rbank=$row1['bank'];
					$rtds=$row1['tds'];
					$chq=$row1['rem'];
}
 

function getIndianCurrency($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}


//echo numberTowords(500000);
echo getIndianCurrency(50000);
	?>
<!DOCTYPE HTML>
<html lang="en">
	<style>
  #table{
	  
   	  height: 620px;
        width: 580px;
        
	 
  }
		
	.vertical-text {
	transform: rotate(270deg);
	transform-origin: left top 0;
}

}	
</style>
	
	<link href="//db.onlinewebfonts.com/c/cd0381aa3322dff4babd137f03829c8c?family=Tahoma" rel="stylesheet" type="text/css"/> 
	<!--<head>
		<!-- Fontfaces CSS
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	</head>-->
	<body>
		<!--<link href="https://fonts.googleapis.com/css?family=Times New Roman" rel="stylesheet">-->
		<br><br>
	<table  id="table">
		
		<tr>
			<td colspan="3">
				<table style="">
					
					<tr>
						
						<td colspan="2" style="width:247px;text-align:center;font-size:10px;"><span style="margin-left:30px;font-weight:bold;font-size:22px">TAX INVOICE</span></td>
					
					</tr>
						
					<tr>
						<td style="border:1px;width:160px">
						<table>
							<tr>
								<td><span style="font-weight:bold;font-size:17px">Jagwani Shipping</span></td>
							</tr>
							<tr>
								<td style="font-size:12px">
								PLOT NO 94,	
								 WARD 9B-B, 
								 AKG SOCIETY,<br> Gandhidham,Kachchh,Gujarat, 370201	<br>	
								GSTIN/UN : 24AAGCJ1183N1ZC <br>		
								State Name : Gujarat, Code : 24		<br>
									
								</td>
							</tr>
							</table>
						</td>
						<td style="width:320px;border:1px">
						<table>
							
								<tr>
									<td  style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Invoice No<br><?php echo $invno; ?></td>
									<td  style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Dated<br><?php echo $dt; ?></td>
								</tr>
								<tr>
									<td style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Delivery Note<br><?php echo wordwrap($delnote,35,"<br>\n"); ?></td>
									<td style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Mode/Terms of Payment<br><?php echo $mode; ?></td>
								</tr>
								<tr>
									
										<td style="border:1px solid black;height:28px;font-size:14px;width:230px;text-align:left">Shipping Line<br><?php echo wordwrap($ship,35,"<br>\n"); ?></td>
										<td style="border:1px solid black;height:28px;font-size:14px;width:230px;text-align:left">Other Reference(s)<br><?php echo wordwrap($oref,30,"<br>\n",true); ?></td>		
								</tr>
								
							
							</table>
						</td>
					<!--<td style="width:160px">
						<table>
										<tr><td  style="border:1px solid black;text-align:left;font-size:14px;width:240px;height:28px;">Invoice No<br><?php echo $invno; ?></td></tr>
											<tr><td style="border:1px solid black;text-align:left;font-size:14px;width:240px;height:28px;">Delivery Note<br><?php echo $delnote; ?></td></tr>
											<tr><td style="border:1px solid black;height:28px;font-size:14px;width:240px;text-align:left">Shipping Line<br><?php echo $ship; ?></td></tr>
										
										</table>
						</td>
						<td style="width:160px">
							<table>
										<tr><td  style="border:1px solid black;text-align:left;font-size:14px;width:220px;height:28px;">Dated<br><?php echo $dt; ?></td></tr>
											<tr><td style="border:1px solid black;text-align:left;font-size:14px;width:220px;height:28px;">Mode/Terms of Payment<br><?php echo $mode; ?></td></tr>
											<tr><td style="border:1px solid black;height:28px;font-size:14px;width:220px;text-align:left">Other Reference(s)<br><?php echo $oref; ?></td></tr>
										
										</table>
						
						</td>-->
					</tr>
					<tr>
			
						<td style="border:1px;width:160px;">
						<table>
							<tr>
								<td><span style="font-weight:bold;font-size:17px">Billing To,<br><?php echo wordwrap($bcode,23,"<br>\n"); ?></span></td>
							</tr>
							<tr>
								<td style="font-size:12px;">
								<?php
									echo wordwrap($adrs,35,"<br>\n");
									//$newadrs = wordwrap($adrs,8,"\n",true);
									//	echo "$newadrs\n";
								?><br>
								<?php echo $city ?><br>
								GSTIN/UN : <?php echo $gstno; ?>	<br>
								State Name : <?php echo $state; ?>, Code : <?php echo $stcode; ?>		<br>
								E-Mail: <?php echo wordwrap($email,35,"<br>\n",true); ?>		
								</td>
							</tr>
							</table>
						</td>
							<td style="width:320px;border:1px">
						<table>
							
								<tr>
									<td  style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Booking No/D.O No.<br><?php echo wordwrap($bookno,28,"<br>\n",true); ?></td>
									<td  style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Dated<br><?php echo $bdt; ?></td>
								</tr>
								<tr>
									<td style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Dispatch Through<br><?php echo wordwrap($disp,35,"<br>\n"); ?></td>
									<td style="border:1px solid black;text-align:left;font-size:14px;width:230px;height:28px;">Destination<br><?php echo wordwrap($dest,35,"<br>\n"); ?></td>
								</tr>
								<tr>
										<td colspan="2" style="border:1px;width:230px;height:28px">Delivery Terms<br><?php echo $delterms; ?></td>
										
								</tr>
								
							
							</table>
						</td>
						<!--<td style="width:160px">
						<table>
										<tr><td  style="border:1px solid black;text-align:left;font-size:14px;width:240px;height:28px;">Booking No/D.O No.<br><?php echo $bookno; ?></td></tr>
											<tr><td style="border:1px solid black;text-align:left;font-size:14px;width:240px;height:28px;">Dispatch Through<br><?php echo $disp; ?></td></tr>
							
										</table>
							<table><tr><td  style="border:1px;width:240px;height:28px">Delivery Terms<br><?php echo $delterms; ?></td></tr></table>
						</td>
						<td style="width:160px">
							<table>
										<tr><td  style="border:1px solid black;text-align:left;font-size:14px;width:220px;height:28px;">Dated<br><?php echo $bdt; ?></td></tr>
											<tr><td style="border:1px solid black;text-align:left;font-size:14px;width:220px;height:28px;">Destination<br><?php echo $dest; ?></td></tr>
								<tr><td style="width:220px;height:28px">
									
									</td></tr>
								</table>
									
						
						</td>-->
					</tr>
					
				</table>			
			</td>
		</tr>
		<tr>
							<td colspan="3">
							<table  style="padding-top:15px">
								<tr>
									<td style="width:30px;border:1px;font-size:12px">Sr No</td>
									<td style="width:225px;border:1px;text-align:center">Description of Goods</td>
									<td style="width:60px;border:1px;text-align:center">HSN/SAC</td>
									<td style="width:50px;border:1px;text-align:center">Quantity</td>
									<td style="width:30px;border:1px;text-align:center">Size</td>
									<td style="width:60px;border:1px;text-align:center">Rate</td>
									<td style="width:50px;border:1px;text-align:center">GST Rate</td>
									<td style="width:60px;border:1px solid black;text-align:center">GST Amount</td>
									<td style="width:90px;border:1px;text-align:center">Amount</td>
								</tr>
								<?php 
								$srno=0;
								$sql="select * from `inv_child` where invno='$invno'";
								//echo $sql;
								if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($data))
						{ 
							$srno=$srno+1;
							?>
	
											
											<tr style="color:black;text-align:right">
												<td style="color:black;border:1px;text-align:center"><?php echo $srno; ?></td>
												<td style="color:black;border:1px;text-align:center">
													<?php
							
							
												$descript=$row['descript'];
												$query1 = mysqli_query($con,"SELECT pname FROM prod_master where code=$descript");
												$results1 = mysqli_fetch_array($query1);
												$desc = $results1['pname']	;
												
												echo wordwrap($desc,30,"<br>\n"); 
													 $gstrate=$row['gstrate'];
													?>
												</td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['hsn']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['qty']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['size']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['rate']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['gstrate']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['gstamount']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['amount']; ?></td>
												
											</tr>
					 
					  <?php  }} ?>
								
								<tr>
								<td style="border:1px"></td>
									<td style="border:1px;text-align:right">CGST</td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px;text-align:center"><?php echo $cgst; ?></td>
								</tr>
								<tr>
								<td style="border:1px"></td>
									<td style="border:1px;text-align:right">SGST</td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px;text-align:center"><?php echo $sgst; ?></td>
								</tr>
								<tr>
								<td style="border:1px"></td>
									<td style="border:1px;text-align:right">IGST</td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px;text-align:center"><?php echo $igst; ?></td>
								</tr>
								<tr>
								<td style="border:1px"></td>
									<td style="border:1px;text-align:right">Round Off</td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px;text-align:center"><?php echo $round; ?></td>
								</tr>
								<tr>
								<td style="border:1px"></td>
									<td style="border:1px;text-align:right">Total</td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px;text-align:center"><?php echo $total; ?></td>
								</tr>
								<tr>
								
									
									<td colspan="8" style="text-align:right">E. & O.E.</td>
								</tr>
									</table>
							</td>
					</tr>
		
		<tr>
							<td colspan="3">
							<table   style="padding-top:15px">
								<tr>
									<td style="width:70px;border:1px;font-size:12px">HSN/SAC</td>
									<td style="width:100px;border:1px">Taxable Amount</td>
									<td style="width:120px;border:1px">
									<table>
										<tr>
											<td colspan="2" style="text-align:center;border:1px;width:120px;border-bottom:1px;border:none">CGST</td>
											<td></td>
										</tr>
										<tr>
											<td style="border-right:1px;width:60px;text-align:center">Rate</td>
											<td style="width:60px;text-align:center">Amount</td>
										</tr>
										</table>
									</td>
									<td style="width:120px;border:1px">
									<table>
										<tr>
											<td colspan="2" style="text-align:center;border:1px;width:120px;border-bottom:1px;border:none">SGST</td>
											<td></td>
										</tr>
										<tr>
											<td style="border-right:1px;width:60px;text-align:center">Rate</td>
											<td style="width:60px;text-align:center">Amount</td>
										</tr>
										</table>
									</td>
									<td style="width:120px;border:1px">
									<table>
										<tr>
											<td colspan="2" style="text-align:center;border:1px;width:120px;border-bottom:1px;border:none">IGST</td>
											<td></td>
										</tr>
										<tr>
											<td style="border-right:1px;width:60px;text-align:center">Rate</td>
											<td style="width:60px;text-align:center">Amount</td>
										</tr>
										</table>
									</td>
									<td style="width:104px;border:1px;text-align:center">Total</td>
								</tr>
								
								<?php 
								$srno=0;
								$sql="select * from `inv_child` where invno='$invno'";
								if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($data))
						{ 
							$srno=$srno+1;
							?>
								<tr>
									<td style="border:1px;text-align:center"><?php echo $row['hsn']; ?></td>
									<td style="border:1px;text-align:center"><?php echo $row['amount']; ?></td>
									<?php if($igst==""){if($gstrate>0){$cgst1=$row['amount']*9/100;}} ?>
									<?php if($igst==""){if($gstrate>0){$sgst1=$row['amount']*9/100; }}?>
									<?php if($igst<>""){if($gstrate>0){$igst1=$row['amount']*18/100;}}?>
									<?php 
										if($igst1==""){	
											if($gstrate>0){
										$ttl=$cgst1+$sgst1;}}
										else{
											if($gstrate>0){
										$ttl=$igst1;}
										}
									?>
									<td style="border:1px">
										<table style="text-align:center">
											<tr>
												<td style="width:60px">
										<?php if($igst=="") {if($gstrate>0){ echo "9%"; }}?></td>
												<td style="width:60px"><?php if($igst=="") { echo $cgst1; }?></td>
											</tr>
										</table>
									</td>
									<td style="border:1px"><table style="text-align:center">
											<tr>
												<td style="width:60px">
										<?php if($igst=="") {if($gstrate>0){ echo "9%"; }}?></td>
												<td style="width:60px"><?php if($igst=="") { echo $sgst1; }?></td>
											</tr>
										</table></td>
									<td style="border:1px"><table style="text-align:center">
											<tr>
												<td style="width:60px">
										<?php if($igst<>"") {if($gstrate>0){ echo "18%"; }}?></td>
												<td style="width:60px"><?php if($igst<>"") {echo $igst1; }?></td>
											</tr>
										</table></td>
									<td style="border:1px;text-align:center"><?php echo $ttl; ?></td>
								
								</tr>
								<?php }} ?>
								
							<tr>
								<td colspan="2" style="border:1px;text-align:right">Total</td>
								
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									
									<td style="border:1px;text-align:center"><?php echo $ttl; ?></td>
								</tr>
								<tr>
								<td colspan="2" style="border:1px;text-align:center">Amount (In Words)</td>
									<td colspan="4" style="border:1px;text-align:right"><?php echo getIndianCurrency($total); ?></td>
								</tr>
									</table>
							</td>
					</tr>
	<?php //echo numberTowords($total); ?>
					<tr>
						<td style="border:1px;width:365px;">
						<table >
							
							<tr>
								<?php if ($sez=="sez"){ ?>
								<td style="font-size:12px;">
									<!-- Company's UDYAM  : UDYAM-GJ-13-0010949<br>		
									Company's PAN :  AAHCN1060F<br>  			
									CIN : U63030GJ2020PTC115698<br>
									Tan : RKTN03552D<br> -->
									1.The Supply Made To SEZ Under<br>
									Letter of Undertaking And Without<br>
									Payment of IGST<br>
									2.LUT Bond No : AD240522003362R<br>
									Dated 09/05/2022 For F.Y.2022-23.<br>
									3.LUT Bond Validity upto 31.03.2023 <br>
									From The Date of Application<br>
									Declaration :<br>
									We declare that this invoice shows the actual price <br>of the Service described and that all particluars <br>are true and correct			

								</td>
								<?php } else { ?>
								<td>ACC No  : 029505504445<br>		
									IFSC :  AAHCN1060F<br>  			
									PAN No :  AAGCJ1183N<br>  			
									Declaration :<br>
									We declare that this invoice shows the actual price of the <br>Service described and that all particluars are true and correct			
</td>
								<?php } ?>
							</tr>
							</table>
						</td>
						<td style="width:360px;border:1px">
						<table>
							</table>
						</td>
						<!--<td style="width:130px;border:1px;text-align:right">
							
										<br><br><br><br><br><br>Naisha Empty Park Pvt Ltd<br><br><br><br>Authorized Signatory
						</td>-->
					</tr>
		
		
		<!--<tr>
									<td style="width:70px;font-size:11px;font-weight:bold;text-align:center"><div style="height:50px; overflow:hidden;padding-left:150px">This is Computer Generated Invoice.</div></td></tr>-->
	<tr>
									<td colspan="2" style="font-size:11px;width:160px;font-weight:bold;text-align:center;padding-left:50px">This is Computer Generated Invoice Hence Signature Not Required.</td></tr>
	</table>
		
	</body>
	
</html>

		<?php 

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


    $content = ob_get_clean();
//for($i=1; $i>=4; $i++){
	try {
    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
		//
	
    $html2pdf->output("Invoice.pdf");
		//
	//header('location:lrentry.php');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
		exit;
}
//}
?>
