<?php 
sleep(1);
include('connect.php');
if (isset($_POST['funit']) && isset($_POST['fdate'])) {
  $funit=$_POST['funit'];
  $fdate = $_POST['fdate'];

  if ($funit=='all' && $fdate=='') {
    $sql="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance!='0'";

  }if ($funit!='all' && $fdate=='') {
    $sql="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance!='0' and item_inventory.unit='$funit'";

  }if ($funit=='all' && $fdate!='') {
      $sql="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance!='0' and item_inventory.datefrom='$fdate' or item_inventory.dateto='$fdate'";

  }if ($funit!='all' && $fdate!='') {
      $sql="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance!='0' and item_inventory.unit='$funit' and item_inventory.datefrom='$fdate' or item_inventory.dateto='$fdate'";

  }
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
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th width="30px">Received for the Period</th>
                      <th>Issuance (Mabini Clinic)</th>
                      <th>Issuance (Apokon)</th>
                      <th>Balance</th>
                      <th class="max" width="100px">Action</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                     if($result1 = mysqli_query($db, $sql)){
                        while ($row = mysqli_fetch_assoc($result1)) {
                            $stock_id = $row['id'];
                        ?>

                    <tr>
                    <td><?php echo $row['datefrom'].' - '.$row['dateto'];?></td>
                    <td><?php echo $row['item_code'];?></td>
                    <td><?php echo $row['unit_name'];?></td>
                    <td><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['received_qty'];?></td>
                    <td><?php echo $row['issuance_mabini'];?></td>
                    <td><?php echo $row['issuance_apokon'];?></td>
                    <td><?php echo $row['balance'];?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" data-toggle="modal" href="#UpdateStock<?php echo $stock_id; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#DistributeItem<?php echo $stock_id; ?>">Distribute</a>
                        <?php include ('fetch_inventory.php') ?>
                        


                    </td>
                              </tr>
                             
                      <?php }}
                
                 
       ?> </tbody> </table>

  <?php }

  if (isset($_POST['funit2']) && isset($_POST['fdate2'])) {
  $funit2=$_POST['funit2'];
  $fdate2 = $_POST['fdate2'];

  if ($funit2=='all' && $fdate2=='') {
    $sql2="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance='0'";

  }if ($funit2!='all' && $fdate2=='') {
      $sql2="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance='0' and item_inventory.unit='$funit2'";

  }if ($funit2=='all' && $fdate2!='') {
      $sql2="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance='0' and item_inventory.datefrom='$fdate2' or item_inventory.dateto='$fdate2'";

  }if ($funit2!='all' && $fdate2!='') {
      $sql2="SELECT item_inventory.*, item_unit.unit as unit_name from item_inventory join item_unit on item_unit.unit_id=item_inventory.unit where item_inventory.balance='0' and item_inventory.unit='$funit2' and item_inventory.datefrom='$fdate2' or item_inventory.dateto='$fdate2'";

  }
                $result2 = mysqli_query($db,$sql2);
                $count2=mysqli_num_rows($result2);

  ?>
 
 <table class="table table-hover table-bordered" id="sampleTable2">
  <?php 
      if ($count2) {
            ?>
                  <thead>
                      <tr>
                      <th>Time Period</th>
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th width="30px">Received for the Period</th>
                      <th>Issuance (Mabini Clinic)</th>
                      <th>Issuance (Apokon)</th>
                      <th>Balance</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                     if($result2 = mysqli_query($db, $sql2)){
                      while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>

                    <tr>
                    <td><?php echo $row2['datefrom'].' - '.$row2['dateto'];?></td>
                    <td><?php echo $row2['item_code'];?></td>
                    <td><?php echo $row2['unit_name'];?></td>
                    <td><?php echo $row2['item_name'];?></td>
                    <td><?php echo $row2['received_qty'];?></td>
                    <td><?php echo $row2['issuance_mabini'];?></td>
                    <td><?php echo $row2['issuance_apokon'];?></td>
                    <td><?php echo $row2['balance'];?></td>
                    
                              </tr>
                             
                      <?php }}
                
                 
       ?> </tbody> </table>

  <?php }

  if (isset($_POST['funit3'])) {
  $funit3=$_POST['funit3'];

  if ($funit3=='all') {
    $sql3="SELECT item_inventory.id, item_inventory.item_code, item_inventory.unit, item_inventory.item_name, SUM(item_inventory.received_qty) as qty, SUM(item_inventory.issuance_mabini) as issued_mabini, SUM(item_inventory.issuance_apokon) as issued_apokon, item_unit.unit as un_name FROM item_inventory JOIN item_unit ON item_unit.unit_id=item_inventory.unit GROUP BY item_inventory.item_code";

  }if ($funit3!='all') {
    $sql3="SELECT item_inventory.id, item_inventory.item_code, item_inventory.unit, item_inventory.item_name, SUM(item_inventory.received_qty) as qty, SUM(item_inventory.issuance_mabini) as issued_mabini, SUM(item_inventory.issuance_apokon) as issued_apokon, item_unit.unit as un_name FROM item_inventory JOIN item_unit ON item_unit.unit_id=item_inventory.unit WHERE item_inventory.unit='$funit3' GROUP BY item_inventory.item_code";
  }
                $result3 = mysqli_query($db, $sql3);
                $count3=mysqli_num_rows($result3);
?>


<table class="table table-hover table-bordered" id="sampleTable3">
  <?php 
      if ($count3) {
            ?>
                  <thead>
                      <tr>
                       <th>No.</th>
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th>Total Quantity Received</th>
                      <th>Total Issuance (Mabini)</th>
                      <th>Total Issuance (Apokon)</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                     if($result3 = mysqli_query($db, $sql3)){
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                        ?>

                    <tr>
                   <td><?php echo($row3['id']);?></td>
                    <td><?php echo($row3['item_code']);?></td>
                    <td><?php echo($row3['un_name']);?></td>
                    <td><?php echo($row3['item_name']);?></td>
                    <td><?php echo($row3['qty']);?></td>
                    <td><?php echo($row3['issued_mabini']);?></td>
                    <td><?php echo($row3['issued_apokon']);?></td>
              
                    </tr>
                             
                      <?php }}
                
                 
       ?> </tbody> </table>

  <?php }

  if (isset($_POST['funit4'])) {
  $funit4=$_POST['funit4'];

  if ($funit4=='all') {
    $sql="SELECT * FROM item_unit";

  }if ($funit4!='all') {
    $sql="SELECT * FROM item_unit WHERE unit_id='$funit4'";
  }
                $result5 = mysqli_query($db, $sql);
                $count5=mysqli_num_rows($result5);
?>


<table class="table table-hover table-bordered" id="sampleTable4">
  <?php 
      if ($count5) {
            ?>
                  <thead>
                      <tr>
                       <th>No.</th>
                      <th>Unit</th>
                      <th>Date Added</th>
                      <th class="max";>Action</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
           <?php
                if($results = mysqli_query($db, $sql)){
                while ($row = mysqli_fetch_assoc($results)) {
                  $unit_no = $row['unit_id'];
                  ?>
                              <tr>
                    <td><?php echo htmlentities($unit_no);?></td>
                    <td><?php echo htmlentities($row['unit']);?></td>
                    <td><?php echo htmlentities($row['date_added']);?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" data-toggle="modal" href="#EditUnit<?php echo $unit_no; ?>"><i class="fas fa-edit"></i></a>
                        <?php include('fetch_inventory.php');?>
                    </td>
                              </tr>
                             
                      <?php }}
                
                 
       ?> </tbody> </table>

  <?php }

  if (isset($_POST['funit5'])) {
  $funit5=$_POST['funit5'];

  if ($funit5=='all') {
    $sql6="SELECT item_list.*, item_unit.unit as unit_name FROM item_list JOIN item_unit ON item_unit.unit_id=item_list.unit";

  }if ($funit5!='all') {
    $sql6="SELECT item_list.*, item_unit.unit as unit_name FROM item_list JOIN item_unit ON item_unit.unit_id=item_list.unit WHERE unit_id='$funit5'";
  }
                $result6 = mysqli_query($db, $sql6);
                $count6=mysqli_num_rows($result6);
?>


<table class="table table-hover table-bordered" id="sampleTable5">
  <?php 
      if ($count6) {
            ?>
                  <thead>
                      <tr>
                      <th>No.</th>
                      <th>Item Code</th>
                      <th>Unit</th>
                      <th>Item Name</th>
                      <th>Date Added</th>
                      <th class="max";>Action</th>
                    </tr>
  <?php }else{ echo "SORRY! NO RECORD FOUND!";} ?>
                </thead>
                <tbody>
                    <?php
                     if($result6 = mysqli_query($db, $sql6)){
                        while ($row6 = mysqli_fetch_assoc($result6)) {
                        $it_no = $row6['id'];
                        ?>

                    <tr>
                   <td><?php echo($it_no);?></td>
                    <td><?php echo($row6['item_code']);?></td>
                    <td><?php echo($row6['unit_name']);?></td>
                    <td><?php echo($row6['item_name']);?></td>
                    <td><?php echo($row6['date_added']);?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" data-toggle="modal" href="#EditItem<?php echo $it_no; ?>"><i class="fas fa-edit"></i></a>
                        <?php include('fetch_inventory.php');?>
                    </td>
              
                    </tr>
                             
                      <?php }}
                
                 
       ?> </tbody> </table>

  <?php }

