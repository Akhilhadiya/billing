<?php
if(isset($_GET['delete'])){
		 include('config.php');
			$code = $_GET['delete'];
			$rcode= substr($code,13,3);
			mysqli_query($con,"Delete from pinv_main where invno='$code'");
			mysqli_query($con,"Delete from pinv_child where invno='$code'");
		
				header("location: pinvoice-search.php");
}
?>