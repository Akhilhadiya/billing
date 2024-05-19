<?php 
include ("config.php");
			$month=$_POST['month'];
			 $qry="SELECT paidstatus From `salary-sheet` where month='$month'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 		$response=array();
				 		while( $row = mysqli_fetch_array($data)){
							$status=$row[0];
							$response[] = array("status"=>$status);
						  }
			 		}
					if($status==''){
						$response[]=array("status"=>"not found");
					}
					echo json_encode($response);	 
			  
			 ?>