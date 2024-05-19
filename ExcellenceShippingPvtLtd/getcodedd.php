<?php 
include ("config.php");
	$empc=$_POST['empc'];
			 $qry="SELECT empname,Desig,Dept From emp_mst where code='$code'";
				if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 $response=array();
				 					   while( $row = mysqli_fetch_array($data)){
										  
				 		$response[] = array("empname"=>$row['name'],"Desig"=>$row['dsg'],"Dept"=>$row['dept']);
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>

