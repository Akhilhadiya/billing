<?php 
include ("config.php");
			$desc=$_POST['desc1'];
//$cktid="0987";
$hsn1="";
			 $qry="SELECT `hsn` From `prod_master` where `pname`='$desc'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
					    $row = mysqli_fetch_array($data);
				if(is_null($row)){}
				 else
				{	
					 $hsn1=$row[0]; 
				//	 echo $hsn1;}
			 }
			 }	 
		 //$hsn1=$row[0]; 
			 	echo $hsn1;
			 
			 
?>