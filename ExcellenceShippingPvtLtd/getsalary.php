<?php 
include ('config.php');
$empid=$_POST['emp_id'];
$month=$_POST['month'];
$ofstaffwdays=$_POST['wdays'];
$pdays=$_POST['pdays'];
$otdays=$_POST['otdays'];
//$qry2="select tprsnt from mattend where empcode='$empid'";
										   
			 $qry="SELECT distinct basic,hra,convey,oallow,total,emptype,tdsamt,canteen,bikedep,ptamt,pday,type From `emp_mst`,`mattend` where emp_mst.code='$empid' and mattend.empcode='$empid' and mattend.mnthyear='$month'";
//echo $qry;
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 $response=array();
				 					   while( $row = mysqli_fetch_array($data)){
										   $emptype=$row['emptype'];
										   $curmnth=date('Y-m',strtotime($month));
										   $lastdt=date('t',strtotime($month));
										   $frmdt=$curmnth.'-01';
										   $todt=$curmnth.'-'.$lastdt;
										   if($emptype=='Operation'){
										   		$wdays=date('t',strtotime($month)); //max days in current month.
										   }
										   else{
										   		$wdays=$ofstaffwdays;
										   }
										   $type=$row['type'];
										   if($type=='Per Day'){
										   $perday=$row['pday'];
										   $basic=round($perday*$pdays);
										   $otamt=round($perday*$otdays);
										   $total=$basic;
										$response[] = array("basic"=>$row['pday'],"hra"=>0,"convey"=>0,"oallow"=>0,"total"=>$total,"otamt"=>$otamt,"tds"=>$row['tdsamt'],"bikedep"=>$row['bikedep'],"canteen"=>$row['canteen'],"ptamt"=>$row['ptamt'],"msal"=>$row['pday']);  
										   }
									else{	   
										if($wdays==$pdays){	
									$basic=$row[0];
									
									$total=$row['total'];
									$otamt=round(($total*$otdays)/$wdays);
				 	$response[] = array("basic"=>$row[3],"hra"=>$row[4],"convey"=>$row[5],"oallow"=>$row[6],"total"=>$total,"otamt"=>$otamt,"tds"=>$row['tdsamt'],"bikedep"=>$row['bikedep'],"canteen"=>$row['canteen'],"ptamt"=>$row['ptamt'],"msal"=>$row['total']);
												}
							elseif($pdays<$wdays){
							$basic=$row[0];
							$hra=$row[1];
							$convey=$row[2];
							$oallow=$row[3];
							$total=$row[4];
								
							
							$basic1=round(($basic*$pdays)/$wdays);
							$hra1=round(($hra*$pdays)/$wdays);
							$convey1=round(($convey*$pdays)/$wdays);
							$oallow1=round(($oallow*$pdays)/$wdays);	
							
							$total1=$basic+$hra+$convey+$oallow;
							$otamt=round(($total*$otdays)/$wdays);	
						$response[] = array("basic"=>$basic,"hra"=>$hra,"convey"=>$convey,"oallow"=>$oallow,"total"=>$total1,"otamt"=>$otamt,"tds"=>$row['tdsamt'],"bikedep"=>$row['bikedep'],"canteen"=>$row['canteen'],"ptamt"=>$row['ptamt'],"msal"=>$row['total']);	
							}	  
								}
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>