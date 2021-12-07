<?php
session_start();
  include_once ("../../php/connect_db.php");
?>
<style type="text/css">
	label{
		width:170px;
	}
	#form{
		margin-top:50px;
		margin-left: 65px;

	}


</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container">
	<p></p>
	<center>
		<p><b>University of Southeastern Philippines</b><p>
		<p><i>TAGUM CAMPUS</i></p>
		<P></P>
	</center>

	
		<table class="table table-bordered">
			<div id="form">

			<?php
				$grantee_id= $_GET['grantee_id'];
			

			$query = "SELECT * FROM scholarship_general_info WHERE grantee_id='$grantee_id'";
			$result = $conn->query($query);
			while($row=$result->fetch_assoc()){

			
			?>
			<div>
		    	<div class="row">
		        <div class="col-6">
		        	<label>Fullname</label><?php echo $row['fullname'] ?>
		      </div>
		     
		        <div class="col-6">
		        	<label>Student ID</label><?php echo $row['student_id'] ?>
		      </div>
		      </div>


		        <div class="row">
		        <div class="col-6">
		        	<label>Course</label>
		        	<label><?php echo $row['coursename'] ?></label>
		      </div>
		 
		      <div class="col-6">
		      	<label>Major</label><?php echo $row['major'] ?>
		      </div>
		      </div>

		      <div class="row">
		        <div class="col-6">
		        	<label>College</label><?php echo $row['college_name'] ?>
		      </div>

		      <div class="col-6">
		      	<label>Status</label><?php echo $row['status_name'] ?>
		      </div>
		      </div>


			  <br><label><b>SCHOLARSHIP DETAILS</b></label>

			  <div class="row">
		      <div class="col-6">
		      	<label>Scholarship Name</label>
		      	<label><?php echo $row['program_name'] ?></label>
		      </div>

		      <div class="col-6">
		      	<label>Scholarship Provider</label><?php echo $row['program_provider'] ?>
		      </div>
		      </div>

		      <div class="row">
		        <div class="col-6">
		        	<label>Scholarship Status</label><?php echo $row['program_status'] ?>
		      </div>

		      <div class="col-6">
		      	<label>Scholarship Type</label><?php echo $row['program_type'] ?>
		      </div>
		      </div>

			  <br><label><b>STATUS TRACKER</b></label>
			  <div class="row">
		      <div class="col-6">
		        <label>Allowance Status</label><?php echo $row['allowance_status'] ?>
		          
		      </div>

		      <div class="col-6">
		        <label>Billing Status</label><?php echo $row['billing_status'] ?>
		      </div>
		      </div>

		      <div class="row">
		        <div class="col-6">
		        <label>Payroll Status</label><?php echo $row['payroll_status'] ?>
		          
		      </div>

		      <div class="col-6">
		      	<label>Liquidation Status</label><?php echo $row['liquidation_status'] ?>
		          
		      </div>
		      </div>


			  <br><label><b>GRADES</b></label>

			  <div class="row">
		      <div class="col-6">
		        <label>Semester</label><?php echo $row['semester_year'] ?>
		      </div>

		      <div class="col-6">
		        <label>Total Units</label><?php echo $row['prev_total_units'] ?>
		      </div>

		      <div class="col-6">
		        <label>School Year</label><?php echo $row['year'] ?>
		      </div>

		      <div class="col-6">
		        	<label>General Weighted Average</label><b><?php echo $row['prev_gwa'] ?></b>
		      </div>
		      </div>

		<?php
		$query = "SELECT subcode, subdesc, units, grade FROM student_grades WHERE id='$grantee_id'";
			$result = $conn->query($query);
			while($row=$result->fetch_assoc()){

		?>
		<div class="table-responsive">
       	<table class="table table-bordered">
       		<thead>
       			<tr>
       				<th>Subject Code</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Grade</th>
       			</tr>

       			<tr>
       				<th><?php echo $row['subcode'] ?></th>
       				<th><?php echo $row['subdesc'] ?></th>
       				<th><?php echo $row['units'] ?></th>
       				<th><?php echo $row['grade'] ?></th>
       			</tr>
       		</thead>

    	</table>
    	</div>


		<?php } }?> 
		
	</div>
</div>

<script>
	window.print();
</script>