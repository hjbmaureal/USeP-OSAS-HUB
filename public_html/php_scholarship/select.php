<?php
include("connect_db.php");
if(isset($_POST["student_id"])) {
  $output = '';
  $query=mysqli_query($conn,"SELECT * FROM  scholarship_general_info WHERE student_id = '".$_POST["student_id"]."'");
  $output .= '
  <div>
    <table class="table table-bordered">';
  while($row = mysqli_fetch_array($query))
  {
    $output .= '
    
    <div class="row">
        <div class="col-6">
        <span class="input-group-addon">Student ID</span>
        <input type="text" class="form-control" disabled="" value="'.$row["student_id"].'">
      </div>
     
        <div class="col-6">
        <span class="input-group-addon">First Name</span>
        <input type="text" class="form-control" disabled="" value="'.$row["first_name"].'">
      </div>
      </div>

          <div class="row">
        <div class="col-6">
        <span class="input-group-addon">Middle Name</span>
        <input type="text" class="form-control" disabled="" value="'.$row["middle_name"].'">
      </div>
     
        <div class="col-6">
        <span class="input-group-addon">Last Name</span>
        <input type="text" class="form-control" disabled="" value="'.$row["last_name"].'">
      </div>
      </div>

        <div class="row">
        <div class="col-6">
        <span class="input-group-addon">Course</span>
        <input type="text" class="form-control" value="'.$row["coursename"].'" disabled="">
      </div>
 
      <div class="col-6">
        <span class="input-group-addon">Major</span>
        <input type="text" class="form-control" value="'.$row["major"].'"  disabled="">
      </div>
      </div>

      <div class="row">
        <div class="col-6">
        <span class="input-group-addon">College</span>
        <input type="text" class="form-control" value="'.$row["college_name"].'" disabled="">
      </div>

      <div class="col-6">
        <span class="input-group-addon">Status</span>
        <input type="text" class="form-control" value="'.$row["status_name"].'" disabled="">
      </div>
      </div>

     <div class="row">
     <div class="col-6">
         <h6><br>SCHOLARSHIP DETAILS</h6>
      </div>
      </div>
    
        <div class="row">
      <div class="col-6">
        <span class="input-group-addon" >Scholarship Name</span>
        <input type="text" class="form-control" value="'.$row["program_name"].'" disabled="">
      </div>

      <div class="col-6">
        <span class="input-group-addon">Scholarship Provider</span>
        <input type="text" class="form-control" value="'.$row["program_provider"].'" disabled="">
      </div>
      </div>

      <div class="row">
        <div class="col-6">
        <span class="input-group-addon">Scholarship Status</span>
        <input type="text" class="form-control" value="'.$row["program_status"].'" disabled="">
      </div>

      <div class="col-6">
        <span class="input-group-addon">Scholarship Type</span>
        <input type="text" class="form-control" value="'.$row["program_type"].'" disabled="">
      </div>
      </div>
  
      <div class="row">
      <div class="col-6">
          <h6><br>STATUS TRACKER</h6>
      </div>
      </div>

      <div class="row">
        <div class="col-6">
          <span class="input-group-addon">Allowance Status</span>
          <input type="text" class="form-control" value="'.$row["allowance_status"].'" disabled="">
      </div>

        <div class="col-6">
          <span class="input-group-addon">Billing Status</span>
          <input type="text" class="form-control" value="'.$row["billing_status"].'" disabled="">
      </div>
      </div>

      <div class="row">
        <div class="col-6">
          <span class="input-group-addon">Payroll Status</span>
          <input type="text" class="form-control" value="'.$row["payroll_status"].'" disabled="">
      </div>

      <div class="col-6">
          <span class="input-group-addon">Liquidation Status</span>
          <input type="text" class="form-control" value="'.$row["liquidation_status"].'" disabled="">
      </div>
      </div>

      <div class="row">
        <div class="col-6">
          <h6><br>GRADES</h6>
        </div>
        </div>

      <div class="row">
        <div class="col-4">
         <span class="input-group-addon">School Year</span>
         <input type="text" class="form-control" value="'.$row["year"].'" disabled="">
      </div>

        <div class="col-4">
         <span class="input-group-addon">Semester</span>
         <input type="text" class="form-control" value="'.$row["semester"].'" disabled="">
        </div>

        <div class="col-4">
          <span class="input-group-addon">Year Level</span>
          <input type="text" class="form-control" value="'.$row["year_level"].'" disabled="">
        </div>
        </div><br>

        <div class="row">
        <div class="col-6">
        <span class="input-group-addon">Total Units</span>
        <input type="text" class="form-control" disabled="" value="'.$row["prev_total_units"].'">
      </div>
     
        <div class="col-6">
        <span class="input-group-addon">General Weighted Average</span>
        <input type="text" class="form-control" disabled="" value="'.$row["prev_gwa"].'">
      </div>
      </div>
    </div>
    </div>

      ';
  }

  $output .= "</table></div>";
  echo $output;
}
?>
<?php
    if(isset($_POST["student_id"])) {


      $output = '';

      $query=mysqli_query($conn,"SELECT subcode, subdesc, units, grade FROM student_grades WHERE student_id = '".$_POST["student_id"]."'");
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered">';
      
        $output .= '

              <thead>
                  <tr>
                      <th>Subject Code</th>
                      <th>Description</th>
                      <th>Units</th>
                      <th>Grade</th>
                  </tr>
              </thead>
              <tbody>
              ';

              while($row = mysqli_fetch_array($query))
                  {         $subcode = $row['subcode'];
                            $subdesc = $row['subdesc'];
                            $units = $row['units'];
                            $grade = $row['grade'];

                $output .= '
                          <tr>
                            <td>'.$row["subcode"].'</td>
                            <td>'.$row["subdesc"].'</td>
                            <td>'.$row["units"].'</td>
                            <td>'.$row["grade"].'</td>
                          </tr>

                      ';
                  }

            $output .= "</table></div>";
            echo $output;

          }