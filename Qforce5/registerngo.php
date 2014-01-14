<?php
	session_start();
	require 'dblink.php';
/*
	ini_set('display_errors',1);
	error_reporting(E_ALL | E_STRICT); 
*/
	$_SESSION['uniqueid'] = $ngousername = $_POST['uniqueid'];
	$_SESSION['password'] = $password = strtotime($_POST['password']);
	
	$uniqueid = $_POST['uniqueid'];
	$ngo_name = $_POST['ngo_name'];
	$contact = $_POST['contact'];
	$exact_address = $_POST['exact_address'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = "Insert into ngo(ngo_id,name,password,contact,email_id, exact_place, lat,`long`) values ('".$uniqueid."','".$ngo_name."','".$password."','". $contact."','".$email."','".$exact_address."','','');";
	echo $query;
	$result = mysql_query($query,$con)or die("<br>error in query");
	echo "1 record added";
	
?>
