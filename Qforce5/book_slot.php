<?php


session_start();
if (!isset($_SESSION['login_user_uniqueid']))
{
	header("#user_login");
}


define('USER_ERROR', '-2');
define('BOOK_ERROR', '0');
define('INSERT_ERROR', '-1');


function book_slot($user_id,$ngo_id,$exact_place,$date,$start_time,$end_time)
{
	include("dblink.php");
	$sql = "select * from ngo_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date = '$date' and start_time <= '$start_time' and end_time >= '$end_time'";
	
	$result=mysql_query($sql,$con);
	$total_num = 0;
	while($row=mysql_fetch_array($result))
	{
		$num_people = $row['num_people'];
		$total_num += $num_people;
	}
	
	$sql = "select * from user_teaching where ngo_id='$ngo_id' and exact_place = '$exact_place' and date = '$date' and ((end_time >= '$start_time' and end_time <= '$end_time') or (start_time >= '$start_time' and start_time <= '$end_time') )";
	$result=mysql_query($sql,$con);
	$booked_num = 0;
	if (!$result)
	die(mysql_error());
	
	while($row=mysql_fetch_array($result))
	{
		$entry_user = $row['user_id'];
		if($entry_user == $user_id)
		{
			return USER_ERROR;
		}
		$num_people = $row['num_people'];
		$booked_num += $num_people;
	}
	$valid_num = $total_num - $booked_num;
	
	if ($valid_num == 0)
	{
		
		return BOOK_ERROR;		
	}
	
	if ($valid_num > 50)
		$valid_num = 50;
	
	$sql = "insert into user_teaching(ngo_id,num_people,date,start_time,end_time,exact_place,user_id) values ('$ngo_id','$valid_num','$date','$start_time','$end_time','$exact_place','$user_id')";
 	if (mysql_query($sql))
		return $valid_num;
	else 
		return INSERT_ERROR;

}

//if(isset($_POST["book"]))

$data=$_POST["book"];

$data_arr = explode("#",$data);

$ngo_id = $data_arr[0];
$num = $data_arr[1];
$date = $data_arr[2];
$start_time = $data_arr[3];
$end_time = $data_arr[4];
$place = $data_arr[5];
//Session
$user_id = $_SESSION['login_user_uniqueid'];
//echo "$ngo_id $num $date $start_time $end_time $place";


$status = book_slot($user_id,$ngo_id,$place,$date,$start_time,$end_time);
//echo '<!DOCTYPE HTML><html><head><title>SLOT BOOKING</title><script>alert("';

switch ($status):
    case USER_ERROR:
        echo "User already booked in between these slots";
        break;
    case BOOK_ERROR:
        echo "No booking available";
        break;
    case INSERT_ERROR:
        echo "Unable to Book";
        break;
    default:
    	if ($status > 0)
        	echo "Slot book successfully for ".$status." people";
endswitch;

//echo '")</script><meta http-equiv="REFRESH" content="0;url=user_teaching.php"></head></html>';




?>