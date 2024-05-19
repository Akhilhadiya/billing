<?php 
include ("config.php");
$contno=$_POST['contno'];
			 $qry="SELECT * From gatepass where cont1='$contno' or cont2='$contno'";
			 if(mysqli_query($con,$qry)){
				$data =mysqli_query($con,$qry);
				 	$response=array();
				  while($row = mysqli_fetch_array($data)){
					  	$cont1=$row['cont1'];
						$cont2=$row['cont2'];
					  	if($cont1==$contno){
						$size=$row['size1'];
						$type=$row['type1'];
						}
					  	if($cont2==$contno){
						$size=$row['size2'];
						$type=$row['type2'];
						}
					  	$linecode=$row['line'];
					  	$qr=mysqli_query($con,"select `line name` from line_mst where code='$linecode'");
					  	$res=mysqli_fetch_array($qr);
						   $line=$res['line name'];
						$response[] = array("dt"=>$row['dt'],"time"=>$row['time'],"line"=>$line,"size"=>$size,"type"=>$type,"linecode"=>$linecode);
						 }
				  
			echo json_encode($response);	 
			  
			 }
			 ?>
