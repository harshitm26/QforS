<?php
	session_start();
	require 'dblink.php';
	$list = $_POST['cause'];
	$causes = explode(";",$list);
	foreach($causes as &$cause){
		
		$query = "Insert into ngo_monetary(ngo_id, cause, total) values ('".$_SESSION['uniqueid']."','".$cause."','0')";
		

		$result = mysql_query($query, $con) or die("Problem in cause insertion");
		
	}
	echo "<br/>Cause added successfully<br/>";
	
/*
	
	
	$query = "select * from ngo_monetary";
	
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
	$out = "<tr><td><input class='buttonclass' type='button' size='8' value='Donate' onclick='donate_ngo();'/>
			</td></tr>
			</table>
			";
	echo $out;
*/
?>


	

