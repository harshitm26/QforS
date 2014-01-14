
<?php
$mysql_hostname = "localhost";
$mysql_user = "harshit";
$mysql_password = "ujshujsh";
$mysql_database = "qfors2";

$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Opps some thing went wrong");

mysql_select_db($mysql_database, $con) or die("Opps some thing went wrong");
?>
