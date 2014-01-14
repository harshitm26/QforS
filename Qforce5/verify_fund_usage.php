<?php
	session_start();
	require 'dblink.php';
/*
	$_SESSION['money_cause'] = $_POST['cause'];
*/
	$query = "select * from user_monetary where user_id='".$_SESSION['login_user_uniqueid']."';";
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	$out="	<table>
				<tr><td>NGO</td>
					<td>Date</td>
					<td>Cause</td>
					<td>Amount</td>
					<td>Reason</td>
				</tr>
			";
			
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$out = $out."	<tr>
							<td>".$row['ngo_id']."</td>
							<td>".$row['time_donated']."</td>
							<td>".$row['cause']."</td>
							<td>".$row['amount']."</td>
							<td>".$row['reason']."</td>
						</tr>
					";
	}
	$out = $out."		<tr><td><input align='left'class='button_example' style='width:200;height:40' type='button' size='8' value='Back' onclick='userlogin();'/></td></tr>
					</table>";
	echo $out;
?>


	

