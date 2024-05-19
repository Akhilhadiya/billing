<?php 
include ("config.php");
			$pono=$_POST['pono'];
//$cktid="0987";
			 $qry="SELECT work,cat,unit,qty,rate,amt,rem From `pochild` where pono='$pono'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 $response=array();
				 					   while( $row = mysqli_fetch_array($data)){
				 		//$code=2;
				 		$work=$row[0];
						$cat=$row[1];
						$unit=$row[2];
						$qty=$row[3]; 
						$rate=$row[4];
				 		
							$amt=$row[5];
							$rem=$row[6];
				 
				 
			  
				 		$response[] = array("work"=>$row[0],"cat"=>$row[1],"unit"=>$row[2],"qty"=>$row[3],"rate"=>$row[4],"amt"=>$row[5],"rem"=>$row[6]);
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>