<?php
	session_start();
	require 'dblink.php';
	$_SESSION['money_cause'] = $_POST['cause'];
	echo"	<table>
				<tr><td><br>Enter the amount for ".$_POST['cause'].":</td>
					<td><input class='input' type='text' size='20' id='extract_amount' name='extract_amount'/></td>
				</tr>
				<tr><td>Enter the exact reason:</td>
					<td><input class='input' type='text' size='20' id='exact_cause' name='exact_cause'/></td>
				</tr>
				<tr><td><input type='button' value='Submit' id='mybutton' onclick='extract_money();' style='float:bottom'></td>
				</tr>
			</table>
		";
?>


	

