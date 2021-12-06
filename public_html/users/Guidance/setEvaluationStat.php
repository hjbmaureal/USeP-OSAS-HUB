<?php
include('conn.php');
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	# code...
$selectname = "UPDATE `indv_counselling` SET `eval_status`='1' WHERE intake_id = '$id'";
     $query = $conn->query($selectname);
   header('location: Guidance_Admin_Records.php');

}if (isset($_GET['id2'])) {
	$id=$_GET['id2'];
	$selectname = "UPDATE `indv_counselling` SET `eval_status`=null WHERE intake_id = '$id'";
     $query = $conn->query($selectname);
   header('location: Guidance_Admin_Records.php');
}
?>