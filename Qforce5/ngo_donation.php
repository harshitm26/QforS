<?php
	session_start();
	require 'dblink.php';
	echo "session:".$_SESSION['uniqueid'];
	$uniqueid = $_SESSION['uniqueid'];
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
							<td>".$row['ngo_id']."</td>
							<td>".$row['cause']."</td>
							<td><input type='radio' name='ngo_selection' value='".$row['ngo_id']."'></td>
						</tr>";					
	}
	$out = $out."<tr><td><input class='buttonclass' type='button' size='8' value='Donate' onclick='donate_ngo();'/>
			</td></tr>
			</table>
			";
	echo $out;
?>


	

