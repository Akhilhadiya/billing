<?php
session_start(); 
if ($_SESSION['jsname']==''){header("Location:login.php");}else{
$username=$_SESSION['jsname'];
$type=$_SESSION['jstype'];
$year=$_SESSION['jsyear'];
}

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include('header.php');
 include('sidemenu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice Entry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="index.php" style="color:rgb(40,73,7);">Home</a></li>
              <li class="breadcrumb-item" >Invoice Entry</li>
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
              <div class="card-header" style="background-image: linear-gradient( 109.6deg,  rgba(177,248,146,1) 11.2%, rgba(81,152,11,1) 100.1% );">
                <h3 class="card-title" style="black">Invoice Entry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" id="formfield" action="invinput.php">
				  <?php
					include('config.php');
					$query=mysqli_query($con,"SELECT MAX(cast(substr(invno,13) as decimal)) as invno1 FROM inv_main"); 
				  //$query = mysqli_query($con,"SELECT MAX(code) as invno1 FROM autoinv where unm='$username'");
					$results = mysqli_fetch_array($query);
					$invno = $results['invno1']+1;		
				  
				  $clen=strlen($invno);
				  //echo $clen;
				  if($clen=='1'){
				  $ad='0000';
				  }
				  elseif($clen=='2'){
				  $ad='000';
				  }
				  elseif($clen=='3'){$ad='00';}
				  elseif($clen=='4'){$ad='0';}
				  else{$ad="";}
				  if($year=='2023-2024'){$prefix='ESPL/23-24/';}
				$cur_auto_id1=$prefix.$ad.$invno;
				  
		date_default_timezone_set('Asia/Kolkata');
		$currentTime = date( 'Y-m-d', time ());
		
		$update= false;
			if(isset($_GET['edit'])){
			$code=$_GET['edit'];
					//echo $code;
			$update= true;
			$qry="SELECT * FROM `inv_main` WHERE `invno` = '$code'";
			$result=mysqli_query($con,$qry);
			if(count($result==1)){
		
			$row=mysqli_fetch_array($result);
		
									$invno=$row['invno'];
									$dt=$row['dt'];
									$billto=$row['billto'];
									$pod=$row['pod'];
									$pol=$row['pol'];
									$ship=$row['ship'];
									$eta=$row['eta'];
									$etd=$row['etd'];
									$hblno=$row['hblno'];
									$mblno=$row['mblno'];
									$contlot=$row['contlot'];
									$exrate=$row['exrate'];
									$cgst=$row['cgst'];
									$sgst=$row['sgst'];
									$igst=$row['igst'];
									$round=$row['round'];
									$total=$row['total'];
									$txamt=$row['txamt'];
									$cper=$row['cper'];
									$sper=$row['sper'];
									$iper=$row['iper'];
									$sez=$row['sez'];
									$usdtamt=$row['usdtamt'];
									$query = mysqli_query($con,"SELECT name FROM cust_master where code='$billto'");
									$results = mysqli_fetch_array($query);
									$bcode = $results['name']	;
									//$irnno=$row['irnno'];
									//$ackno=$row['ackno'];
									//$ackdt=$row['ackdt'];
									}
			if($irnno==''){
				$sql2="select * from einv where inv='$invno'";
				//echo $sql2;
				$sql2=mysqli_query($con,$sql2);
				$res2=mysqli_fetch_array($sql2);
				$irnno1=$res2['irnno'];
				$ackno=$res2['ackno'];
				$ackdt=$res2['ackdt'];
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
							<!--<div class="col col-md-5">
								<?php if($update==true){ ?>
								<?php $irnbtn=$_GET['irn']; ?>
								
									<button type="submit" name="gjson" value="gjson" id="gjson" class="btn btn-info" style="color:white;font-weight:bold" <?php if($irnbtn=='Yes' || $irnno<>''){echo 'disabled';} ?>>
										   Generate JSON
										</button>
								<button type="button" name="girn" value="girn" id="girn" class="btn btn-info" style="color:white;font-weight:bold" <?php if($irnbtn<>'Yes'){echo 'disabled';} ?>>
											Get IRN
										</button>
								<?php } ?>
							</div>-->
					</div>
					<div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">Date</label>
						</div>
						<div class="col-12 col-md-4">
								     <input type="date" id="dt" autofocus="autofocus" name="dt" value="<?php if(isset($_GET['edit'])){echo $dt;}else{echo $currentTime;} ?>" class="form-control">
                                                    
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
                     											$res= mysqli_query($con,"select * from cust_master order by name asc");
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
                                                    <label for="hf-password" class=" form-control-label">POD</label>
										 </div>
										 <div class="col-12 col-md-4">
                                                    <input type="text" id="pod" name="pod" value="<?php if(isset($_GET['edit'])){echo $pod;}?>" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">POL</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="pol" name="pol" value="<?php if(isset($_GET['edit'])){echo $pol;}?>" class="form-control">
                                                 </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Shipping Line</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="ship" name="ship" value="<?php if(isset($_GET['edit'])){echo $ship;}?>" class="form-control" required>
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">ETA</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="eta" name="eta" value="<?php if(isset($_GET['edit'])){echo $eta;}?>" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">ETD</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="etd" name="etd" value="<?php if(isset($_GET['edit'])){echo $etd;}?>" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">HBL No</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="hblno" name="hblno" value="<?php if(isset($_GET['edit'])){echo $hblno;}?>"  class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">MBL No</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" id="mblno" name="mblno" value="<?php if(isset($_GET['edit'])){echo $mblno;}?>" class="form-control">
                                                    
                                                </div>
                                            </div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="hf-password" class="form-control-label">Container LOT</label>
						</div>
						<div class="col-12 col-md-4">
							<input type="text" id="contlot" name="contlot" value="<?php if(isset($_GET['edit'])){echo $contlot;} ?>" class="form-control">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="hf-password" class="form-control-label">Exchange Rate</label>
						</div>
						<div class="col-12 col-md-4">
							<input type="text" id="exrate" name="exrate" value="<?php if(isset($_GET['edit'])){echo $exrate;} ?>" class="form-control">
							
							<input type="hidden" name="stcode" id="stcode">
						</div>
					</div>
					
					
				<!--	<div id="irndiv" <?php if($irnno==''){ echo "style='display:none'";}?> class="col-md-6">
						<div class="card">
						  <div class="card-header" style="background-color:#17a2b8">
							<h3 class="card-title">IRN DETAILS</h3>
						  </div>
							<div class="card-body">
					<div class="row form-group">
						<div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">IRN No</label>
						</div>
							<div class="col-12 col-md-9">
								<input type="text" id="irrno"  name="irnno" value="<?php if($irnno<>''){echo $irnno;}else{echo $irnno1;} ?>" class="form-control">
						</div>
                       </div>
					<div class="row form-group">
						<div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">ACK No</label>
						</div>
							<div class="col-12 col-md-9">
								<input type="text" id="ackno"  name="ackno" value="<?php echo $ackno; ?>" class="form-control">
						</div>
                       </div>
					<div class="row form-group">
						<div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">ACK Dt</label>
						</div>
							<div class="col-12 col-md-9">
								<input type="date" id="ackdt"  name="ackdt" value="<?php echo $ackdt; ?>" class="form-control">
						</div>
                       </div>
					<div class="row form-group">
						<div class="col col-md-3">
                                 <label for="hf-password" class=" form-control-label">Inv Status</label>
						</div>
							<div class="col-12 col-md-9">
								<select class="select2" name="invst" id="invst" style="width:100%">
									<?php if($irnno<>''){ ?><option><?php echo $invst; ?></option><?php } ?>
									<option>Invoice Generated</option>
									<option>Invoice Cancelled</option>
								</select>
						</div>
                       </div>
					<div class="row form-group">
						<button type="submit" name="einv" value="einv" id="einv" class="btn btn-primary" <?php if($irnno<>''){echo 'disabled';} ?>>Update & Print</button>
					</div>
					</div>
						</div>
					</div>-->
				  </div>
				<div class="card-body">
					
				<table border=1 id="item_table" class="table">
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
						<th style="width:20px"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>
                             <tbody id="tbodyid">	
					  <?php if(isset($_GET['edit'])){
			$code=$_GET['edit'];
			$sql="select * FROM `inv_child` where invno='$code'";
			if(mysqli_query($con,$sql)){
				$data=mysqli_query($con,$sql);
				$x = 1;
				while($row=mysqli_fetch_array($data)){ $item=$row['descript']; ?>
                       <tr id="row_<?php echo $x; ?>">
						   
						   <td><?php echo $x; ?></td>
                         <td>
                          <select class="select2" data-row-id="row_<?php echo $x; ?>" id="desc_<?php echo $x; ?>" name="desc[]" style="width:100%;" onchange="getItemData(<?php echo $x; ?>)">
							  <option value="">~~SELECT~~</option>
                              <?php $sql="select code,pname from prod_master";
							$res= mysqli_query($con,$sql);
								while($row1= mysqli_fetch_array($res))
                       											{
                      										?>
               <option value="<?php echo $row1[0]; ?>"<?php if($item==$row1[0]) { echo "selected='selected'"; } ?> ><?php echo $row1[1]; ?> </option>
                      										<?php
                      											}
                      										?>
							</select>
                          </td>
						   <td><input type="text" name="hsn[]" id="hsn_<?php echo $x; ?>"  value="<?php echo $row['hsn'];?>"class="form-control">
						<td style="width:100px"><input type="text" name="qty[]" onkeyup="qtykeyup(<?php echo $x; ?>)" value="<?php echo $row['qty']; ?>" id="qty_<?php echo $x; ?>" class="form-control"></td>
						<td style="width:80px">
							<select  class="select2 form-control size" id="size_<?php echo $x; ?>" name="size[]" style="width:100%;">
								<option><?php echo $row['size']; ?></option>
							<option value="">~~SELECT~~</option>
							<option>20</option>
							<option>40</option>
					  	</select>
                    	</td>
					<td style="width:150px"><input type="text" name="rate[]" onkeyup="qtykeyup(<?php echo $x; ?>)" value="<?php echo $row['rate']; ?>" id="rate_<?php echo $x; ?>" class="form-control"></td>
					<td><input type="text" tabindex="-1"  name="gstrate[]" id="gstrate_<?php echo $x; ?>" value="<?php echo $row['gstrate']; ?>" style="width:50px;text-align:right" class="form-control"> </td>
					<td><input type="text" tabindex="-1" name="gstamt[]" value="<?php echo $row['gstamount']; ?>" id="gstamt_<?php echo $x; ?>" style="width:80px;text-align:right" class="form-control"></td>
					<td style="width:160px"><input type="text" name="amt[]"  id="amt_<?php echo $x; ?>" value="<?php echo $row['amount']; ?>" class="form-control"></td>
						<td><button type="button" class="btn btn-default" onclick="removeRow(<?php echo $x; ?>)"><i class="fa fa-minus"></i></button></td>	
                    </tr>
                       <?php $x++; ?>
                     <?php } ?>
                   <?php } }
					?>
                   </tbody>               
				</table>
				</div>
					
		 <div class="row">
			<div class="col-md-6">
			  <div class="card-body">
			  </div>
			</div>
		  <div class="col-md-6">
			  <div class="card-body float-right">
				  <div class="row form-group">
					<div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">Total</label>
					  </div>
					  <div class="col-12 col-md-7">
            				<input type="text" id="ttl" name="ttl" value="<?php echo $txamt; ?>"  class="form-control" readonly>
					 </div>
				  </div>
				  	<div id="gst">
				  <div class="row form-group">
					  <div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">CGST</label>
					  </div>
					  <div class="col-12 col-md-2">
            				<input type="text" id="cgst" name="cgst" value="<?php echo $cper; ?>"  class="form-control" readonly>
					  	</div>
						  <div class="col-12 col-md-5">
						  <input type="text" id="tcgst" name="tcgst" value="<?php echo $cgst; ?>"  class="form-control" readonly>
					 </div>
						</div>
				  <div class="row form-group">
					  <div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">SGST</label>
					  </div>
					  <div class="col-12 col-md-2">
            				<input type="text" id="sgst" name="sgst" value="<?php echo $sper; ?>"  class="form-control" readonly>
					  	</div>
						  <div class="col-12 col-md-5">
						  <input type="text" id="tsgst" name="tsgst" value="<?php echo $sgst; ?>"  class="form-control" readonly>
					 </div>
						</div>
				  <div class="row form-group">
					  <div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">IGST</label>
					  </div>
					  <div class="col-12 col-md-2">
            				<input type="text" id="igst" name="igst" value="<?php echo $iper; ?>"  class="form-control" readonly>
					  	</div>
						  <div class="col-12 col-md-5">
						  <input type="text" id="tigst" name="tigst" value="<?php echo $igst; ?>"  class="form-control" readonly>
					 </div>
						</div>
				  </div>
				  <div class="row form-group">
					  <div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">Round Off</label>
							</div>
							<div class="col-12 col-md-7">
            				<input type="text" id="roundoff" name="roundoff" value="<?php echo $round; ?>"  class="form-control" readonly>
					 </div>
					</div>
				  <div class="row form-group">
					  <div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">Total Payable(INR)</label>
					  </div>
					  <div class="col-12 col-md-7">
            				<input type="text" id="tamt" name="tamt" value="<?php echo $total; ?>"  class="form-control" readonly>
					<!--	  <input type="text" id="gttl" name="gttl" value="<?php if(isset($_GET['edit'])){echo $gttl;} ?>"  class="form-control" readonly>-->
					 </div>
						</div>
				  <div class="row form-group">
					  <div class="col col-md-5">
              			<label for="hf-password" class=" form-control-label">Total Payable(USD)</label>
					  </div>
					  <div class="col-12 col-md-7">
            				<input type="text" id="usdtamt" name="usdtamt" value="<?php echo $usdtamt; ?>"  class="form-control" readonly>
					<!--	  <input type="text" id="gttl" name="gttl" value="<?php if(isset($_GET['edit'])){echo $gttl;} ?>"  class="form-control" readonly>-->
					 </div>
						</div>
				  <!--<div class="row form-group">
					  <div class="col-12 col-md-9">
					  <textarea id="ewb" class="form-control"></textarea>
						  <input type="text" id="authtoken" name="authtoken" value="<?php //if(isset($_GET['edit'])){echo $gttl;} ?>"  class="form-control" readonly>
					  </div>
					  </div>-->
				 </div>
				</div>
		  </div>	
			
				 <!-----footer----->
                                <div class="card-footer">
								<?php if($update=="true"): ?>
                                        <button type="submit" name="update" value="Update" id="update" class="btn btn-primary">
											Update
										</button>
									<?php else : ?>
									
									 <input type="submit" class="btn btn-success" id="submitBtn" value="Save" name="save"/>
                  <!--<button type="submit" name="save" value="Save" id="submitBtn" class="btn btn-success">Save</button>-->
									<?php endif; ?>
                  <a href="logout.php"><button type="button" class="btn btn-danger float-right">Quit</button></a>
                </div>
                
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
			</div>
		  </div>
			</div>  
		 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
		
		
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!--<b>Version</b> 3.1.0-rc-->
    </div>
   <strong>Copyright &copy; 2023 <a href="http://www.mksoftservice.com" style="color:#233971;">M.K.Softservice</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
	$('#gjson').click(function(){
    alert('Generating..! Please use JSON Generating Tool..!');
	$('#formfield').attr('action','gjson.php');
    $('#formfield').submit();
});    
	$('#girn').click(function(){
	$('#irndiv').removeAttr('style');
	document.getElementById("irndiv").scrollIntoView({ behavior: "smooth" });
    //alert('Generating');
	//$('#formfield').attr('action','girn.php');
    //$('#formfield').submit();
	
});  
	$('#einv').click(function(){
	alert('Updating');
	$('#formfield').attr('action','girn.php');
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
		
	  	</script>
<script>
	$("#add_row").unbind('click').bind('click', function() {
      var table = $("#item_table");
      var count_table_tbody_tr = $("#item_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;
	  var billto=$('#billto').val();
		if(billto==''){
			swal('Please Select The Bill To..!');
		}
		else{
      $.ajax({
          url: 'getitemmst.php',
          type: 'post',
          dataType: 'json',
          success:function(response) {
                     
               var html = '<tr id="row_'+row_id+'">'+
				   
				     '<td style="width: 10px">'+row_id+'</td>'+
                   '<td style="width:250px">'+ 
                    '<select  class="select2 form-control item" id="desc_'+row_id+'" name="desc[]" style="width:100%;" onchange="getItemData('+row_id+')">'+
                        '<option value="">~~SELECT~~</option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.code+'">'+value.item+'</option>'; 
						 });
                        
                      html += '</select>'+
                    '</td>'+ 
					
					'<td style="width:110px"><input type="text" name="hsn[]" id="hsn_'+row_id+'" class="form-control"><input type="hidden" name="itemnm" id="itemnm_'+row_id+'"></td>'+
					'<td style="width:100px"><input type="text" name="qty[]" onkeyup="qtykeyup('+row_id+')" id="qty_'+row_id+'" class="form-control"></td>'+
					'<td style="width:80px">'+ 
                    '<select  class="select2 form-control size" id="size_'+row_id+'" name="size[]" style="width:100%;">'+
                        '<option value="">~~SELECT~~</option>'+
			  			'<option>20</option>'+
						'<option>40</option>';
					  html += '</select>'+
                    '</td>'+
					'<td style="width:150px"><input type="text" name="rate[]" onkeyup="qtykeyup('+row_id+')" id="rate_'+row_id+'" class="form-control"></td>'+
					'<td><input type="text" tabindex="-1"  name="gstrate[]" id="gstrate_'+row_id+'" style="width:50px;text-align:right" class="form-control"> </td>'+
					'<td><input type="text" tabindex="-1" name="gstamt[]" id="gstamt_'+row_id+'" style="width:80px;text-align:right" class="form-control"></td>'+
					'<td style="width:160px"><input type="text" name="amt[]"  id="amt_'+row_id+'" class="form-control"></td>'+
                    '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-minus"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#item_table tbody tr:last").after(html);  
              }
              else {
                $("#item_table tbody").html(html);
              }

              $(".item").select2();
			  $(".size").select2();
          }
        });
		}
      return false;
    });

function removeRow(tr_id)
  {
    $("#item_table tbody tr#row_"+tr_id).remove();
    subAmount();
  }	
function getItemData(row_id)
  {
    var item = $("#desc_"+row_id).val();    
	if(item == "") {
      $("#hsn_"+row_id).val("");
	  $("#gstrate_"+row_id).val("");
	  } else {
      $.ajax({
        url: 'getitemdtl.php',
        type: 'post',
        data: {desc : item},
        dataType: 'json',
        success:function(response) {
          $("#hsn_"+row_id).val(response[0].hsn);
		  $("#gstrate_"+row_id).val(response[0].igst);
 		 var stcode=$('#stcode').val();
		 if(stcode=='24'){
		 	$('#cgst').val(response[0].cgst);
			$('#sgst').val(response[0].sgst);
			$('#igst').val(0);
		 }
		 else{
			 $('#cgst').val(0);
			 $('#sgst').val(0);
			$('#igst').val(response[0].igst);
		 }
		 } // /success
      }); // /ajax function to fetch the product data 
	}
  }
function subAmount() {
  var tableProductLength = $("#item_table tbody tr").length;
    var ttl=0;
	var ttlcess=0;
    for(x = 0; x < tableProductLength; x++) {
      var tr = $("#item_table tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(4);
		var rt=$("#rate_"+count).val();
		var qty=$("#qty_"+count).val();
		if(rt==''){rt=0;}
		if(qty==''){qty=0;}
		var amt=parseFloat(qty)*parseFloat(rt);
		amt=amt.toFixed(2);
		$("#amt_"+count).val(amt);
		var gstrate=$('#gstrate_'+count).val();
		var gstamt=(parseFloat(amt)*gstrate)/100;
		$("#gstamt_"+count).val(gstamt);
		ttl=parseFloat(ttl)+parseFloat(amt);
		} // /for	
$("#ttl").val(ttl.toFixed(2));
 var cgst=$('#cgst').val();
var sgst=$('#sgst').val();
var igst=$('#igst').val();
var netamt=$('#ttl').val();
var camt=(parseFloat(netamt)*parseFloat(cgst)/100).toFixed(2);
var samt=(parseFloat(netamt)*parseFloat(sgst)/100).toFixed(2);
var iamt=(parseFloat(netamt)*parseFloat(igst)/100).toFixed(2);
$('#tcgst').val(camt);
$('#tsgst').val(samt);
$('#tigst').val(iamt);
var gttl=parseFloat(netamt)+parseFloat(camt)+parseFloat(samt)+parseFloat(iamt);
var round=Math.round(gttl);
var roundoff=round-gttl;
$('#tamt').val(round.toFixed(2));
$('#roundoff').val(roundoff.toFixed(2));
var exrate=$('#exrate').val();
if(exrate=='' || exrate=='0'){
	$('#usdtamt').val("0");
}else{
var usdtamt=parseFloat(gttl)/parseFloat(exrate);
usdtamt=usdtamt.toFixed(2);
$('#usdtamt').val(usdtamt);
}
  }
function qtykeyup(tr_id)
  {
   // $("#product_info_table tbody tr#row_"+tr_id).remove();
    subAmount();
  }
</script>
<!-- Page specific script -->
 <script src="../admintemplate/plugins/select2/js/select2.full.min.js"></script>
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
    </script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
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
$("#inventry").addClass("active");
$("#inventry").css("background-color","F0F0F0");
});

</script> 
	  <script>
		  function saveinvno(){
			  var invno=$('#invno').val();
		  $.ajax({
            type        : 'POST',
            url         : 'setinvno.php',
            data        : {invno:invno},
          
            success: function(data)          // recieved data from generateno.php
            {
                var msg = data;              
               document.getElementById('msg').value = msg;
            }
        })
	});
		  }
	  </script>
</body>
</html>
