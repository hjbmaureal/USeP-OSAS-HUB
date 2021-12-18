<?php 
sleep(1);
include('connect.php');
if (isset($_POST['fdate'])) {

  $fdate = $_POST['fdate'];

$sql = "SELECT * from supply_equipment_inventory where type='2' and date_from='$fdate'";

                $result = mysqli_query($db, $sql);
                $count=mysqli_num_rows($result);
?>
<table class="table table-hover table-bordered" id="sampleTable">
  <?php 
      if ($count) {
            ?>
                  <thead>
                      <tr>
                      <th>Time Period</th>
                      <th>Supply Code</th>
                      <th>Supply</th>
                      <th>Quantity Received</th>
                      <th>Available</th>
                      <th>Consumed</th>
                      <th class="max";>Action</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                      if($result2 = mysqli_query($db, $sql)){
                 while ($row = mysqli_fetch_assoc($result2)) {
                            $se_id = $row['id'];

                  ?>

                    <tr>
                   
                    <td><?php echo $row['date_from'].' - '.$row['date_to'];?></td>
                    <td><?php echo $row['supply_equipment_code'];?></td>
                    <td><?php echo $row['supply_equipment_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['available'];?></td>
                    <td><?php echo $row['consumed'];?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#UpdateSE"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#SupplyCondition<?php echo $se_id; ?>" style="color: white;">Condition</a>
                        <?php include ('condition.php') ?>
                        
                    </td>
                              </tr>
                             
                      <?php }}
                
                 
       ?> </tbody> </table>

  <?php }