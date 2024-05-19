<?php 
include ("config.php");
			$line=$_POST['line'];

$sql="select code from line_mst where `line name`='$line' ";
//echo $sql;
$datal=mysqli_query($con,$sql);
$rowl=mysqli_fetch_array($datal);
			$qry2= "SELECT contno FROM `stk_ac` WHERE line='$rowl[0]' group by contno having sum(cast( `add` as decimal)-cast(`less` as decimal))>0 ";
//echo $qry2;
			 $response=array();				
			//echo $qry2;
			 if(mysqli_query($con,$qry2)){
				 $data =mysqli_query($con,$qry2);
				
				 
				 while($row = mysqli_fetch_array($data)){
					$container1=$row['contno'];
					
					$response[] = array("contno"=>$container1);
					
					}
				 }
				echo json_encode($response);	 
			  
			 
			 ?>