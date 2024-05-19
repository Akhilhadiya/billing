<?php 
include ("config.php");
			$contno=$_POST['contno'];
//$cktid="0987";
			 $qry="SELECT * From `contstatus` where contno='$contno'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
					    $row = mysqli_fetch_array($data);
				 		$appdt=$row[2];
						$estamt=$row[3];
						$appamt=$row[4];
						$repairdt=$row[5]; 
						$status=$row[6];
				 		if($status==""){
						$qry2=mysqli_query($con,"select *  from gatepass where cont1='$contno' or cont2='$contno'");
							$data=mysqli_fetch_array($qry2);
							$container1=$data['cont1'];
							$container2=$data['cont2'];
							if($container1==$contno){
							$status=$data['status1'];	
							}
							elseif($container2==$contno){
							$status=$data['status2'];
							}
						}
				 		$alloteddt=$row[7];
							$remark=$row[8];
							$dmgcondition=$row[9];
				 		$shipper=$row[10];
				 $code=$row['code'];
			  }
$response[]=array("appdt"=>$row[2],"estamt"=>$row[3],"appamt"=>$row[4],"repairdt"=>$row[5],"status"=>$status,"alloteddt"=>$row[7],"remark"=>$row[8],"dmgcondition"=>$row[9],"shipper"=>$row[10],"code"=>$row['code']);
				
				 
			  
					    
 echo json_encode($response);
	 ?>