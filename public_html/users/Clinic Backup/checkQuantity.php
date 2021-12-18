<?php 
include("connect.php");
if (isset($_POST['itemselect']) && isset($_POST['quanselect']) && isset($_POST['date'])) {
	$quan=$_POST['quanselect'];
	$item=trim($_POST['itemselect']);
	$date=$_POST['date'];
	$arr = explode(' ',$item);
	$itemID='';
	$i=1;
	$sqlitem=mysqli_query($db,"SELECT * FROM `item_list` left JOIN item_inventory ON item_list.item_code=item_inventory.item_code WHERE UPPER(item_list.item_name) like UPPER('%$arr[0]%') and datefrom='$date'");
					while($resultitem=mysqli_fetch_array($sqlitem)){
						$itemID=$resultitem['item_code'];
					}
	$sql=mysqli_query($db,"SELECT * FROM `item_inventory` WHERE item_code='$itemID' and datefrom='$date'");
	while($result=mysqli_fetch_array($sql)){
		$balance=$result['balance'];
		
		if ($balance>=$quan) { ?>
			<input type="text" name="input" value="1">
		<?php }else{
			$i;
		}

	}
}
?>