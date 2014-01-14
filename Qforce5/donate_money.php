<?php
	session_start();
	require 'dblink.php';
	$bank = $_POST['bank'];
/*
	echo "Donate Using: ".$bank;
*/
	echo "	<table align='center'>
				<tr><td align='left'style='color:white;font-size:20px;'>Amount you want to donate:</td>
					<td align='right'><input class='button_example' style='width:200;height:40' type='text' size='20' id='amount' name='amount'/></td>
				</tr>
			</table><br>
		";
	echo "<input class='button_example' style='width:200;height:40' type='button' value='Donate' size='20' bank='mybutton' name='password' onclick= 'insert_money(\"".$bank."\");'/>";
	echo "<br/><br/><input align='left' class='button_example' style='width:200;height:40' type='button' size='8' value='Back' onclick='userlogin();'/>";
	
/*
	echo "session:".$_SESSION['uniquebank'];
	$uniquebank = $_SESSION['uniquebank'];
	
	
	
	
	$query = "select * from ngo_monetary";
	echo $query;
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	$out= "	<table>
				<tr>
					<td>NGO</td>
					<td>Cause</td>
					<td>Total Amount</td>
				</tr>
			";
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$out = $out."	<tr>
							<td>".$row['ngo_bank']."</td>
							<td>".$row['cause']."</td>
							<td><input type='radio' name='ngo_selection' value='".$row['ngo_bank']."'></td>
						</tr>";					
	}
	$out = $out."<tr><td><input class='buttonclass' type='button' size='8' value='Donate' onclick='donate_ngo();'/>
			</td></tr>
			</table>
			";
	echo $out;
*/
?>


	

