<?php
session_start();
$year=$_SESSION['jsyear'];

if($year=='2023-2024'){
define('DB_SERVER','dbm.mksoftservice.com');
define('DB_USER','excelsiorschool');
define('DB_PASS' ,'rapy6uzy4');
define('DB_NAME', 'dbserver_excelsiorschool');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
}
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>