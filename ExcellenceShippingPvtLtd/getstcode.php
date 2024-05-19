<?php 
include ("config.php");
			$billto=$_POST['billto'];
//$cktid="0987";
$stcode="";
			 $qry="SELECT `stcode` From `cust_master` where `name`='$billto'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
					    $row = mysqli_fetch_array($data);
				if(is_null($row)){}
				 else
				{	
					 $stcode=$row[0]; 
				//	 echo $hsn1;}
			 }
			 }	 
		 //$hsn1=$row[0]; 
			 	echo $stcode;
			 
			 
?>