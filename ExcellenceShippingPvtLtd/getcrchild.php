<?php 
include ("config.php");
			$invno=$_POST['invno'];
//$invno="NEP/2021-22/066";
			 $qry="SELECT `descript`,`hsn`,`qty`,`rate`,`gstrate`,`gstamount`,`amount` From `inv_child` where `invno`='$invno'";
//echo $qry;
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 	 $response=array();
				 	 while( $row = mysqli_fetch_array($data)){
						 $descript=$row[0];
				 	$qr=mysqli_query($con,"select pname from `prod_master` where code='$descript'");
						 $res=mysqli_fetch_array($qr);
						 $descript=$res['pname'];
				 		$response[] = array("desc"=>$descript,"hsn"=>$row[1],"qty"=>$row[2],"rate"=>$row[3],"gstrate"=>$row[4],"gstamount"=>$row[5],"amount"=>$row[6]);
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>