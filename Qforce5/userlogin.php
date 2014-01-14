<?php
	session_start();
	session_destroy();
	session_start();
	require 'dblink.php';
	ini_set('display_errors',1);
	error_reporting(E_ALL | E_STRICT); 
	if(!isset($_SESSION['login_user_uniqueid'])){
		$_SESSION['login_user_uniqueid'] = $user_uniqueid = $_POST['login_user_uniqueid'];
		$_SESSION['login_user_password'] = $user_password = $_POST['login_user_password'];
		$query = "select * from user where user_id='".$_POST['login_user_uniqueid']."' and password='".$_POST['login_user_password']."';";
	//echo $query;
		$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());	
		if(!mysql_num_rows($result)) 
		{
			echo "<br>Incorrect Password or user name. Please check and enter again.<br><br><input class='button_example' style='width:200;height:40' type='button' onclick='get_user_login();' value='Back' />";
		}
		else
		{
			while($row = mysql_fetch_array($result,MYSQL_ASSOC))
			{
				echo "<br/><h1 style='color:white;margin-left:25px;'>Welcome ".$row["name"]."</h1>";
			}
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:40' value='Donate Money' onclick='user_donation();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:40' value='Book to Teach' onclick='user_teaching();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:30' value='My Booked Slots' onclick='user_display_teach_info();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:30' value='See places around me' onclick='suggest_places();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:40' value='Verify Fund-Usage' onclick='verify_fund_usage();'/><br/>";
			
		}
	}
	else{
		echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:40' value='Donate Money' onclick='user_donation();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:40' value='Book to Teach' onclick='user_teaching();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:30' value='My Booked Slots' onclick='user_display_teach_info();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:30' value='See places around me' onclick='suggest_places();'/><br/>";
			echo "<br/><input align='left' class='button_example' type='button' size='8' style='width:200;height:40' value='Verify Fund-Usage' onclick='verify_fund_usage();'/><br/>";
/*
		echo "<br/><input align='left' class='buttonclass' type='button' size='8' value='Donate Food' onclick='food_donation();'/><br/>";
		echo "<br/><input align='left' class='buttonclass' type='button' size='8' value='Donate Food' onclick='medicine_donation();'/><br/>";
*/
	}
?>
