<?php
	session_start();
	session_destroy();
	session_start();
	require 'dblink.php';
	ini_set('display_errors',1);
	error_reporting(E_ALL | E_STRICT); 
	if(!isset($_SESSION['login_uniqueid'])){
		$_SESSION['uniqueid'] =  $_POST['login_uniqueid'];
		$_SESSION['password'] =  $_POST['login_password'];
		//echo "session: ".$_SESSION['uniqueid'];
		
		$query = "select * from ngo where ngo_id='".$_POST['login_uniqueid']."' and password='".$_POST['login_password']."';";
		//echo $query;
		$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
		if(!mysql_num_rows($result)) {
			echo "<br>Incorrect Password or NGO user name. Please check and enter again.<input type='button' onclick='get_ngo_login();' value='Back' />";
		}else{
			if($row = mysql_fetch_array($result,MYSQL_ASSOC))
				echo "<br/>Welcome ".$row["name"];
			}
		}
			?>

	
<table width="700">
<tr>
	<td>
		<input class='button_example' style='width:200;height:40' type='button' size='8' value='Teaching' onclick='teaching();'/>
		<br>
	</td>
	<br>
</tr>
<tr>
	<td>
		<input class='button_example' style='width:200;height:40' type='button' size='8' value='Monetary' onclick='showsubbuttons(".sbuttonclass");'/>
		<br>
	</td>
</tr>
<tr>
	<td>
		<input class='sbuttonclass' style='display:none;' type='button' value='Add Cause' onclick='showsidediv("sidediv5");'/>
	</td>
</tr>
<tr>
	<td>
		<div id='sidediv5' style='display:none;'>
			<input class='input' type='text' size='20' id='ngo_cause' name='ngo_cause'/>
			<br/>
			<input type='button' size='8' value='Submit' onclick='add_cause();'/>
		</div>
	</td>
</tr>
<tr>
	<td></td>
	<td>
		<input class='sbuttonclass' style='display:none;' type='button' value='Extract money' onclick='monetary_info();' />
	</td>
	<td></td>
</tr>
<tr>
	<td>
		<input class='button_example' style='width:200;height:40' type='button' size='8' value='Food' onclick='others();'/>
		<br>
	</td>
</tr>
<tr>
	<td>
		<input class='button_example' style='width:200;height:40' type='button' size='8' value='Medicine' onclick='others();'/>
		<br>
	</td>
</tr>
<tr>
	<td>
		<input class='button_example' style='width:200;height:40' type='button' size='8' value='Back' onclick='ngologin();'/>
	</td>

</tr>

</table>
		
