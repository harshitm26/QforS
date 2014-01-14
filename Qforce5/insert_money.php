<?php
	session_start();
	require 'dblink.php';
	$amount = $_POST['amount'];
	$bank = $_POST['bank'];
/*
	echo "<br>Donated Rs.".$amount." using ".$bank;
*/
	$query = "select * from ngo_monetary where ngo_id = '".$_SESSION['donate_ngo']."' and cause = '".$_SESSION['donate_cause']."';";
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$total = $row['total'];
	}
	$new_total = $total + $amount;
	$query = "update ngo_monetary set total= ".$new_total." where ngo_id = '".$_SESSION['donate_ngo']."' and cause = '".$_SESSION['donate_cause']."';";
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	
	$query = "insert into user_monetary values ('".$_SESSION['donate_ngo']."','".$_SESSION['login_user_uniqueid']."','1',default,'".$_SESSION['donate_cause']."','".$amount."','none');";
/*
	echo "<br>".$query;
*/
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	
	
	
	echo "<br><p style='color:white;font-size:20px;'>Thank you for donating Rs.".$amount." Your contribution matters. </p>";
	echo "<br/><input align='left' class='button_example' style='width:200;height:40' type='button' size='8' value='Back' onclick='userlogin();'/>";
?>
