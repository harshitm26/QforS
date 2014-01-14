<?php
	session_start();
	require 'dblink.php';
	$cause = $_SESSION['money_cause'];
	$amount = $_POST['amount'];
	$exact_reason = $_POST['exact_cause'];
	$query = "select * from ngo_monetary where ngo_id= '".$_SESSION['uniqueid']."' and cause = '".$cause."';";
/*
	echo $query;
*/
	$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$total = $row['total'];
	if($total < $amount){
		echo "<br> Sorry. You don't have sufficient balance in your account.";
	}
	else{
		$new_total= $total - $amount;
		$query = "update ngo_monetary set total ='".$new_total."' where ngo_id = '".$_SESSION['uniqueid']."' and cause
		 = '".$cause."';";
		$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
/*
		echo "<br>".$query;
*/
		
		$query ="insert into ngo_money_spent values ('".$_SESSION['uniqueid']."','".$amount."','".$exact_reason."');";
/*
		echo "<br>".$query;
*/
		$result = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
		$query = "select * from user_monetary where ngo_id='".$_SESSION['uniqueid']."' and cause='".$cause."' and reason = 'none';";
		
/*
		echo "<br>".$query;
*/
		$result1 = mysql_query($query,$con) or die(" <br>Something went wrong in query".mysql_error());
		$remaining_amount = $amount;
		while($row = mysql_fetch_array($result1,MYSQL_ASSOC)){
			if($row['amount'] <= $remaining_amount){
				$remaining_amount = $remaining_amount - $row['amount'];
				$query = "update user_monetary set reason ='".$exact_reason."' where time_donated ='".$row['time_donated']."';";
/*
				echo "<br> if :".$query;
*/
				$result = mysql_query($query,$con) or die(" <br>Something went wrong in query 1".mysql_error());
			}
			else{
				if($remaining_amount !=0){
					$user_remaining_amount = $row['amount'] - $remaining_amount;
					$query = "update user_monetary set time_donated= '".$row['amount']."',reason ='".$exact_reason."', amount ='".$remaining_amount."' where time_donated = '".$row['time_donated']."';";
/*
					echo "<br>else ".$query.$row['time_donated'];
*/
					$result = mysql_query($query,$con) or die(" <br>Something went wrong in query 2".mysql_error());
					$query = "insert into user_monetary values('".$_SESSION['uniqueid']."','".$row['user_id']."','".$row['anon']."',default,'".$row['cause']."','".$user_remaining_amount."','none');";
/*
					echo "<br>".$query;
*/
					$result = mysql_query($query,$con) or die(" <br>Something went wrong in query 3".mysql_error());
					break;
				}
				else {
/*
					echo "<br> remaining amount  > 0 remaining amount ".$remaining_amount;
*/
				}
			}	
		}
		
		echo "<br>Successfully extracted Rs.".$amount." for ".$exact_reason;
	}
	
	
?>


	

