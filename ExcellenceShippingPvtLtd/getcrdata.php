<?php 
include ("config.php");
			$invno=$_POST['invno'];
//$invno="NEP/2021-22/066";
			 $qry="SELECT `dt`,`billto`,`delnote`,`mode`,`ship`,`oref`,`bookno`,`bdt`,`disp`,`dest`,`delterms`,`cgst`,`sgst`,`igst`,`round`,`total`,`txamt`,`cper`,`sper`,`iper` From `inv_main` where `invno`='$invno'";
//echo $qry;
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 	 $response=array();
				 	 while( $row = mysqli_fetch_array($data)){
						 $billto=$row[1];
				 	$qr=mysqli_query($con,"select name from `cust_master` where code='$billto'");
						 $res=mysqli_fetch_array($qr);
						 $billto=$res['name'];
				 		$response[] = array("invdt"=>$row[0],"billto"=>$billto,"delnote"=>$row[2],"mode"=>$row[3],"ship"=>$row[4],"oref"=>$row[5],"bookno"=>$row[6],"bdt"=>$row[7],"disp"=>$row[8],"dest"=>$row[9],"delterms"=>$row[10],"cgst"=>$row[11],"sgst"=>$row[12],"igst"=>$row[13],"round"=>$row[14],"total"=>$row[15],"txamt"=>$row[16],"cper"=>$row[17],"sper"=>$row[18],"iper"=>$row[19]);
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>