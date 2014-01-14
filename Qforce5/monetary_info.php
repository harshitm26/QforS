<?php
	session_start();
	require 'dblink.php';
	echo "session:".$_SESSION['uniqueid'];
	$uniqueid = $_SESSION['uniqueid'];
	$query = "select * from ngo_monetary where ngo_id = '".$uniqueid."'";
	
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	$out= "	<table>
				<tr>
					<td>Cause</td>
					<td>Total Amount</td>
					<td>Select Cause</td>
				</tr>
			";
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$out = $out."	<tr>
							<td>".$row['cause']."</td>
							<td>".$row['total']."</td>
							<td><input type='radio' name='cause_selection' value='".$row['cause']."'></td>
						</tr>
					";
	}
	echo $out."	<tr><td><input type='button' size='8' value='Submit' onclick= 'fill_money(\"cause_selection\");'/></td></tr>
			</table>";
?>


	

