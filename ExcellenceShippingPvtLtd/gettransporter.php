<?php 
include ("config.php");
			$transporter=$_POST['transporter[]'];
	
			 $qry="select `name` from `transport_mst` where `name` LIKE '%".$transporter."%'  order by `name` asc ";
			 $result=mysqli_query($con,$qry);
						
			$response = array();


				 while ($row = mysqli_fetch_array($result))
				{
					$response[] = array("key"=>$row[0]);
				
				 
			  }
					    
 echo json_encode($response);


exit;

?>