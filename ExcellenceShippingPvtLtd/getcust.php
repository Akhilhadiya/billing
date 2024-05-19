<?php 
session_start();
define('DB_SERVER','dbm.mksoftservice.com');
define('DB_USER','jshipping');
define('DB_PASS' ,'ynaze7yna');
define('DB_NAME', 'dbserver_jagwanishipping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$email=$_POST['email'];
$qry="SELECT name From cust_master where email='$email' or aemail='$email' or oemail='$email'";

if(mysqli_query($con,$qry)){
				$data =mysqli_query($con,$qry);
				 $response=array();
				 while( $row = mysqli_fetch_array($data)){
					$response[] = array("name"=>$row[0]);
									   }
				
			echo json_encode($response);
}
			 ?>