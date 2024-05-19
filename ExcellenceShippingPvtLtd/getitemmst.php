<?php 
include ("config.php");

			 $qry="SELECT code,pname From prod_master";
			 if(mysqli_query($con,$qry)){
				$data =mysqli_query($con,$qry);
				$response=array();
				while( $row = mysqli_fetch_array($data)){
					$response[] = array("code"=>$row[0],"item"=>$row[1]);
					}
				echo json_encode($response);	 
			 }
			 ?>