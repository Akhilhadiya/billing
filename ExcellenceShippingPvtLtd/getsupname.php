<?php 
include ("config.php");
			$pono=$_POST['pono'];
//$cktid="0987";
				 $qry1="SELECT total from `poentry` where pono='$pono'";
				 if(mysqli_query($con,$qry1)){
					 
						$data1 =mysqli_query($con,$qry1);
					    $row1 = mysqli_fetch_array($data1);

						// $supname=$row1[0];
					 	$total=$row1[0];
				//echo $supname; 
					 echo $total;
			  
				 } 		

?>