<?php
	session_start();
	require 'dblink.php';
	//echo "session:".$_SESSION['login_user_uniqueid'];
	$uniqueid = $_SESSION['login_user_uniqueid'];
	$query = "select * from ngo_monetary";
	//echo $query;
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	$out= "	
			<div >
			<table >
				<tr>
					<th>NGO</th>
					<th>Cause</th>
					<th>Total Amount</th>
				</tr>
			";
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$out = $out."	<tr>
							<td>".$row['ngo_id']."</td>
							<td>".$row['cause']."</td>
							<td><input type='radio' name='ngo_selection' value='".$row['ngo_id']."_".$row['cause']."'></td>
						</tr>";					
	}
	$out = $out.'
			</table>
			</div>
			<input class="button_example" style="width:200;height:40" type="button" size="8" value="Donate" onclick="ngo_selection1(\'ngo_selection\');"/>
			<input align="left" class="button_example" style="width:200;height:40" type="button" size="8" value="Back" onclick="userlogin();"/>
			';
	
/*
	$out = $out.'<tr><td><input class="buttonclass" type="submit" size="8" value="Donate" onclick="temp()"/>
			</td></tr>
			</table>
			';
*/
/*
	$out = $out."<tr><td><input class='buttonclass' type='button' size='8' value='Donate' onclick='ngo_selection1('ngo_section');'/>
			</td></tr>
			</table>
			";
			
*/
	echo $out;
?>


	

