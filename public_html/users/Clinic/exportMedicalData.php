<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Medical Personnel.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'connect.php';
	
	$output = "";
	
	$output .="
		<table>
			<thead>
				<tr>
					<th>Fullname</th>
					<th>Email Address</th>
					<th>Contact Number</th>
					<th>License No.</th>
					<th>PTR No.</th>
					<th>S2</th>
				</tr>
			<tbody>
	";
	
	$query = $db->query("SELECT * FROM `staffdetails`") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
		
	$output .= "
				<tr>
					<td>".$fetch['fullname']."</td>
					<td>".$fetch['email_add']."</td>
					<td>".$fetch['phone_num']."</td>
					<td>".$fetch['license_number']."</td>
					<td>".$fetch['ptr_no']."</td>
					<td>".$fetch['s2']."</td>
				</tr>
	";
	}
	
	$output .="
			</tbody>
			
		</table>
	";
	
	echo $output;
	
	
?>