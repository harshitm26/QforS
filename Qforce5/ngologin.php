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
			echo "<br>Incorrect Password or NGO user name. Please check and enter again.<br><input class='button_example' style='width:200;height:40' type='button' onclick='get_ngo_login();' value='Back' />";
		}else{
			if($row = mysql_fetch_array($result,MYSQL_ASSOC))
				echo "<br/><text style='color:white;font-size:25px;'>Welcome ".$row["name"]."</text><br><br>";
				echo '
						<table width="700">
							<tr>
								<td>
									<input class="button_example" style="width:200;height:40" type="button" size="8" value="Teaching" onclick="ngo_teaching();"/>
									<br>
								</td>
								<br>
							</tr>
							<tr>
								<td>
									<input class="button_example" style="width:200;height:40" type="button" size="8" value="Monetary" onclick="showsubbuttons(\'.button_example1\');"/>
								</td>
							</tr>
							<tr>
								<td>
									<input class="button_example1" style="width:120;height:30;display:none;" type="button" value="Add Cause" onclick="showsidediv(\'sidediv5\');"/>
								</td>
								<td>
									<input class="button_example1" style="width:120;height:30;display:none;" type="button" value="Extract money" onclick="monetary_info();" />
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<td>
									<div id="sidediv5" style="display:none;">
										<input class="button_example2" style="width:300;height:25; type="text" size="20" id="ngo_cause" name="ngo_cause"/>
								
										<input class="button_example2" style="width:100;height:25;type="button" size="8" value="Submit" onclick="add_cause();"/>
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								
								<td></td>
							</tr>
							<tr>
								<td>
									<input class="button_example" style="width:200;height:40" type="button" size="8" style="width:200;height:30" value="Booked Slots" onclick="ngo_display_teach_info();"/>
								</td>
							</tr>
							<tr>
								<td>
									<input class="button_example" style="width:200;height:40" type="button" size="8" value="Food" onclick="others();"/>
									<br>
								</td>
							</tr>
							<tr>
								<td>
									<input class="button_example" style="width:200;height:40" type="button" size="8" value="Non Monetary" onclick="others();"/>
								</td>
							</tr>
							<tr>
								<td>
									<br>
									<input class="button_example" style="width:200;height:40" type="button" size="8" value="Back" onclick="ngologin();"/>
								</td>
							</tr>
							</table>	
						';

			}
		}
			?>

