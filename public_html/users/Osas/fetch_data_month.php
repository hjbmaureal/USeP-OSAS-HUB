<?php 
include('conn.php');

sleep(1);

if (isset($_POST['request'])) {
	$request = ($_POST['request']);
	$query = "SELECT * FROM sl_accomplishment_report WHERE month  = '$request'";
	$result = mysqli_query($conn, $query);
	//$result = $conn->query("SELECT * FROM sl_accomplishment_report WHERE month  = '$request'");
	$count = mysqli_num_rows($result); 

?>

<table class="table">
	<?php
		if($count){
	?>
	<thead>
	    <tr>
	        <th>SL ID</th>
	        <th class="max">Full Name</th>
	        <th>Course & Year</th>
	        <th>Semester</th>
	        <th class="max">Assigned Office</th>
	        <th>Immediate Supervisor</th>
	    </tr>

	    <?php
		}
		else{
			echo "Sorry No Record Found!";
		}
		?>
	</thead>
	<tbody>
		<?php while ($row  = , fetch_assoc($result)) {
			
		?>
		<tr>
			<td><?php echo $data['applicant_id']?></td>
            <td><?php echo $data['applicant_name']?></td>
            <td><?php echo $data['course_year']?></td>
            <td><?php echo $data['sem_year']?></td>
            <td><?php echo $data['unit_assigned']?></td>
            <td><?php echo $data['staff_requested_by']?></td>
		</tr>
		<?php
		}
		?>
	</tbody>


</table>

<?php 
}
?>