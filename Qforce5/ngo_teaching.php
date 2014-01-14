

<?php
	session_start();
	include("dblink.php");
//echo "Ho mnan";
	$ngo_username = $_SESSION['uniqueid'];
	if (isset($_POST['ngo_exact_place']))
	{
	$exact_place = $_POST['ngo_exact_place'];
	$date = $_POST['ngo_date'];
	$num_people = $_POST['ngo_num_people'];
	$start_time = $_POST['ngo_start_time'];
	$end_time = $_POST['ngo_end_time'];
	$lat = '';
	$long = '';

	if ($date == '0000-00-00')
		die('');
	$query = "Insert into ngo_teaching(ngo_id,num_people,date,start_time,end_time,exact_place,lat,`long`) values ('".$ngo_username."','".$num_people."','".$date."','". $start_time."','".$end_time."','".$exact_place."','".$lat."','".$long."');";
	//echo $query;
	$result = mysql_query($query,$con);
	if ($result)
	{
		echo "Data successfully recorded<br/><input class='buttonclass' type='button' size='8' value='Back' onclick='ngologin();'/>";
	}
	else
	{
		;//die("<br>error in query".mysql_error());
	}
}
else
{
	?>
	<form method='post' action='' align='center'>
                                    <table align='center'>
                                    <tr>
                                        <td align='left'>
                                            Address:
                                        </td>
                                        <td align='right'>
                                            <input class='input' type='text' size='20' name='ngo_exact_place' id='ngo_exact_place' />
                                        </td>
                                        <td align 'left'>
                                            <input type='button' value='Find on map' id='mybutton2' onclick='findplace();' />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left'>
                                            Date:
                                        </td>
                                        <td align='right'>
                                            <input class='input' type='text' size='20' name='ngo_date' id='ngo_date'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left'>
                                            Number of People:
                                        </td>
                                        <td align='right'>
                                            <input class='input' type='text' size='20' name='ngo_num_people' id='ngo_num_people'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left'>
                                            Start Time:
                                        </td>
                                        <td align='right'>
                                            <input class='input' type='text' size='20' name='ngo_start_time' id='ngo_start_time'/>
                                        </td>
                                    </tr>

                                     <tr>
                                        <td align='left'>
                                            End Time:
                                        </td>
                                        <td align='right'>
                                            <input class='input' type='text' size='20' name='ngo_end_time' id='ngo_end_time'/>
                                        </td>
                                    </tr>




                                    <tr>
                                        <td colspan='2' align='center'>
                                            <input type='button' value='Submit' onclick='ngo_teaching();' style='float:bottom'>
                                        </td>
                                    </tr>
                                    </table>
                                </form>
                                <?php
}


//num_people	date	start_time	end_time	exact_place	




?>