<?php
  include_once("connect_db.php");
  if(isset($_POST['request'])){
    $request = $_POST['request'];
    if($request == 0){
      $query = "SELECT * FROM scholarship_program";
    }else{
      $query = "SELECT * FROM scholarship_program WHERE type = '$request'";
    }
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count){
      echo'
        <table class="table table-hover table-bordered" id="provider-table">
          <thead>
            <tr>
              <th><input type="checkbox" id="select-all-provider"></th>
              <th>Scholarship Program</th>
              <th>Government/Organization</th>
              <th>Type</th>
              <th>Status</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        
      ';
    }else{
      echo 'No Record Found!';
    }
    while($row = mysqli_fetch_assoc($result)){
      echo '
        <tr>
          <td><input type="checkbox" name="select[]" value='.$row['program_id'].'></td>
          <td> '.$row['program_name'].'</td>
          <td> '.$row['program_provider'].'</td>
          <td> '.$row['type'].'</td>
          <td> '.$row['program_status'].'</td>
          <td> '.$row['amount'].'</td>
          <td>Action</td>
        </tr>
      ';
    }
    echo'          
        </tbody>
      </table>
    ';
  }
?>

