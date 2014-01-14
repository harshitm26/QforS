
<?php
	session_start();
	include("dblink.php");

	$today = date("Y-m-d");
	$sql = "";
	if(isset($_SESSION['uniqueid']))
	{
		$sql = "select * from user_teaching where ngo_id='" . $_SESSION['uniqueid'] . "' and date >= '$today' order by date";
	}
	else if(isset($_SESSION['login_user_uniqueid']))
	{
		$sql = "select * from user_teaching where user_id='" . $_SESSION['login_user_uniqueid'] . "' and date >= '$today' order by date";
	}

	//echo $sql;
	$result=mysql_query($sql,$con);
	if(!$result)
		die(mysql_error());

	while($row=mysql_fetch_array($result))
	{
		$num_people = $row['num_people'];
		$date = $row['date'];
		$start_time = $row['start_time'];
		$end_time = $row['end_time'];
		$exact_place = $row['exact_place'];
		if(isset($_SESSION['uniqueid']))
		{
			$id = $row['user_id'];
		}
		else
		{
			$id = $row['ngo_id'];
		}
		
		echo "$id $num_people $date $start_time $end_time $exact_place <br/>";
	}

?>