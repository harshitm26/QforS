<?php
	session_start();
	require 'dblink.php';
/*
	ini_set('display_errors',1);
	error_reporting(E_ALL | E_STRICT); 
*/
	$_SESSION['user_uniqueid'] = $user_uniqueid = $_POST['user_uniqueid'];
	$_SESSION['user_password'] = $user_password = $_POST['user_password'];
	
	
	$query = "Insert into user(user_id, name,last_name,password,phone_num,email_id,exact_place,lat,`long`) values ('".$_POST['user_uniqueid']."','".$_POST['name']."','".$_POST['last_name']."','".$_POST['user_password']."','". $_POST['user_contact']."','".$_POST['user_email']."','".$_POST['user_exact_address']."','','');";
	echo $query;
	$result = mysql_query($query,$con)or die("error in connection");
	echo "1 record added";
?>
