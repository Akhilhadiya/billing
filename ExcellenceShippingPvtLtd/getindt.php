<?php 
include ("config.php");
			$contno=$_POST['contno'];
//$cktid="0987";
			 $qry="SELECT * From `gatepass` where cont1='$contno' or cont2='$contno'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
					    $row = mysqli_fetch_array($data);
				 		$indt=$row['dt'];
						
			  }
$response[]=array("indt"=>$row['dt']);
		    
 echo json_encode($response);
	 ?>