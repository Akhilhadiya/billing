<?php 
include ("config.php");
			$desc=$_POST['desc1'];
	
			 $qry="select `pname` from `prod_master` where `pname` LIKE '%".$desc."%'  order by `pname` asc ";
			 $result=mysqli_query($con,$qry);
						
			$response = array();


				 while ($row = mysqli_fetch_array($result))
				{
					$response[] = array("key"=>$row[0]);
				
				 
			  }
					    
 echo json_encode($response);


exit;

?>