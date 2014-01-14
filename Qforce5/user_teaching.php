<?php
	
	//Session check and assign ...
	session_start();
	if (!isset($_SESSION['login_user_uniqueid']))
	{
		header("#user_login");
	}
	include("dblink.php");

?>

<h2>Choose NGO or time to know the available slots</h2>
<br/>
<table border="0" width="200px" cellpadding="1" cellspacing="3">
	<tr>
		<td><b>NGO</b></td>
		<td><b>Date</b></td>
		<td><b>Start Time</b></td>
		<td><b>End Time</b></td>
	</tr>
	<tr>
		<td>
			<select name="ngo_name" id="ngo_name" onchange="showUser()">
				<option value="">Choose NGO</option>
			<?php
				$sql="SELECT distinct ngo_id FROM ngo_teaching";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_array($result))
				{
					$ngo_name = $row["ngo_id"];
					echo '<option value="'.$ngo_name.'">'.$ngo_name.'</option>'; 
				}
			?>
			</select>
		</td>
		<td>
			<input type="text" id="date" style="width: 80px;" name="date" onchange="showUser()"/>
		</td>
		<td>
			<input type="text" id="start_time" style="width: 80px;" name="start_time" onchange="showUser()" />
		</td>
		<td>
			<input type="text" id="end_time" style="width: 80px;" name="end_time" onchange="showUser()"/>
		</td>
	</tr>
</table>

<hr/>
<div id="txtHint"><b>Free Slots information will be shown here.</b></div>

