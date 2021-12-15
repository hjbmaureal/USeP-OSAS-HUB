<?php 
include('connect.php');
$arrayquan='';
$arraymed='';
$arraycunit='';
$arraycheck='';
$patientID="";
$consultID="";$count=0;
if (isset($_POST['quan']) && isset($_POST['med']) && isset($_POST['unit']) && isset($_POST['count']) && isset($_POST['error']) && isset($_POST['date'])) {
  
  $arrayquan=explode(',', $_POST['quan']);
  $arraymed=explode(',', $_POST['med']);
  $arraydate=explode(',', $_POST['date']);
  $count=$_POST['count'];
  $balance='';
  $itemID='';
  $unit='';
  ?>

              <table id="myTable" class="tclass">
                                        <tbody>
                                          
                                          <?php for ($i=1; $i <= $count; $i++) { 
                                            /*SELECT ITEM ID AND USE TO SELECT ITEM CODE*/
                                            $name_holder=trim($arraymed[$i]);
                                            $arr = explode(' ',$name_holder);
                        $sqlitem=mysqli_query($db,"SELECT * FROM `item_list` WHERE UPPER(item_name) like UPPER('%$arr[0]%')");
                        while($resultitem=mysqli_fetch_array($sqlitem)){
                          $itemID=$resultitem['item_code'];
                        }
                        /*SELECT BALANCE */
                      $sql=mysqli_query($db,"SELECT * FROM `item_inventory` JOIN item_unit ON item_inventory.unit=item_unit.unit_id WHERE item_code='$itemID'");
                              while($result=mysqli_fetch_array($sql)){
                                $balance=$result['balance'];
                                $unit=$result['unit'];
                              }

                         ?>
                                            <td>
                                              <input type="hidden" name="date_holder<?php echo $i;?>" id="date_holder<?php echo $i;?>" value="<?php echo $arraydate[$i]; ?>">

                                           
                                               <textarea class="form-control rounded-10" name="medWthtimes<?php echo $i;?>" id="medWthtimes<?php echo $i;?>" rows="2" style="width: 100%; margin-left: -5%;"><?php echo $arraymed[$i];?></textarea>
                                              
                                            </td>

                                            <td><input type="number" name="addedQuan<?php echo $i;?>" id="addedQuan<?php echo $i;?>" min="1" max="<?php echo $balance;?>" value="<?php echo $arrayquan[$i];?>"></td>
                                            <td><?php echo $unit;?></td>
                                            <td><input style="font-size: 8px; height: 14px;" type="checkbox" name="checkbox<?php echo $i;?>"id="checkbox<?php echo $i;?>"> Release</td>
                                           
                                            <!-- td>
                                                <a class="btn btn-danger btn-sm" name="x" id="x" value="#x"><i class="fas fa-close"></i></a></td> --><tr>
                                            <script type="text/javascript">
                                              $("#addedQuan<?php echo $i;?>").keyup(function(){
                     
                    
                    var quanselect=$("#addedQuan<?php echo $i;?>").val();
                    var itemselect=$("#medWthtimes<?php echo $i;?>").val();
                    var name_holder=$("#Prname").val();
                     var date = $("#date_holder<?php echo $i;?>").val();
                     /*alert(date); */
                    var error='';

                    $.ajax({
                          url:"checkQuantity.php",
                          type:"POST",
                          data:{quanselect:quanselect, itemselect:itemselect, date:date},
                          success:function(data){
                            /*alert(data);*/
                            if (data.match(/input/g)) {
                              $("#Add").prop('disabled', false);
                             }else{
                              swal({
                                              title: "Out of stock!",
                                              text: "Out of stock!",
                                              icon: "error",
                                              buttons: false,
                                              timer: 2000,
                                              closeOnClickOutside: false,
                                              closeOnEsc: false,
                                            });
                              $("#Add").prop('disabled', true);
                             }
                          },
                    });
                  });
                                            </script>
                                          <?php }?>

                                     
                                              
                                          
                                          </tr>
                                        </tbody>
                                      </table>


<?php }
if (isset($_POST['quan']) && isset($_POST['med']) && isset($_POST['unit']) && isset($_POST['count']) && isset($_POST['check']) && isset($_POST['patientID']) && isset($_POST['consultID']) && isset($_POST['addMedication']) && isset($_POST['doctor']) && isset($_POST['updated_med']) && isset($_POST['date'])) {
  $arrayquan=explode(',', $_POST['quan']);
  $arraymed=explode(',', $_POST['med']);
  $arraycunit=explode(',', $_POST['unit']);
  $arraycheck=explode(',', $_POST['check']);
  $arraydate=explode(',', $_POST['date']);
  $consultID=$_POST['consultID'];
  $patientID=$_POST['patientID'];
  $count=$_POST['count'];
  $updated_med=$_POST['updated_med'];
  $addMedication='';
  if(isset($_POST['addMedication'])){
  $addMedication=$_POST['addMedication'];
  }
  $name=$_POST['doctor'];
  /*select UNIT and put to array*/
  $details='';$itemID='';
    for ($i=0; $i <=$count-1 ; $i++) { 
      /*SELECT ITEM ID AND USE TO SELECT ITEM CODE*/
      $name_holder=trim($arraymed[$i]);
      $arr = explode(' ',$name_holder);
      $sqlitem=mysqli_query($db,"SELECT * FROM `item_list` WHERE UPPER(item_name) like UPPER('%$arr[0]%')");
          while($resultitem=mysqli_fetch_array($sqlitem)){
              $itemID=$resultitem['item_code'];
          }
      $sql=mysqli_query($db,"SELECT * FROM `item_inventory` JOIN item_unit ON item_inventory.unit=item_unit.unit_id WHERE item_code='$itemID'");
        while($result=mysqli_fetch_array($sql)){
              $balance=$result['balance'];
              $unit=$result['unit'];
              $arraycunit[$i]=$unit;
        }
    }
    
    
    $combined = array_map(function($a, $b, $c) { return $a . ' ' . $b . ' of ' . $c; }, $arrayquan, $arraycunit, $arraymed);
    $details= implode('. ', $combined);
    
    $sqlInsert=mysqli_query($db,"INSERT INTO `prescription`(`prescription_id`, `patient_id`, `consultation_id`, `prescription_details`, `prescribing_doctor`, `date`) VALUES (null,'$patientID','$consultID','".$details." ".$addMedication."','$name',now())");
      for ($i=0; $i <= $count-1; $i++) {
      if ($arraycheck[$i]=='1') {
        $name_holder=trim($arraymed[$i]);
        $arr = explode(' ',$name_holder);
        $sqlitem=mysqli_query($db,"SELECT * FROM `item_list` WHERE UPPER(item_name) like UPPER('%$arr[0]%')");
          while($resultitem=mysqli_fetch_array($sqlitem)){
            $itemID=$resultitem['item_code'];
          }
        $sqlUpdate_Inv=mysqli_query($db,"UPDATE `item_inventory` SET `issuance_apokon`=issuance_apokon + '".$arrayquan[$i]."',`balance`=balance - '".$arrayquan[$i]."' WHERE item_code ='$itemID' and datefrom='".$arraydate[$i]."'");
      }
    }
  
  }


?>