<?php


//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once '../admintemplate/vendor3/autoload.php';
ob_start();
include('config.php');
session_start();

//$_SESSION['var']='print';
$username=$_SESSION['jsname'];
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
										$query = mysqli_query($con,"SELECT * FROM cust_master where code='$billto'");
										$results = mysqli_fetch_array($query);
										$bcode = $results['name'];
										$bgstin=$results['gstin'];
										$bstate=$results['state'];
										$bstcode=$results['stcode'];
										$bemail=$results['email'];
										$bcity=$results['city'];
										$badrs=$results['adrs'];
										$ship=$row['ship'];
										$query2 = mysqli_query($con,"SELECT * FROM party_mst where code='$ship'");
										$results2 = mysqli_fetch_array($query2);
										$scode = $results2['name'];
										$sgstin=$results2['gstin'];
										$sstate=$results2['state'];
										$sstcode=$results2['stcode'];
										$semail=$results2['email'];
										$scity=$results2['city'];
										$sadrs=$results2['adrs'];	
	
										$etd=$row['etd'];
										$eta=$row['eta'];
										$hblno=$row['hblno'];
										$mblno=$row['mblno'];
										$contlot=$row['contlot'];
										$exrate=$row['exrate'];
										$cgst=$row['cgst'];
										$sgst=$row['sgst'];
										$igst=$row['igst'];
										$round=$row['round'];
										$total=$row['total'];
										$txamt=$row['txamt'];
										$cper=$row['cper'];
	$pol=$row['pol'];
	$pod=$row['pod'];
	$sper=$row['sper'];
	$iper=$row['iper'];
	$sez=$row['sez'];
	$irnno=$row['irnno'];
	$ackno=$row['ackno'];
	$ackdt=$row['ackdt'];
	$usdtamt=$row['usdtamt'];
									}
else{echo "not working";}


 


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
//echo getIndianCurrency(50000);
	?>
<!DOCTYPE HTML>
<html lang="en">
	<style>
  table{
	  
   	  height: 620px;
        width:580px;
        border:1px solid black;
	    border-collapse:collapse;
	 
  }
		
	.vertical-text {
	transform: rotate(270deg);
	transform-origin: left top 0;
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
	<head>
    <style>
    /* Page margins are defined using CSS */
    @page {
      margin: 1cm;
      margin-top:2.5cm;
      margin-bottom: 2.5cm;

    /* Header frame starts within margin-top of @page */
      @frame header {
      -pdf-frame-content: headerContent; /* headerContent is the #id of the element */
      top: 1cm;
      margin-left: 2cm;
      margin-right:2cm;
      height:1cm;
      }

    /* Footer frame starts outside margin-bottom of @page */
      @frame footer {
        -pdf-frame-content: footerContent;
        bottom: 2cm;
        margin-left: 1cm;
        margin-right: 1cm;
        height: 1cm;
      }
    }
    </style>
    </head>
	<body>
		<!--<link href="https://fonts.googleapis.com/css?family=Times New Roman" rel="stylesheet">-->
		
	<table border="1">
		
		<tr>
			<td colspan="2">
				<table>
					<!--<tr>
						<td style="width:40px;padding-bottom:0px;margin-bottom:0px" valign="top"><img src="images/anshikalogo.jpeg" style="height:120px;width:170px"></td>
						<td  style="width:300px;text-align:center;margin-bottom:0px;padding-bottom:0px;font-size:15px;font-weight:bold"><span style="font-weight:bold;font-size:22px;text-decoration:underline;">ANSHIKA SHIPPING AGENCY</span><br><br><span style="font-size:11px">Assistant Regional Transport Office Gandhidham, House No 25,Survey No 176, Mangalam Society, RTO Office Road, MeghparBorichi, Gandhidham, Kachchh, Gujarat, 370230</span><br>
Mobile No.  +91 90812 96555,GSTIN.: 24BGGPC2142E1Z5,<br>Email: anshikashippingagency57@gmail.com</td>
					
					</tr>-->
					<tr>
						<td style="width:120px;padding-bottom:0px;margin-bottom:0px" valign="top"><img src="jsimg/jagwanibg.png" style="height:135px;width:170px;"></td>
						<!--<td style="width:300px"><img src="jsimg/jagwanibg.png" style="height:70px;width:500px;margin-left:30px"><br><span style="margin-left:90px;font-size:15px;font-weight:bold">CUSTOM CLEARANCE & FREIGHT FORWARDING</span><br><span style="margin-left:110px"><b>PAN No:</b>BGGPC2142E <b>, GSTIN:</b> 24BGGPC2142E1Z5</span></td>-->
						<td  style="width:360px;padding-left:20px;margin-bottom:0px;padding-top:5px;font-size:15px;font-weight:bold;text-align:center;"><span style="font-weight:bold;font-size:17px;color:black;text-align:center;">JAGWANI SHIPPING PRIVATE LIMITED</span><br><span style="font-weight:normal;font-size:11px;color:black;margin-top:5px;text-align:center;"> Plot No 592 Ward 12C, Office No 2, 2nd Floor, Ganesh Building, Lilashah Circle, Old Police Station near, Ward 12C, Gandhidham,Kachchh, Gujarat, 370201.<br><b>Mobile No.</b>  +91 90812 96555,<br><b>Email:</b> accounts@jagwani.org</span><br><span style="font-weight:bold;font-size:13px;color:black;margin-top:15px">TAX INVOICE<br>(Original For Recepient)</span></td>
						<td style="width:90px;padding-bottom:0px;margin-bottom:0px" valign="top"></td>
						
					</tr>
				
				</table>
				<table>
					<tr>
						<td style="width:350px;border:1px">
							
							<table>
							<tr>
									<td colspan="2" style="border-bottom:0px;text-align:left;font-size:12px;width:362px;height:15px;"><b>Invoice No </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $invno; ?></td></tr>	
								<tr>
									<td colspan="3" style="border-bottom:0px;text-align:left;font-size:12px;width:220px;height:15px;"><b>Date </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $dt; ?></td></tr>	
								<tr>
									<td colspan="3" style="border-bottom:0px;text-align:left;font-size:12px;width:220px;height:15px;"><b>POD </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $pod; ?></td></tr>
							
								<tr>
									<td colspan="3" style="border-bottom:0px;text-align:left;font-size:12px;width:220px;height:15px;"><b>POL</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $pol; ?></td></tr>
								<tr>
									<td colspan="2" style="border-bottom:0px;text-align:left;font-size:12px;width:230px;height:5px;"><b>Shipping Line </b>&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ship; ?></td></tr>
								<tr>
								<td colspan="3" style="width:230px;height:1px;text-align:left;font-size:12px;"><b>ETA </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $eta; ?></td>
										
								</tr>
								
							
							</table>
						</td>
						<td style="width:350px;border:1px">
						<table >
							
							<tr>
									<td colspan="2"  style="border-bottom:0px;text-align:left;font-size:12px;width:335px;height:5px;"><b>ETD </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $etd; ?></td></tr>
									<tr>
									<td colspan="2" style="border-bottom:0px;text-align:left;font-size:12px;width:350px;height:15px;"><b>HBL No. </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hblno; ?></td>
									</tr>
								<tr>
									<td colspan="2" style="border-bottom:0px;text-align:left;font-size:12px;width:230px;height:15px;"><b>MBL No.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $mblno; ?></td></tr>
							<tr>
								
									<td colspan="2" style="border-bottom:0px;border-right:0px;text-align:left;font-size:12px;width:150px;height:15px;"><b>Container LOT</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $contlot; ?></td></tr>
							<tr>
									<td colspan="2" style="width:145px;border-bottom:0px;text-align:left;font-size:12px;height:15px"><b>Exchange Rate</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $exrate; ?></td>
								</tr>
							
							</table>
						</td>
					
					</tr>
				
					<tr>
						<td style="width:170px;border:1px;font-weight:bold;font-size:13px;text-align:center;">BILL TO :</td>
						<td style="border:1px;width:170px;font-weight:bold;font-size:13px;text-align:center;">SHIP TO :</td>
					</tr>
					<tr>
						<td style="border:1px;width:350px;border-bottom:none">
						<table>
							<tr>
								<td style="font-size:12px;">
								<span style="font-weight:bold;font-size:12px"><?php echo wordwrap($bcode,23,"<br>\n"); ?></span><br>
								<?php
									echo wordwrap($badrs,35,"<br>\n");
									//$newadrs = wordwrap($adrs,8,"\n",true);
									//	echo "$newadrs\n";
								?><br>
								<b>City:</b> <?php echo $bcity ?><br>
									<b>GSTIN/UN :</b> <?php echo $bgstin; ?>	<br>
                                     <b>State Name : </b><?php echo $bstate; ?><br>
							         <b>Code :</b> <?php echo $bstcode; ?><br>
									<b>E-Mail:</b> <?php echo wordwrap($bemail,35,"<br>\n"); ?>		
								</td>
							</tr>
							</table>
						</td>
						<td style="width:350px;border:1px;border-bottom:none">
						<table>
							<tr>
								<td style="font-size:12px;">
								<span style="font-weight:bold;font-size:12px"><?php echo wordwrap($scode,23,"<br>\n"); ?></span><br>
								<?php
									echo wordwrap($sadrs,35,"<br>\n");
									//$newadrs = wordwrap($adrs,8,"\n",true);
									//	echo "$newadrs\n";
								?><br>
								<?php echo $scity ?><br>
									<b>GSTIN/UN : </b><?php echo $sgstin; ?>	<br>
									<b>State Name : </b><?php echo $sstate; ?><br>
									<b>Code :</b> <?php echo $sstcode; ?>		<br>
									<b>E-Mail: </b><?php echo wordwrap($semail,35,"<br>\n"); ?>		
								</td>
							</tr>
							</table>
						</td>
					</tr>
				</table>			
			</td>
		</tr>
		<tr>
							<td colspan="3">
								<div style="background: url(http://mksoftservice.com/Jagwani-Shipping/jsimg/jslogo3.jpeg);background-repeat:no-repeat;background-size:cover;background-position:145px;" class="bg">
							<table>
								<tr>
									<td style="width:30px;border:1px;text-align:center;font-size:12px;font-weight:bold">Sr<br>No</td>
									<td style="width:280px;border:1px;text-align:center;font-weight:bold;padding-top:7px;font-size:12px;">Description of Goods</td>
									<td style="width:90px;border:1px;text-align:center;font-weight:bold;padding-top:7px;font-size:12px;">HSN/SAC</td>
									<td style="width:70px;border:1px;text-align:center;font-weight:bold;padding-top:7px;font-size:12px;">Qty</td>
									<td style="width:37px;border:1px;text-align:center;font-weight:bold;padding-top:7px;font-size:12px;">Size</td>
									<td style="width:70px;border:1px;text-align:center;font-weight:bold;padding-top:7px;font-size:12px;">Rate</td>
									<td style="width:100px;border:1px;text-align:center;font-weight:bold;padding-top:7px;font-size:12px;">Amount</td>
								</tr>
								<?php 
								$srno=0;
								$sql="select * from `inv_child` where invno='$invno'";
								//echo $sql;
								//$tqty=0;
								//$total=0.00;
								//$cgst=0;
								//$sgst=0;
								//$igst=0;
								$height=290;
								if(mysqli_query($con,$sql)){
						$data =mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($data))
									//for($i=0;$i<12;$i++)
						{ 
							$cper=$row['cgst'];
							$sper=$row['sgst'];
							$iper=$row['igst'];
							
							
							?>
	
											
											<tr style="color:black;text-align:right;vertical-align:top;">
												<td style="width:30px;border:1px;height:12px;text-align:center"><?php echo $srno=$srno+1; ?></td>
												<td style="color:black;border:1px;text-align:center">
													<?php
												$dcode=$row['descript'];
												$query1 = mysqli_query($con,"SELECT pname FROM prod_master where code='$dcode'");
												$results1 = mysqli_fetch_array($query1);
												$desc = $results1['pname'];
												
												echo wordwrap($desc,35,"<br>\n"); 
													 //$gstrate=$row['gstrate'];
													?>
												</td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['hsn']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['qty']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['size']; ?></td>
												<td style="color:black;border:1px;text-align:center"><?php echo $row['rate']; ?></td>
												
												<td style="color:black;border:1px;text-align:center"><?php echo $row['amount']; ?></td>
												
											</tr>
					 
					  <?php 
						$height=$height-12;
						$tqty=$tqty+$row['qty'];
						$total=$total+$row['total'];
						$cgst=$cgst+$row['camt'];
						$sgst=$sgst+$row['samt'];
						$igst=$igst+$row['iamt'];
						}} 
								
							$txamat=$cgst+$sgst+$igst;	?>
								<tr >
									<td style="border:1px;height:<?php echo $height; ?>"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
								</tr>
							
								<tr>
									
									<td style="border:1px;text-align:center;font-size:12px;font-weight:bold" colspan="2">Total</td>
									<td style="border:1px" colspan="1"></td>
									<td style="border:1px;text-align:center"><?php echo $tqty; ?></td>
									<td style="border:1px"></td>
									<td style="border:1px"></td>
									<td style="border:1px;text-align:center"><?php echo $txamt; ?></td>
								</tr>
								<tr>
									
									<td style="border:0px;font-size:12px;" colspan="6"><b>Amount In Words :</b> &nbsp;&nbsp;<?php echo getIndianCurrency($total); ?></td>
								</tr>
									</table>
								</div>
							</td>
					</tr>
	
	<?php //echo numberTowords($total); ?>
					<tr>
						<td style="border:1px;width:180px;">
						<table>
							
							<tr>
								<td style="font-size:12px;border-bottom:0px;text-align:left;width:343px">
									<b>Bank Details</b></td>
							</tr>
							<tr>
								<td style="font-size:11px;border-bottom:0px;width:340px">
									<b>Bank Name:</b> ICICI BANK

								</td></tr>
							<tr>
								<td style="font-size:11px;border-bottom:0px;width:340px">
									<b>Bank A/c:</b> 025905504084 ,<b>TYPE:</b> CURRENT ACCOUNT

								</td></tr>
							<tr>
								<td style="font-size:11px;border-bottom:0px;width:340px;">
									<b>Bank IFSC:</b>  ICIC0000259,<b>BRANCH:</b> GANDHIDHAM

								</td></tr>
							<tr>
								<td style="font-size:11px;border-bottom:0px;text-align:left;width:340px;padding-top:10px">
									<b>Terms & Conditions</b>

								</td></tr>
							<tr>
								<td style="font-size:9px;border-bottom:0px;width:340px">
									Kindly Deduct TDS Including GST On Total Bill Amount.</td>
							</tr>
							<tr>
								<td style="font-size:9px;border-bottom:0px;width:340px">Any Discrepancies in the Bill Should be notified to us within 7 Days from the Date of Issue of the Invoice,Otherwise it will be presumed that the amount charged in the Bill is Correct & accepted at your end.
								</td></tr>
							<tr>
								<td style="font-size:9px;border-bottom:0px;width:340px">Payments must be received within the 7 Days, failing which is liable to Interest @ 18% per Annum.</td></tr>
							<tr>
								<td style="font-size:9px;width:340px;border-bottom:0px">Invoice is under Subject to GANDHIDHAM jurisdiction.</td></tr>
							</table>
						</td>
						<td border="1"style="width:350px;border:1px">
					
						<table style="margin-top:-40px">
							<tr>
								<td style="border:1px;border-top:none;width:262px;text-align:center;height:0px;">Total Amount Before Tax</td>
								<td style="border:1px;border-top:none;text-align:center;width:100px"><?php echo $txamt; ?></td>
							</tr>
							<tr>
								<td style="border:1px;width:250px;text-align:center">Add: CGST@ <?php echo $cper; ?></td>
								<td style="border:1px;text-align:center;width:100px"><?php echo round($cgst,3); ?></td>
							</tr>
							<tr>
								<td style="border:1px;width:250px;text-align:center">Add: SGST@ <?php echo $sper; ?></td>
								<td style="border:1px;text-align:center;width:100px"><?php echo round($sgst,3); ?></td>
							</tr>
							
							<tr>
								<td style="border:1px;width:250px;text-align:center">Add: IGST@ <?php echo $iper; ?></td>
								<td style="border:1px;text-align:center;width:100px"><?php echo round($igst,3); ?></td>
							</tr>
							<tr>
								<td style="border:1px;width:250px;text-align:center;">Round Off</td>
								<td style="border:1px;text-align:center;width:100px"><?php echo $round; ?></td>
							</tr>
							
							<tr>
								<td style="border:1px;width:250px;height:15px;text-align:center;">Total Amount After Tax</td>
								<td style="border:1px;text-align:center;width:100px"><?php echo $total; ?></td>
							</tr>
							<tr>
								<td style="width:250px;" colspan="2"><!--<img src="images/asasign.jpg" style="margin-left:95px;height:65px;width:280px;margin-top:4px">--></td>
							</tr>
							<!--<tr>
								<td style="width:250px;text-align:center" colspan="2">For, Anshika Shipping Agency</td>
								
							</tr>
							<tr>
								<td style="text-align:center;width:250px;padding-top:25px" colspan="2">Authorised Signatory</td>
								
							</tr>-->
							</table>
						</td>
						<!--<td style="width:130px;border:1px;text-align:right">
							
										<br><br><br><br><br><br>Naisha Empty Park Pvt Ltd<br><br><br><br>Authorized Signatory
						</td>-->
					</tr>
			<tr>
				<td colspan="2" style="font-size:12px;text-align:center;font-weight:bold;">THANKS FOR BUSINESS WITH US !</td>
			</tr>
		
		<!--<tr>
									<td colspan="2" style="width:70px;font-size:11px;font-weight:bold;text-align:center"><div style="height:50px; overflow:hidden;padding-left:150px">This is Computer Generated Invoice.</div></td></tr>-->
		<!--OLD ADDRESS : Assistant Regional Transport Office Gandhidham, House No 25,Survey No 176, Mangalam Society, RTO Office Road, Meghpar Borichi, Gandhidham, Kachchh, Gujarat, 370230							-->

		
		
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
    $html2pdf = new Html2Pdf('P', 'A4', 'fr',10,10,10,10);
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
