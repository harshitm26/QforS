<?php
	session_start();
	require 'dblink.php';
	$id = $_POST['id'];
	$set = explode('_',$id);
	$_SESSION['donate_ngo'] = $ngo = $set[0];
	$_SESSION['donate_cause'] = $cause = $set[1];

?>
 	<br><p style='color:white;font-size:20px;'> Please Select your bank:</p>
			<select id='bank' name='bank' style='color:black;font-size:20px;'>
				<option value='Select'>Select</option>}
				<option value='Allahabad Bank'>Allahabad Bank</option>
				<option value='Andhra Bank'>Andhra Bank</option>
				<option value='Bank of Baroda'>Bank of Baroda</option>
				<option value='Bank of India'>Bank of India</option>
				<option value='Bank of Maharashtra'>Bank of Maharashtra</option>
				<option value='Canara Bank'>Canara Bank</option>
				<option value='Central Bank of India'>Central Bank of India</option>
				<option value='Corporation Bank'>Corporation Bank</option>
				<option value='Dena Bank'>Dena Bank</option>
			</select> 
			<br>
			<br/><input class='button_example' style='width:200;height:40' type='button' size='8' value='Donate Money' onclick='donate_money()'/>
			<br>
			<br/><input align='left' class='button_example' style='width:200;height:40' type='button' size='8' value='Back' onclick='userlogin();'/>	

