<?php
session_start();
$ngo_id=$_GET["ngo"];
$given_date=$_GET["date"];
$start_time=$_GET["start_time"];
$end_time=$_GET["end_time"];

include("dblink.php");

function query_if_free($sql_1,$sql_2,$date)
{
	global $start_time,$end_time,$con,$ngo_id,$is_printed;
	//echo "$sql_1<br/>";
	//echo "$sql_2<br/>";
	$result_1=mysql_query($sql_1,$con);
	if (!$result_1)
		die(mysql_error());
	$total_num = 0;
	$place = "";
	while($row_1=mysql_fetch_array($result_1))
	{
		$num_people = $row_1['num_people'];
		$total_num += $num_people;
		$place = $row_1['exact_place'];
	}

	//echo "#$total_num#";
	$result_2=mysql_query($sql_2,$con);
	$booked_num = 0;
	while($row_2=mysql_fetch_array($result_2))
	{
		$entry_user = $row_2['user_id'];
		//Gett $user_id by session
		$user_id = $_SESSION['login_user_uniqueid'];
		if($entry_user == $user_id)
		{
			return -2;
		}
		$num_people = $row_2['num_people'];
		$booked_num += $num_people;
	}
	//echo "#$booked_num#";

	$valid_num = $total_num - $booked_num;

	if ($valid_num > 0)
	{
		$is_printed = true;

			echo "<tr><td><input type = 'radio' name='book' value='".$ngo_id."#".$valid_num."#".$date."#".$start_time."#".$end_time."#".$place."''></td><td>".$place."</td><td>" . $ngo_id . "</td><td>" . $valid_num . "</td><td>".$date."</td><td>".$start_time."</td><td>".$end_time."</td></tr>";
	}

	return;
}


function check_if_free($ngo_id,$exact_place)
{
	global $given_date,$start_time,$end_time,$con;
	//echo $ngo_id;
	if ($given_date == "")
	{
		$today = date("Y-m-d");
		$sql = "select distinct date from ngo_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date >= '$today' order by date";
		$result=mysql_query($sql,$con);
		while($row=mysql_fetch_array($result))
		{
			$date = $row['date'];
			$sql_1 = "select * from ngo_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date = '$date' and start_time <= '$start_time' and end_time >= '$end_time'";
			$sql_2 = "select * from user_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date = '$date' and ((end_time >= '$start_time' and end_time <= '$end_time') or (start_time >= '$start_time' and start_time <= '$end_time') )";
			query_if_free($sql_1,$sql_2,$date);
		}		
	}
	else
	{
		$date = $given_date;
		$sql_1 = "select * from ngo_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date = '$date' and start_time <= '$start_time' and end_time >= '$end_time'";
		$sql_2 = "select * from user_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date = '$date' and ((end_time >= '$start_time' and end_time <= '$end_time') or (start_time >= '$start_time' and start_time <= '$end_time') )";
		query_if_free($sql_1,$sql_2,$date);
	}
	return;
}


if ($start_time == "" && $end_time != "")
	die("<b>Please fill the start time</b>");



$is_printed = false;
if ($end_time != "" && strtotime($start_time) >= strtotime($end_time))
	die("<b>Start time must be less than end time</b>");

echo "<form action='book_slot.php' method='post'><table border='0' cellpadding='1' cellspacing='3'>";
echo "<tr><td></td><td><b>Place</b></td><td><b>NGO</b></td><td><b>Number</b></td><td><b>Date</b></td><td><b>Start Time</b></td><td><b>End Time</b></td></tr>";

if ($ngo_id == "")
{
	if ($end_time == "")
	{
		$timestamp = strtotime($start_time) + 60*60;
		$end_time = date('H:i:s', $timestamp);
	}
		
	//Order by priority if later
	$sql="SELECT distinct ngo_id,exact_place FROM ngo_teaching";
	$result=mysql_query($sql,$con);
	while($row=mysql_fetch_array($result))
	{
		$ngo_id = $row["ngo_id"];
		$exact_place = $row["exact_place"];
		check_if_free($ngo_id,$exact_place);
	}
}
else
{
	if ($start_time == "")
	{
		for($i=0;$i<24;$i++)
		{
		  	$start_time = "$i:00:00";
		  	for($j=$i+1;$j<24;$j++)
		  	{	
		  		$end_time = "$j:00:00";

				$sql="SELECT distinct exact_place FROM ngo_teaching where ngo_id = '$ngo_id'";
					$result=mysql_query($sql,$con);
					while($row=mysql_fetch_array($result))
					{
						$exact_place = $row["exact_place"];
		  				check_if_free($ngo_id,$exact_place);
		  			}
		  	}
		}    
	}
	else
	{
		if ($end_time == "")
		{
			$timestamp = strtotime($start_time) + 60*60;
			$end_time = date('H:i:s', $timestamp);
		}

		$sql="SELECT distinct exact_place FROM ngo_teaching where ngo_id = '$ngo_id'";
		$result=mysql_query($sql,$con);
		while($row=mysql_fetch_array($result))
		{
			$exact_place = $row["exact_place"];
			check_if_free($ngo_id,$exact_place);
		}
	}

}

echo "</table>";
if ($is_printed)
{
	echo "<input type='button' value='Book' onclick='book_slot();'/>";
}
else
{
	echo "<b>Unfortunately no slots were present.</b>";
}
echo "</form>";



?>
