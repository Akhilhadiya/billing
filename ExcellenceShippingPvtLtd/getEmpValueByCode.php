<?php 
include ('config.php');
$empid=$_POST['emp_id'];
$month=$_POST['month'];
$ofstaffwdays=$_POST['wdays'];
//$qry2="select tprsnt from mattend where empcode='$empid'";
										   
			 $qry="SELECT distinct empname,branch,desig,basic,hra,convey,oallow,total,pf,tds,bikedep,canteen,tprsnt,pmode,type,pday,emptype ,tdsamt,ptamt From `emp_mst`,`mattend` where emp_mst.code='$empid' and mattend.empcode='$empid' and mattend.mnthyear='$month'";
//echo $qry;
			 if(mysqli_query($con,$qry)){
						$data =mysqli_query($con,$qry);
				 $response=array();
				 					   while( $row = mysqli_fetch_array($data)){
										   $desig=$row[2];
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
										   $sql="select designation from desig_mst where code='$desig'";
										   $sql=mysqli_query($con,$sql);
										   $ans=mysqli_fetch_array($sql);
										   $designame=$ans[0];
										   $type=$row[14];
										   $presentdays=$row[12];
										   $q1="select count(*) from empentry where ecode='$empid' and `dt` between '$frmdt' and '$todt' and otstatus='Approved'"; // to fetch the OT DAYS FROM EMPLOYEE ENTRY
										   $q1=mysqli_query($con,$q1);
										   $r1=mysqli_fetch_array($q1);
										   $otdays=$r1[0];
										   if($type=='Per Day'){
										   $perday=$row[15];
										   $prdays=$row[12];
										   $basic=round($perday*$prdays);
										   $total=$basic;
										   $otamt=round($perday*$otdays);
										   
											 				 		$response[] = array("empname"=>$row[0],"branch"=>$row[1],"desig"=>$designame,"basic"=>$row['basic'],"hra"=>0,"convey"=>0,"oallow"=>0,"total"=>$total,"pf"=>$row[8],"tds"=>$row['tdsamt'],"bikedep"=>$row['bikedep'],"canteen"=>$row['canteen'],"pdays"=>$row[12],"pmode"=>$row[13],"otdays"=>$otdays,"otamt"=>$otamt,"ptamt"=>$row['ptamt'],"msal"=>$row['total']);  
										   }
									else{	   
										if($wdays==$presentdays){	
									$basic=$row[3];
									$total=$row[7];
									$otamt=round(($total*$otdays)/$wdays);
									
				 		$response[] = array("empname"=>$row[0],"branch"=>$row[1],"desig"=>$designame,"basic"=>$row[3],"hra"=>$row[4],"convey"=>$row[5],"oallow"=>$row[6],"total"=>$total,"pf"=>$row[8],"tds"=>$row['tdsamt'],"bikedep"=>$row['bikedep'],"canteen"=>$row['canteen'],"pdays"=>$row[12],"pmode"=>$row[13],"otdays"=>$otdays,"otamt"=>$otamt,"ptamt"=>$row['ptamt'],"msal"=>$row['total']);
												}
							elseif($presentdays<$wdays)	{
							$pdays=$row[12];
							$basic=$row[3];
							$hra=$row[4];
							$convey=$row[5];
							$oallow=$row[6];
							$total=$row[7];
								
							
							$basic1=round(($basic*$pdays)/$wdays);
							$hra1=round(($hra*$pdays)/$wdays);
							$convey1=round(($convey*$pdays)/$wdays);
							$oallow1=round(($oallow*$pdays)/$wdays);	
							
							$total1=$basic1+$hra1+$convey1+$oallow1;
							$otamt=round(($total*$otdays)/$wdays);	
							$response[] = array("empname"=>$row[0],"branch"=>$row[1],"desig"=>$designame,"basic"=>$basic,"hra"=>$hra,"convey"=>$convey,"oallow"=>$oallow,"total"=>$total1,"pf"=>$row[8],"tds"=>$row['tdsamt'],"bikedep"=>$row['bikedep'],"canteen"=>$row['canteen'],"pdays"=>$row[12],"pmode"=>$row[13],"otdays"=>$otdays,"otamt"=>$otamt,"ptamt"=>$row['ptamt'],"msal"=>$row['total']);	
							}	  
								}
									   }
			echo json_encode($response);	 
			  
			 }
			 ?>