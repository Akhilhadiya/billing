<?php 
include ('config.php');
$item=$_POST['desc'];

$qry="SELECT hsn,cgst,sgst,igst From prod_master where code='$item'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 $response=array();
				 					   while( $row = mysqli_fetch_array($data)){
										 
				 		$response[] = array("hsn"=>$row[0],"cgst"=>$row[1],"sgst"=>$row[2],"igst"=>$row[3]);
										 
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>