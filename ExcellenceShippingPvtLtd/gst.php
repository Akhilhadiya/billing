<?php 
include ("config.php");
			$desc=$_POST['desc1'];
//$cktid="0987";
			 $qry="SELECT cgst,sgst From prod_master where pname='$desc'";
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
					    $row = mysqli_fetch_array($data);
						$cgst=$row[0];
				 		$sgst=$row[1];
				 $gstrate=$cgst+$sgst;
				echo $gstrate;
			 }

				 

			 ?>