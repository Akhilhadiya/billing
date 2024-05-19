<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
}
include('header.php');
include('sidemenu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Proforma Invoice Entry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:rgb(40,73,7);">Home</a></li>
              <li class="breadcrumb-item" >Proforma Invoice Entry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
           
                      <!-- Horizontal Form -->
            <div class="card">
              <div class="card-header"  style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title" style="black">Proforma Invoice Entry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formfield" action="perinvsave.php">
				  <?php
											include('config.php');
					/*$query = mysqli_query($con,"SELECT MAX( cast( substr(invno,13,3) as decimal)) as invno1 FROM inv_main");
	$results = mysqli_fetch_array($query);
	$cur_auto_id1 = $results['invno1'] + 1;		
				  
				  $clen=strlen($cur_auto_id1);
				  //echo $clen;
				  if($clen=='1'){
				  $ad='00';
				  }
				  elseif($clen=='2'){
				  $ad='0';
				  }else{$ad="";}*/
				  $query = mysqli_query($con,"SELECT MAX(code) as invno1 FROM autopinv where unm='$username'");
	$results = mysqli_fetch_array($query);
	$invno = $results['invno1']+1;		
				  
				  $clen=strlen($invno);
				  //echo $clen;
				  if($clen=='1'){
				  $ad='000';
				  }
				  elseif($clen=='2'){
				  $ad='00';
				  }
				  elseif($clen=='3'){$ad='0';}
				  else{$ad="";}
				  if($year=='2021-2022')
				  {$prefix='PI/2021-22/';}
				  elseif($year=='2022-2023'){$prefix='PI/2022-23/';}
			elseif($year=='2023-2024'){$prefix='PI/2023-24/';}
				$cur_auto_id1=$prefix.$ad.$invno;
				  
		date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d', time () -3600 );
		?>
				  
				  
		<?php
$update= false;
			if(isset($_GET['edit'])){
						
								include('config.php');
								//$con = mysqli_connect($servername,$username,$password,$db);

	$code=$_GET['edit'];
					//echo $code;
	$update= true;
	$qry="SELECT * FROM `pinv_main` WHERE `invno` = '$code'";
					//echo $qry;
	
	$result=mysqli_query($con,$qry);
	if(count($result==1)){
		
			$row=mysqli_fetch_array($result);
		
				$invno=$row['invno'];
										$dt=$row['dt'];
										$billto=$row['billto'];
										$delnote=$row['delnote'];
										$mode=$row['mode'];
										$ship=$row['ship'];
											$oref=$row['oref'];
											$bookno=$row['bookno'];
											$bdt=$row['bdt'];
											$disp=$row['disp'];
											$dest=$row['dest'];
											$delterms=$row['delterms'];
											$cgst=$row['cgst'];
											$sgst=$row['sgst'];
											$igst=$row['igst'];
											$round=$row['round'];
											$total=$row['total'];
											$ttl=$row['txamt'];
											$cper=$row['cper'];
											$sper=$row['sper'];
											$iper=$row['iper'];
											$sez=$row['sez'];
		$query = mysqli_query($con,"SELECT name FROM cust_master where code='$billto'");
	$results = mysqli_fetch_array($query);
	$bcode = $results['name']	;
		
									}

			 }  
					
					
	  ?>
	
											
                            		  
				  
				  
				  
                <div class="card-body">
					<div class="row form-group">
                                <div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">Invoice No</label>
									</div>
								<div class="col-12 col-md-4">
										<input type="text" id="invno" name="invno" value="<?php if(isset($_GET['edit'])){ echo $invno;} else{ echo $cur_auto_id1;} ?>" placeholder="code" class="form-control" readonly>
                                                    
                            </div>
					</div>
					<div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">Date</label>
						</div>
						<div class="col-12 col-md-4">
								     <input type="date" id="dt" autofocus="autofocus" name="dt" value="<?php if(isset($_GET['edit'])){echo $dt;} ?>" class="form-control">
                                                    
                           </div>
                        </div>
						<div class="row form-group">
                                <div class="col col-md-3">
                                   <label for="hf-password" class=" form-control-label">Bill To</label>
							</div>
							<div class="col-12 col-md-4">
                                     		 <select  class="select2"   id="billto" name="billto" style="width:100%" required>
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $bcode; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select * from cust_master order by name asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["name"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>
                               </div>
						</div>
					<div class="row form-group">
						<div class="col col-md-3">
							
						</div>
						<div class="col-12 col-md-4">
							<input type="checkbox" id="sez" name="sez" value="<?php if ($sez=='sez'){ echo $sez; }  ?>" <?php if ($sez=='sez'){ echo "checked"; } ?>>
<label for="hf-password" class="form-control-label">&nbsp;&nbsp;&nbsp;SEZ Invoice</label>
						</div>
						</div>
                                     <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Delivery Note</label>
										 </div>
										 <div class="col-12 col-md-4">
                                                    <input type="text" id="del" name="del" value="<?php if(isset($_GET['edit'])){echo $delnote;}?>" placeholder="Delivery Note" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Mode/Terms of Payment</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select type="text" id="mode" name="mode"  class="form-control">
														<?php if(isset($_GET['edit'])){?><option><?php echo $mode; ?></option><?php } ?>
														<option>~~SELECT~~</option>
														<option>Cash</option>
														<option>Bank</option>
														<option>Credit</option>
													</select>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Shipping Line</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="ship" name="ship" value="<?php if(isset($_GET['edit'])){echo $ship;}?>" placeholder="Shipping Line" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Other Reference(s)</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="oref" name="oref" value="<?php if(isset($_GET['edit'])){echo $oref;}?>" placeholder="Other Reference(s)" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Booking No</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="bookno" name="bookno" value="<?php if(isset($_GET['edit'])){echo $bookno;}?>" placeholder="Booking No" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Date</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="date" id="bookdt" name="bookdt" value="<?php if(isset($_GET['edit'])){echo $bdt;}?>"  class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Dispatch Through</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="disp" name="disp" value="<?php if(isset($_GET['edit'])){echo $disp;}?>" placeholder="Dispacth Through" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="hf-password" class="form-control-label">Destination</label>
						</div>
						<div class="col-12 col-md-4">
							<input type="text" id="dest" name="dest" value="<?php if(isset($_GET['edit'])){echo $dest;} ?>" placeholder="Destination" class="form-control">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="hf-password" class="form-control-label">Delivery Terms</label>
						</div>
						<div class="col-12 col-md-4">
							<input type="text" id="dterms" name="dterms" value="<?php if(isset($_GET['edit'])){echo $delterms;} ?>" placeholder="Delivery Terms" class="form-control">
							
							<input type="hidden" name="stcode" id="stcode">
						</div>
					</div>
					
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="hf-password" class="form-control-label">Against Advance Receipt</label>
						</div>
						<div class="col-12 col-md-4">
					<select  class="select2"   id="recpt" name="recpt" style="width:100%;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $recpt; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select code from advreceipt  order by code asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["code"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>
						</div>
					</div>
					
				 
					 <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Sr No.</th>
                      <th style="width:200px">Description of Goods</th>
						<th style="width:50px;text-align:center">HSN/SAC</th>
                      <th style="width: 40px;text-align:center">Quantity</th>
						<th style="width:30px;text-align:center">Size</th>
						<th style="text-align:center">Rate</th>
						<th style="text-align:right">GST Rate</th>
						<th style="text-align:right">GST Amount</th>
						<th style="width:50px;text-align:right">Amount</th>
						<th style="display:none">camt</th>
						<th style="display:none">samt</th>
						<th style="display:none">iamt</th>
                    </tr>
                  </thead>
                  <tbody>	
					 
                    <tr>
                      <td>1.</td>
						<?php
						if($update=="true"){
							//select * from inv_child where invno=''
							$sql=mysqli_query($con,"select * from `pinv_child` where invno='$invno'");
							$i=0;
								while($row = mysqli_fetch_array($sql)){
									$i=$i+1;
									if($i==1){
													$desc1=$row['descript'];
													$hsn1=$row['hsn'];
													$qty1=$row['qty'];
													$rate1=$row['rate'];
													$gstrate1=$row['gstrate'];
													$gstamount1=$row['gstamount'];
													$amount1=$row['amount'];
													$size1=$row['size'];
											 }
									if($i==2){
													$desc2=$row['descript'];
													$hsn2=$row['hsn'];
													$qty2=$row['qty'];
													$rate2=$row['rate'];
													$gstrate2=$row['gstrate'];
													$gstamount2=$row['gstamount'];
													$amount2=$row['amount'];
													$size2=$row['size'];
										}
									if($i==3){
													$desc3=$row['descript'];
													$hsn3=$row['hsn'];
													$qty3=$row['qty'];
													$rate3=$row['rate'];
													$gstrate3=$row['gstrate'];
													$gstamount3=$row['gstamount'];
													$amount3=$row['amount'];
													$size3=$row['size'];
										}
									if($i==4){
													$desc4=$row['descript'];
													$hsn4=$row['hsn'];
													$qty4=$row['qty'];
													$rate4=$row['rate'];
													$gstrate4=$row['gstrate'];
													$gstamount4=$row['gstamount'];
													$amount4=$row['amount'];
													$size4=$row['size'];
										}
									if($i==5){
													$desc5=$row['descript'];
													$hsn5=$row['hsn'];
													$qty5=$row['qty'];
													$rate5=$row['rate'];
													$gstrate5=$row['gstrate'];
													$gstamount5=$row['gstamount'];
													$amount5=$row['amount'];
													$size5=$row['size'];
										}
								}
							
							$query1 = mysqli_query($con,"SELECT pname FROM prod_master where code='$desc1'");
							$results1 = mysqli_fetch_array($query1);
							$desc1 = $results1['pname']	;
									
							$query2 = mysqli_query($con,"SELECT pname FROM prod_master where code='$desc2'");
							$results2 = mysqli_fetch_array($query2);
							$desc2 = $results2['pname']	;
								
							$query3 = mysqli_query($con,"SELECT pname FROM prod_master where code='$desc3'");
							$results3 = mysqli_fetch_array($query3);
							$desc3 = $results3['pname']	;		
									
							$query4 = mysqli_query($con,"SELECT pname FROM prod_master where code='$desc4'");
							$results4 = mysqli_fetch_array($query4);
							$desc4 = $results4['pname']	;
									
							$query5 = mysqli_query($con,"SELECT pname FROM prod_master where code='$desc5'");
							$results5 = mysqli_fetch_array($query5);
							$desc5 = $results5['pname']	;		
								
							
						}
						
						?>
					  <td>
						  <select  class="select2"   id="desc1" name="desc1" style="width:200px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $desc1; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select * from prod_master order by pname asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["pname"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>
						  <!--<input type="text" name="desc1" id="desc1" class="form-control" value="<?php //echo $desc1; ?>" style="border:none;width:200px">
						  <ul id="searchResult"></ul>-->
					 </td>
                     <td style="width:50px"><input type="text" tabindex='-1' name="hsn1" id="hsn1" value="<?php echo $hsn1; ?>" style="border:none;width:50px;text-align:center;margin-left:10px"> </td>
                      <td><input type="text" name="qty1" id="qty1" style="border:none;width:50px;text-align:center" value="<?php echo $qty1; ?>"> </td>
						 <td>
						  <select  class="select2"   id="size1" name="size1" style="width:70px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $size1; ?></option><?php } ?>
							  
							  <option>20</option>
							  <option>40</option>
                    							</select></td>
						<td><input type="text" name="rate1" id="rate1" style="border:none;width:50px;text-align:center" value="<?php echo $rate1; ?>"> </td>
						<td><input type="text" name="gstrate1" tabindex='-1' id="gstrate1" style="border:none;width:50px;text-align:right" value="<?php echo $gstrate1; ?>"> </td>
						<td><input type="text" name="gstamt1" tabindex='-1' id="gstamt1" style="border:none;width:80px;text-align:right" value="<?php echo $gstamount1; ?>"> </td>
						<td style="width:50px"><input type="text" tabindex='-1' name="amt1" id="amt1" style="border:none;width:80px;text-align:right" value="<?php echo $amount1; ?>"> </td>
						<td style="display:none"><input type="text" name="camt1" id="camt1" style="border:none;width:50px"> </td>
						<td style="display:none"><input type="text" name="samt1" id="samt1" style="border:none;width:80px"> </td>
						<td style="display:none"><input type="text" name="iamt1" id="iamt1" style="border:none;width:80px"> </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>
						  <select  class="select2"   id="desc2" name="desc2" style="width:200px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $desc2; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select * from prod_master order by pname asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["pname"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>

					 </td>
                     <td style="width:50px"><input type="text" tabindex='-1' name="hsn2" id="hsn2" style="border:none;width:50px;text-align:center;margin-left:10px" value="<?php echo $hsn2; ?>"> </td>
                      <td><input type="text" name="qty2" id="qty2" style="border:none;width:50px;text-align:center" value="<?php echo $qty2; ?>"> </td>
						<td>
						  <select  class="select2"   id="size2" name="size2" style="width:70px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $size2; ?></option><?php } ?>
							  
							  <option>20</option>
							  <option>40</option>
                    							</select></td>
						<td><input type="text" name="rate2" id="rate2" style="border:none;width:50px;text-align:center" value="<?php echo $rate2; ?>"> </td>
						<td><input type="text" name="gstrate2" tabindex='-1' id="gstrate2" style="border:none;width:50px;text-align:right" value="<?php echo  $gstrate2; ?>"> </td>
						<td><input type="text" name="gstamt2" tabindex='-1' id="gstamt2" style="border:none;width:80px;text-align:right" value="<?php echo $gstamount2; ?>"> </td>
						<td style="width:50px"><input type="text" tabindex='-1' name="amt2" id="amt2" style="border:none;width:80px;text-align:right" value="<?php echo $amount2; ?>"> </td>
						<td style="display:none"><input type="text" name="camt2" id="camt2" style="border:none;width:50px"> </td>
						<td style="display:none"><input type="text" name="samt2" id="samt2" style="border:none;width:80px"> </td>
						<td style="display:none"><input type="text" name="iamt2" id="iamt2" style="border:none;width:80px"> </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>
						 <select  class="select2"   id="desc3" name="desc3" style="width:200px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $desc3; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select * from prod_master order by pname asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["pname"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>

					 </td>
                      <td style="width:50px"><input type="text" tabindex='-1' name="hsn3" id="hsn3" style="border:none;width:50px;text-align:center;margin-left:10px" value="<?php echo $hsn3; ?>">  </td>
                      <td><input type="text" name="qty3" id="qty3" style="border:none;width:50px;text-align:center" value="<?php echo $qty3; ?>"> </td>
						<td>
						  <select  class="select2"   id="size3" name="size3" style="width:70px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $size3; ?></option><?php } ?>
							  
							  <option>20</option>
							  <option>40</option>
                    							</select></td>
						<td><input type="text" name="rate3" id="rate3" style="border:none;width:50px;text-align:center" value="<?php echo $rate3; ?>"> </td>
						<td><input type="text" tabindex='-1' name="gstrate3" id="gstrate3" style="border:none;width:50px;text-align:right" value="<?php echo $gstrate3; ?>"> </td>
						<td><input type="text" tabindex='-1' name="gstamt3" id="gstamt3" style="border:none;width:80px;text-align:right" value="<?php echo $gstamount3; ?>"> </td>
						<td style="width:50px"><input type="text" tabindex='-1' name="amt3" id="amt3" style="border:none;width:80px;text-align:right" value="<?php echo $amount3; ?>"> </td>
						<td style="display:none"><input type="text" name="camt3" id="camt3" style="border:none;width:50px"> </td>
						<td style="display:none"><input type="text" name="samt3" id="samt3" style="border:none;width:80px"> </td>
						<td style="display:none"><input type="text" name="iamt3" id="iamt3" style="border:none;width:80px"> </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>
						  <select  class="select2"   id="desc4" name="desc4" style="width:200px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $desc4; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select * from prod_master order by pname asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["pname"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>

					 </td>
                      <td style="width:50px"><input type="text" tabindex='-1' name="hsn4" id="hsn4" style="border:none;width:50px;text-align:center;margin-left:10px" value="<?php echo $hsn4; ?>">  </td>
                      <td><input type="text" name="qty4" id="qty4" style="border:none;width:50px;text-align:center" value="<?php echo $qty4; ?>"> </td>
						<td>
						  <select  class="select2"   id="size4" name="size4" style="width:70px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $size4; ?></option><?php } ?>
							  
							  <option>20</option>
							  <option>40</option>
                    							</select></td>
						<td><input type="text" name="rate4" id="rate4" style="border:none;width:50px;text-align:center" value="<?php echo $rate4; ?>"> </td>
						<td><input type="text" tabindex='-1'  name="gstrate4" id="gstrate4" style="border:none;width:50px;text-align:right" value="<?php echo $gstrate4; ?>"> </td>
						<td><input type="text" tabindex='-1' name="gstamt4" id="gstamt4" style="border:none;width:80px;text-align:right" value="<?php echo $gstamount4; ?>"> </td>
						<td style="width:50px"><input type="text" tabindex='-1' name="amt4" id="amt4" style="border:none;width:80px;text-align:right" value="<?php echo $amount4; ?>"> </td>
						<td style="display:none"><input type="text" name="camt4" id="camt4" style="border:none;width:50px"> </td>
						<td style="display:none"><input type="text" name="samt4" id="samt4" style="border:none;width:80px"> </td>
						<td style="display:none"><input type="text" name="iamt4" id="iamt4" style="border:none;width:80px"> </td>
                    </tr>
					  <tr>
						  <td>5.</td>
						 <td>
						   <select  class="select2"   id="desc5" name="desc5" style="width:200px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $desc5; ?></option><?php } ?>
                    									<option value="">~~SELECT~~</option>
													 		<?php
                     											include('config.php');
                       											$res= mysqli_query($con,"select * from prod_master order by pname asc");
															?>
									
															<?php
                       											while($row= mysqli_fetch_array($res))
                       											{
                      										?>
                      											<option><?php echo $row["pname"]; ?></option>
                      										<?php
                      											}
                      										?>
                    							</select>

					 </td>
                      <td style="width:50px"><input type="text" name="hsn5" tabindex='-1' id="hsn5" style="border:none;width:50px;text-align:center;margin-left:10px" value="<?php echo $hsn5; ?>">  </td>
						  
                      <td><input type="text" name="qty5" id="qty5" style="border:none;width:50px;text-align:center" value="<?php echo $qty5; ?>"> </td>
						  <td>
						  <select  class="select2"   id="size5" name="size5" style="width:70px;" >
													<?php if(isset($_GET['edit'])){ ?> <option><?php echo $size5; ?></option><?php } ?>
							  
							  <option>20</option>
							  <option>40</option>
                    							</select></td>
						<td><input type="text" name="rate5" id="rate5" style="border:none;width:50px;text-align:center" value="<?php echo $rate5; ?>"> </td>
						<td><input type="text" tabindex='-1' name="gstrate5" id="gstrate5" style="border:none;width:50px;text-align:right" value="<?php echo $gstrate5; ?>"> </td>
						<td><input type="text" tabindex='-1' name="gstamt5" id="gstamt5" style="border:none;width:80px;text-align:right" value="<?php echo $gstamount5; ?>"> </td>
						<td style="width:50px"><input type="text" tabindex='-1' name="amt5" id="amt5" style="border:none;width:80px;text-align:right" value="<?php echo $amount5; ?>"> </td>
						  <td style="display:none"><input type="text" name="camt5" id="camt5" style="border:none;width:50px"> </td>
						<td style="display:none"><input type="text" name="samt5" id="samt5" style="border:none;width:80px"> </td>
						<td style="display:none"><input type="text" name="iamt5" id="iamt5" style="border:none;width:80px"> </td>
					  </tr>
					  <tr>
						  <td></td>
						  <td></td>
						  <td style="width:50px"></td>
					  <td> </td>
                      <td></td>
						<td></td>
						<td></td>
						  <td></td>
						<td><input type="text" name="ttl" tabindex='-1' id="ttl" value="<?php if(isset($_GET['edit'])){echo $ttl;} ?>" style="border:none;width:80px;text-align:right"></td>
					  </tr>
					  <tr>
						  <td></td>
						  <td style="text-align:right" >CGST</td>
					  <td style="width:50px"><input type="text" tabindex='-1' name="cgst" id="cgst" value="<?php echo $cper; ?>" style="border:none;text-align:right;width:50px"> </td>
                      <td></td>
						  <td></td>
						  <td></td>
						<td></td>
						<td></td>
						<td><input type="text" tabindex='-1' id="tcgst" name="tcgst" value="<?php echo $cgst; ?>" style="border:none;width:80px;text-align:right"></td>
					  </tr>
					  <tr>
						  <td></td>
						  <td style="text-align:right" >SGST</td>
					  <td style="width:50px"><input type="text" tabindex='-1' name="sgst" id="sgst" value="<?php echo $sper; ?>" style="border:none;text-align:right;width:50px"> </td>
                      <td></td>
						  <td></td>
						<td></td>
						  <td></td>
						<td></td>
						<td><input type="text" tabindex='-1' id="tsgst" name="tsgst" value="<?php echo $sgst; ?>" style="border:none;width:80px;text-align:right"></td>
					  </tr>
					  <tr>
						  <td></td>
						  <td style="text-align:right" >IGST</td>
					  <td style="width:50px"><input type="text" tabindex='-1' name="igst" id="igst" value="<?php echo $iper; ?>" style="border:none;text-align:right;width:50px">  </td>
                      <td></td>
						  <td></td>
						<td></td>
						<td></td>
						  <td></td>
						<td><input type="text" tabindex='-1' id="tigst" name="tigst" value="<?php echo $igst; ?>" style="border:none;width:80px;text-align:right"></td>
					  </tr>
					  <tr>
						  <td></td>
						  <td style="text-align:right" >Roundoff</td>
					  <td style="width:50px"></td>
                      <td></td>
						<td></td>
						  <td></td>
						<td></td>
						  <td></td>
						<td><input type="text" tabindex='-1' name="roundoff" id="roundoff" value="<?php echo $round; ?>" style="border:none;width:80px;text-align:right">  </td>
					  </tr>
					  <tr>
						  <td></td>
						  <td style="text-align:right" >Total</td>
					  <td style="width:50px"><input type="text" tabindex='-1' name="total" id="total"  style="border:none;text-align:right;width:50px">  </td>
                      <td></td>
						<td></td>
						<td></td>
						  <td></td>
						  <td></td>
						<td><input type="text" tabindex='-1' id="tamt" name="tamt" value="<?php echo $total; ?>" style="border:none;width:80px;text-align:right"></td>
					  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

					
					
					
			</div>
				 <!-----footer----->
                                <div class="card-footer">
								<?php if($update=="true"): ?>
                                        <button type="submit" name="update" value="Update" id="update" class="btn btn-primary">
											Update
										</button>
									<a href ="annexure.php?annexure=<?php echo $invno;?>"><button class="btn btn-info" type="button" >
                                                           Annexure
									</button></a>
									<a href ="receiptentry.php?edit=<?php echo $invno;?>"><button class="btn btn-info" type="button" >
                                                           Receipt
									</button></a>
										<?php else : ?>
									
									 <input type="button"  class="btn btn-success " id="submitBtn" data-toggle="modal" data-target="#confirm-submit"  value="Save" name="send" />
                  <!--<button type="submit" name="save" value="Save" id="submitBtn" class="btn btn-success">Save</button>-->
									<?php endif; ?>
                  <a href="logout.php"><button type="button" class="btn btn-danger float-right">Quit</button></a>
                </div>
                 <!--<a id="back-to-top" href="#" class="btn back-to-top" style="background-color:#17a2b8" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>-->
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
			
			</div>  
		 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
		
		
		
   <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!--<b>Version</b> 3.1.0-rc-->
    </div>
    <strong>Copyright &copy; <a href="" style="color:rgb(40,73,7)">2023</a>.</strong> All rights reserved.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
	   
		
<!-----modal starts here-------->
						<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                Do you want to make receipt for the following invoice?
                <table class="table">
                    <tr>
                        <th>Invoice Number</th>
                        <td id="minvno"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
				 <a href="#" id="submit1" class="btn btn-success success">Yes</a>
                <a href="#" id="submit" class="btn btn-success success">No</a>
			</div>
        </div>
    </div>
</div><!---modal ends here-->
						<script>
							$('#submitBtn').click(function() {
     $('#minvno').text($('#invno').val());							
});

$('#submit').click(function(){
    alert('submitting');
    $('#formfield').submit();
});
							
		$('#submit1').click(function(){
    //alert('submitting');
	
    $('#formfield').submit();
});
     $('#update').click(function(){
    alert('submitting');
	$('#formfield').attr('action','perinvedit.php');
    $('#formfield').submit();
});           		
</script>
			
	  <script>
		   // $("#billto").select2().on('select2-focus',function(){ $(this).select2('open'); });
		   var tabPressed = false;

    $(document).keydown(function (e) {
        // Listening tab button.
        if (e.which == 9) {
            tabPressed = true;
        }
    });

    $(document).on('focus', '.select2', function() {
        if (tabPressed) {
            tabPressed = false;
            $(this).siblings('select').select2('open');
        }
    });
	$('#billto').change(function(){
	var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
	});
		 /* $("#billto").on('select2:select', function (e) {
   var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
		  var stcode = $('#stcode').val();
		alert(stcode);
		if(stcode == '24'){
		$('#cgst').val('9%');
		$('#sgst').val('9%');
		$('#igst').val("");
		}
		else{
		$('#cgst').val("");
		$('#sgst').val("");
		$('#igst').val('18%');
		}
		  });*/
	  </script>
	  
	  	<script>
	$( function() {
$('#desc1').change(function(){
	var v = document.getElementById('desc1').value;
					 var $desc1= v;
   $.ajax({
            type        : 'POST',
            url         : 'hsn.php',
            data        : {desc1:$desc1},
          
            success: function(data)          // recieved data from generateno.php
            {
				//alert("hello");
                var hsn1 = data;              
               document.getElementById('hsn1').value = hsn1;
//alert("hello");
            }
        })
	var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
		 var dsc1= v;
$.ajax({
            type        : 'POST',
            url         : 'gst.php',
            data        : {desc1:dsc1},
          
            success: function(data)          // recieved data from generateno.php
            {
                var gstrate1 = data;              
               document.getElementById('gstrate1').value = gstrate1;
				$( '#qty1' ).trigger( 'keyup' );
//alert("hello");
           
						
   
		var stcode = $('#stcode').val();
		var gstr1 = $('#gstrate1').val();
		//alert(stcode);
		if(stcode == '24'){
			//alert(gstr1);
			if(gstr1>0){
		$('#cgst').val('9%');
		$('#sgst').val('9%');
		$('#igst').val("");
				}
			else{
			$('#cgst').val('0');
		$('#sgst').val('0');
		$('#igst').val("");
				}
		}
		else{
			if(gstr1>0){
		$('#cgst').val("");
		$('#sgst').val("");
		$('#igst').val('18%');
			}
			else{
			$('#cgst').val('');
		$('#sgst').val('');
		$('#igst').val("0");
			}
		}               
  	 }
        })	          
  
 });
	})
		
	$( function() {
$('#desc2').change(function(){
	var v = document.getElementById('desc2').value;
					 var $desc1= v;
   $.ajax({
            type        : 'POST',
            url         : 'hsn.php',
            data        : {desc1:$desc1},
          
            success: function(data)          // recieved data from generateno.php
            {
				//alert("hello");
                var hsn1 = data;              
               document.getElementById('hsn2').value = hsn1;
//alert("hello");
            }
        })
	var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
		 var dsc1= v;
$.ajax({
            type        : 'POST',
            url         : 'gst.php',
            data        : {desc1:dsc1},
          
            success: function(data)          // recieved data from generateno.php
            {
                var gstrate1 = data;              
               document.getElementById('gstrate2').value = gstrate1;
	
            }
        })
 });
	})	
	$( function() {
$('#desc3').change(function(){
	var v = document.getElementById('desc3').value;
					 var $desc1= v;
   $.ajax({
            type        : 'POST',
            url         : 'hsn.php',
            data        : {desc1:$desc1},
          
            success: function(data)          // recieved data from generateno.php
            {
				//alert("hello");
                var hsn1 = data;              
               document.getElementById('hsn3').value = hsn1;
//alert("hello");
            }
        })
	var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
		 var dsc1= v;
$.ajax({
            type        : 'POST',
            url         : 'gst.php',
            data        : {desc1:dsc1},
          
            success: function(data)          // recieved data from generateno.php
            {
                var gstrate1 = data;              
               document.getElementById('gstrate3').value = gstrate1;
				
            }
        })
 });
	})	
			
	$( function() {
$('#desc4').change(function(){
	var v = document.getElementById('desc4').value;
					 var $desc1= v;
   $.ajax({
            type        : 'POST',
            url         : 'hsn.php',
            data        : {desc1:$desc1},
          
            success: function(data)          // recieved data from generateno.php
            {
				//alert("hello");
                var hsn1 = data;              
               document.getElementById('hsn4').value = hsn1;
//alert("hello");
            }
        })
	var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
		 var dsc1= v;
$.ajax({
            type        : 'POST',
            url         : 'gst.php',
            data        : {desc1:dsc1},
          
            success: function(data)          // recieved data from generateno.php
            {
                var gstrate1 = data;              
               document.getElementById('gstrate4').value = gstrate1;
				
            }
        })
 });
	})	
			
	$( function() {
$('#desc5').change(function(){
	var v = document.getElementById('desc5').value;
					 var $desc1= v;
   $.ajax({
            type        : 'POST',
            url         : 'hsn.php',
            data        : {desc1:$desc1},
          
            success: function(data)          // recieved data from generateno.php
            {
				//alert("hello");
                var hsn1 = data;              
               document.getElementById('hsn5').value = hsn1;
//alert("hello");
            }
        })
	var $billto= document.getElementById('billto').value;
$.ajax({
            type        : 'POST',
            url         : 'getstcode.php',
            data        : {billto:$billto},
          
            success: function(data)          // recieved data from generateno.php
            {
                var stcode = data;              
               document.getElementById('stcode').value = stcode;
            }
        })
		 var dsc1= v;
$.ajax({
            type        : 'POST',
            url         : 'gst.php',
            data        : {desc1:dsc1},
          
            success: function(data)          // recieved data from generateno.php
            {
                var gstrate1 = data;              
               document.getElementById('gstrate5').value = gstrate1;
				
            }
        })
 });
	})	
			
			
			
					
/*	$( function() {

 // Single Select
 $( "#desc4" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "getdesc1.php",
    type:'post',
    dataType: "json",
    data: {
     desc1: request.term
    },
    success:function(response){
                
                    var len = response.length;
                    $("#searchResult4").empty();
                    for( var i = 0; i<len; i++){
                        var key = response[i]['key'];
                      //  var name = response[i]['name'];

                        $("#searchResult4").append("<li value='"+key+"'>"+key+"</li>");

                    }

                    // binding click event to li
                    $("#searchResult4 li").bind("click",function(){
		var v =$(this).text();
						
						$("#desc4").val(v);
						 var $desc1= v;
   $.ajax({
            type        : 'POST',
            url         : 'hsn.php',
            data        : {desc1:$desc1},
          
            success: function(data)          // recieved data from generateno.php
            {
				//alert("hello");
                var hsn1 = data;              
               document.getElementById('hsn4').value = hsn1;
//alert("hello");
            }
        })
		 var $dsc1= v;
$.ajax({
            type        : 'POST',
            url         : 'gst.php',
            data        : {desc1:$dsc1},
          
            success: function(data)          // recieved data from generateno.php
            {
                var gstrate1 = data;              
               document.getElementById('gstrate4').value = gstrate1;
				$( '#qty1' ).trigger( 'keyup' );
//alert("hello");
            }
        })
						$("#searchResult4").empty();
						//$('#qty1').keyup();
						
                    });

                }
   });
  },
  select: function (event, ui) {
   // Set selection
   $('#desc4').val(ui.item.key); // display the selected text
	  
   return false;
  }
 });
	})*/
		
				
</script>  
	  <script>
		  
		  
		  
		  
	 $('#rate1').keyup(function(){
			    
				var rate1= $('#rate1').val();
				var qty1= $('#qty1').val();
			    var gstrate1= $('#gstrate1').val();
			    
					if(rate1==""){
					rate1=0;
					}
					if(qty1==""){
					qty1=0;
					}
					
				$('#amt1').val(parseFloat(rate1)*parseFloat(qty1));
					var amt1 = $('#amt1').val();
				$('#gstamt1').val(parseFloat(gstrate1)*parseFloat(amt1)/100);
		 			$('#ttl').val(amt1);
		 			var ttl= $('#ttl').val();
		 			
		 		var stcode=$('#stcode').val();
		 
		 if(stcode=='24'){
			 			
						$('#camt1').val(parseFloat(amt1*9/100));
						$('#samt1').val(parseFloat(amt1*9/100));
			 
			 			$('#iamt1').val("");
			 			$('#tigst').val("");
			 
						var camt1=$('#camt1').val();
						$('#tcgst').val(camt1);
						var samt1=$('#samt1').val();
						$('#tsgst').val(samt1);
			 			if(gstrate1=='0'){
							$('#tcgst').val(0);
							$('#tsgst').val(0);
										 }
						var tcgst=$('#tcgst').val();
						var tsgst=$('#tsgst').val();
						var ttl=$('#ttl').val();
						$('#tamt').val(parseFloat(tcgst)+parseFloat(tsgst)+parseFloat(ttl));
			 			var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 			
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);
		 				}
		 else{
			 			$('#camt1').val("");
						$('#samt1').val("");
			 			$('#tcgst').val("");
			 			$('#tsgst').val("");
		 				$('#iamt1').val(parseFloat(amt1*18/100));
		 				var iamt1=$('#iamt1').val();
						$('#tigst').val(iamt1);
			 if(gstrate1=='0'){
							$('#tigst').val(0);
							
										 }
			 			var tigst=$('#tigst').val();
			 			var ttl=$('#ttl').val();
						$('#tamt').val(parseFloat(tigst)+parseFloat(ttl));
						 var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);
			 			//$('#roundoff').val(parseFloat(total)-parseFloat(tamt));
			 
		   }
		 
					}); 
		  
		  



		 $('#rate2').keyup(function(){
			    
				var rate2= $('#rate2').val();
				var qty2= $('#qty2').val();
			    var gstrate2= $('#gstrate2').val();
			    
					if(rate2==""){
					rate2=0;
					}
					if(qty2==""){
					qty2=0;
					}
					
			$('#amt2').val(parseFloat(rate2)*parseFloat(qty2));
				var amt2 = $('#amt2').val();
			$('#gstamt2').val(parseFloat(gstrate2)*parseFloat(amt2)/100);
				var amt1= $('#amt1').val();
		    $('#ttl').val(parseFloat(amt1)+parseFloat(amt2));

				var stcode=$('#stcode').val();
		 
		 if(stcode=='24'){
						
			 	$('#camt2').val(parseFloat(amt2*9/100));
		 		$('#samt2').val(parseFloat(amt2*9/100));
			 			
			 
			 			$('#iamt1').val("");
			 			$('#iamt2').val("");
			 			$('#tigst').val("");
			
			 var camt1=$('#camt1').val();
			 var camt2=$('#camt2').val();
			 $('#tcgst').val(parseFloat(camt1)+parseFloat(camt2));
		
		 	 var samt1=$('#samt1').val();
			 var samt2=$('#samt2').val();
		 	 $('#tsgst').val(parseFloat(samt1)+parseFloat(samt2));
				if(gstrate2=='0'){
							$('#tcgst').val(0);
							$('#tsgst').val(0);
										 }
			 	 var tcgst=$('#tcgst').val();
			 	 var tsgst=$('#tsgst').val();
				 var ttl=$('#ttl').val();
		 			$('#tamt').val(parseFloat(tcgst)+parseFloat(tsgst)+parseFloat(ttl));
			   
			 
			 			$('#roundoff').val(roundoff);
						var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);
			 }
			 else{
			 
						$('#camt1').val("");
						$('#samt1').val("");
				 		$('#camt2').val("");
						$('#samt2').val("");
			 			$('#tcgst').val("");
			 			$('#tsgst').val("");
				 
		 				
		 				var iamt1=$('#iamt1').val();
				 		$('#iamt2').val(parseFloat(amt2*18/100));
		 				var iamt2=$('#iamt2').val();

						$('#tigst').val(parseFloat(iamt1)+parseFloat(iamt2));
			 			if(gstrate2=='0'){
							$('#tigst').val(0);
							
										 }
				 		var tigst=$('#tigst').val();
			 			var ttl=$('#ttl').val();
						$('#tamt').val(parseFloat(tigst)+parseFloat(ttl));
				  var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);


			 	}
			     
					}); 
		  




		  $('#rate3').keyup(function(){
			    
				var rate3= $('#rate3').val();
				var qty3= $('#qty3').val();
			    var gstrate3 = $('#gstrate3').val();
			    
					if(rate3==""){
					rate3=0;
					}
					if(qty3==""){
					qty3=0;
					}
					
					$('#amt3').val(parseFloat(rate3)*parseFloat(qty3));
					var amt3 = $('#amt3').val();
					$('#gstamt3').val(parseFloat(gstrate3)*parseFloat(amt3)/100);
					var amt1= $('#amt1').val();
			 		var amt2= $('#amt2').val();
			  		$('#ttl').val(parseFloat(amt1)+parseFloat(amt2)+parseFloat(amt3));
			  
					var stcode=$('#stcode').val();
		 
		 			if(stcode=='24'){
			  					$('#camt3').val(parseFloat(amt3*9/100));
		 						$('#samt3').val(parseFloat(amt3*9/100));
			 
						
								$('#iamt1').val("");
								$('#iamt2').val("");
								$('#iamt3').val("");
								$('#tigst').val("");

			  					var camt1=$('#camt1').val();
								var camt2=$('#camt2').val();
			  					var camt3=$('#camt3').val();
			 					$('#tcgst').val(parseFloat(camt1)+parseFloat(camt2)+parseFloat(camt3));
		
								var samt1=$('#samt1').val();
								var samt2=$('#samt2').val();
							  	var samt3=$('#samt3').val();
								$('#tsgst').val(parseFloat(samt1)+parseFloat(samt2)+parseFloat(samt3));
						if(gstrate3=='0'){
							$('#tcgst').val(0);
							$('#tsgst').val(0);
										 }
							  	var tcgst=$('#tcgst').val();
						 		var tsgst=$('#tsgst').val();
						 		var ttl=$('#ttl').val();
						 		$('#tamt').val(parseFloat(tcgst)+parseFloat(tsgst)+parseFloat(ttl));
						 var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);

					}
			 	 else{
			  
						$('#camt1').val("");
						$('#samt1').val("");
				 		$('#camt2').val("");
						$('#samt2').val("");
					 	$('#camt3').val("");
						$('#samt3').val("");
					 
			 			$('#tcgst').val("");
			 			$('#tsgst').val("");
				 
		 				
		 				var iamt1=$('#iamt1').val();
				 		
		 				var iamt2=$('#iamt2').val();
						$('#iamt3').val(parseFloat(amt3*18/100));
		 				var iamt3=$('#iamt3').val();
					 
						$('#tigst').val(parseFloat(iamt1)+parseFloat(iamt2)+parseFloat(iamt3));
			 			if(gstrate3=='0'){
							$('#tigst').val(0);
							
										 }
				 		var tigst=$('#tigst').val();
			 			var ttl=$('#ttl').val();
						$('#tamt').val(parseFloat(tigst)+parseFloat(ttl));
 var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);


					}
					}); 
		  



		 $('#rate4').keyup(function(){
			    
				var rate4= $('#rate4').val();
				var qty4= $('#qty4').val();
			    var gstrate4= $('#gstrate4').val();
			    
					if(rate4==""){
					rate4=0;
					}
					if(qty4==""){
					qty4=0;
					}
					
					$('#amt4').val(parseFloat(rate4)*parseFloat(qty4));
					var amt4 = $('#amt4').val();
					$('#gstamt4').val(parseFloat(gstrate4)*parseFloat(amt4)/100);
					var amt1= $('#amt1').val();
					var amt2= $('#amt2').val();
				 	var amt3= $('#amt3').val();
			 		$('#ttl').val(parseFloat(amt1)+parseFloat(amt2)+parseFloat(amt3)+parseFloat(amt4));
			 var stcode=$('#stcode').val();
			 if(stcode=='24'){
								 $('#camt4').val(parseFloat(amt4*9/100));
		 						 $('#samt4').val(parseFloat(amt4*9/100));
			 
				 				$('#iamt1').val("");
								$('#iamt2').val("");
								$('#iamt3').val("");
				 				$('#iamt4').val("");
								$('#tigst').val("");

			  					 var camt1=$('#camt1').val();
								 var camt2=$('#camt2').val();
								 var camt3=$('#camt3').val();
								 var camt4=$('#camt4').val();
								 $('#tcgst').val(parseFloat(camt1)+parseFloat(camt2)+parseFloat(camt3)+parseFloat(camt4));

								var samt1=$('#samt1').val();
								var samt2=$('#samt2').val();
								var samt3=$('#samt3').val();
								var samt4=$('#samt4').val();
								$('#tsgst').val(parseFloat(samt1)+parseFloat(samt2)+parseFloat(samt3)+parseFloat(samt4));
						if(gstrate4=='0'){
							$('#tcgst').val(0);
							$('#tsgst').val(0);
										 }
								var tcgst=$('#tcgst').val();
							 	var tsgst=$('#tsgst').val();
							 	var ttl=$('#ttl').val();
							 	$('#tamt').val(parseFloat(tcgst)+parseFloat(tsgst)+parseFloat(ttl));
				  var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);

			 }
			 else{
			 			$('#camt1').val("");
						$('#samt1').val("");
				 		$('#camt2').val("");
						$('#samt2').val("");
					 	$('#camt3').val("");
						$('#samt3').val("");
				 		$('#camt4').val("");
				 		$('#samt4').val("");
					 
			 			$('#tcgst').val("");
			 			$('#tsgst').val("");
				 
		 				
		 				var iamt1=$('#iamt1').val();
				 		
		 				var iamt2=$('#iamt2').val();
						
		 				var iamt3=$('#iamt3').val();
				 		$('#iamt4').val(parseFloat(amt4*18/100));
		 				var iamt4=$('#iamt4').val();
					 
						$('#tigst').val(parseFloat(iamt1)+parseFloat(iamt2)+parseFloat(iamt3)+parseFloat(iamt4));
			 			if(gstrate4=='0'){
							$('#tigst').val(0);
							
										 }
				 		var tigst=$('#tigst').val();
			 			var ttl=$('#ttl').val();
						$('#tamt').val(parseFloat(tigst)+parseFloat(ttl));
				  var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);




				}
					});  
		  


		  $('#rate5').keyup(function(){
			    
				var rate5= $('#rate5').val();
				var qty5= $('#qty5').val();
			    var gstrate5= $('#gstrate5').val();
			    
					if(rate5==""){
					rate5=0;
					}
					if(qty5==""){
					qty5=0;
					}
					
					$('#amt5').val(parseFloat(rate5)*parseFloat(qty5));
					var amt5 = $('#amt5').val();
					$('#gstamt5').val(parseFloat(gstrate5)*parseFloat(amt5)/100);
					var amt1= $('#amt1').val();
			 		var amt2= $('#amt2').val();
			  		var amt3= $('#amt3').val();
			 		var amt4= $('#amt4').val();
			  		$('#ttl').val(parseFloat(amt1)+parseFloat(amt2)+parseFloat(amt3)+parseFloat(amt4)+parseFloat(amt5));
			  
var stcode=$('#stcode').val();
			  if(stcode=='24'){
								$('#iamt1').val("");
								$('#iamt2').val("");
								$('#iamt3').val("");
				 				$('#iamt4').val("");
				  				$('#iamt5').val("");
								$('#tigst').val("");
				  
				  $('#camt5').val(parseFloat(amt5*9/100));
		 		  $('#samt5').val(parseFloat(amt5*9/100));
			
				  var camt1=$('#camt1').val();
				  var camt2=$('#camt2').val();
				  var camt3=$('#camt3').val();
				  var camt4=$('#camt4').val();
				  var camt5=$('#camt5').val();
			 	  $('#tcgst').val(parseFloat(camt1)+parseFloat(camt2)+parseFloat(camt3)+parseFloat(camt4)+parseFloat(camt5));
		
		 		var samt1=$('#samt1').val();
			 	var samt2=$('#samt2').val();
			  	var samt3=$('#samt3').val();
			 	var samt4=$('#samt4').val();
			  	var samt5=$('#samt5').val();
		 		$('#tsgst').val(parseFloat(samt1)+parseFloat(samt2)+parseFloat(samt3)+parseFloat(samt4)+parseFloat(samt5));
			  if(gstrate5=='0'){
							$('#tcgst').val(0);
							$('#tsgst').val(0);
										 }
		 var tcgst=$('#tcgst').val();
		 var tsgst=$('#tsgst').val();
		 var ttl=$('#ttl').val();
		 $('#tamt').val(parseFloat(tcgst)+parseFloat(tsgst)+parseFloat(ttl));
				   var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);

			  }
		else{
			 			$('#camt1').val("");
						$('#samt1').val("");
				 		$('#camt2').val("");
						$('#samt2').val("");
					 	$('#camt3').val("");
						$('#samt3').val("");
				 		$('#camt4').val("");
				 		$('#samt4').val("");
					 	$('#camt5').val("");
				 		$('#samt5').val("");
			 			
						$('#tcgst').val("");
			 			$('#tsgst').val("");
				 
		 				
		 				var iamt1=$('#iamt1').val();
				 		
		 				var iamt2=$('#iamt2').val();
						
		 				var iamt3=$('#iamt3').val();
				 		
		 				var iamt4=$('#iamt4').val();
					 	$('#iamt5').val(parseFloat(amt5*18/100));
						var iamt5=$('#iamt5').val();
						$('#tigst').val(parseFloat(iamt1)+parseFloat(iamt2)+parseFloat(iamt3)+parseFloat(iamt4)+parseFloat(iamt5));
			 			if(gstrate5=='0'){
							$('#tigst').val(0);
							
										 }
				 		var tigst=$('#tigst').val();
			 			var ttl=$('#ttl').val();
						$('#tamt').val(parseFloat(tigst)+parseFloat(ttl));

 var tamt=$('#tamt').val();
			 			var total=Math.round(tamt);
			 			$('#tamt').val(total);
			 			var roundoff=parseFloat(total)-parseFloat(tamt);
			 
			 			roundoff= Math.round(roundoff*1000)/1000;
			 
			 			$('#roundoff').val(roundoff);


				}
	  


					}); 
		
</script>

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })  // DropzoneJS Demo Code End
</script>
		<script>
			$('#sez').on('change', function() { 
    // From the other examples
    if (this.checked) {
        
        $('#sez').val('sez');
    }else{ 
		$('#sez').val('');
		 }
});
		</script>
<script>
$( document ).ready(function() {
$("#billing").addClass("menu-open");
$("#billinga").addClass("active");
$("#billinga").css("background-color","rgb(40,73,7)");
$("#entries").addClass("menu-open");
$("#entriesa").addClass("active");
$("#entriesa").css("background-color","F0F0F0");	
$("#perentry").addClass("active");
$("#perentry").css("background-color","F0F0F0");
});

</script>	  
</body>
</html>
