<html> 
    <head> 
        <title>Naisha Empty Park Private Ltd</title> 
    </head> 
    <body> 
        <table cellspacing="0" style="background-color:#e5e5e5;width: 100%;"> 
            <tr> 
				<td>
					<center>
					<table style="background-color:white;width:70%;border-radius:5px;margin:10px;">
						<tr>
							<td><center><img src="dist/img/nep.jpeg" style="width:260px;height:120px;"></center></td>
						</tr>
						<tr>
							<td style="padding-left:55px;font-weight:bold;padding-top:40px;font-size:15px">Welcome To Naisha Empty Park Private Ltd..!</td>
						</tr>
						<tr>
							<td style="padding-left:55px;padding-top:20px;font-size:15px">Please Login To Below Web and Download Your Tax Invoice And Ledger<br><a href="http://mksoftservice.com/Naisha/customerlogin.php">http://mksoftservice.com/Naisha/customerlogin.php</a></td>
						</tr>
						<tr>
							<td style="padding-left:55px;padding-top:20px"><b>Your Invoice Details Are As Below :</b>
							</td>
						</tr>
						<tr>
							<td>
								<center>
						<table style="background-color:#ecf8ff;width:80%;margin-bottom:40px;margin-top:20px">
						<tr>
						<?php $name=$_POST['Name'];
						 ?>
							<td><?php echo $name; ?></td>
							<!--<td style="padding-left:40px;padding-top:20px;padding-bottom:20px"><?php echo "<br><b>Tax Invoice Date : </b>".$date."<br><br><b>Tax Invoice No :  </b>".$invno."<br><br><b>Party Name :  </b>".$name."<br><br><b>Container :  </b>".$qty."<br><br><b>Line Name :  </b>".$ship ; ?></td>-->
						</tr>
						</table>
								</center>
							</td>
						</tr>
							<tr>
							<td style="padding-left:55px;padding-top:10px"><b>Your Email Id Registered With Us :</b>
							</td>
						</tr>
						<tr>
							<td>
								<center>
						<table style="background-color:#ecf8ff;width:80%;margin-bottom:40px;margin-top:20px">
						<tr>
							<td style="padding-left:40px;padding-top:20px;padding-bottom:20px"><?php echo $email."<br>".$aemail; ?></td>
						</tr>
						</table>
								</center>
							</td>
						</tr>
					</table>
					</center>
				</td>
            </tr> 
        </table> 
    </body> 
    </html> 