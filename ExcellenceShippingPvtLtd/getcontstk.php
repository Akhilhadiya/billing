<?php 
include ("config.php");

			 $qry="SELECT distinct contno From stk_ac where `add`='1' order by contno";
			 if(mysqli_query($con,$qry)){
				$data =mysqli_query($con,$qry);
				 	$response=array();
				// $qry2=mysqli_query($con,"select distinct code,`line name` from line_mst order by `line name`");
				 
				 while($row = mysqli_fetch_array($data)){
					 /* while($row2=mysqli_fetch_array($qry2)){
				 $code=$row2[0];
				 $line=$row2[1];
					  }*/
						$response[] = array("contno"=>$row[0]);
						 
				 } 					
			echo json_encode($response);	 
			  
			 }
			 ?>
