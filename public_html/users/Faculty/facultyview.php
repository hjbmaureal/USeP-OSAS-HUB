<?php
include("conn.php");

if(isset($_GET['id']))
{
	$id = $_GET['id']?? null;
    $sql = mysqli_query($conn, "SELECT * from request_list where request_id = $id");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['certificate_location'];
    }
   
    echo "<img src='$name'>";
    


}


?>
<style type="text/css">
	img{
		display: block;
 		margin-left: auto;
  		margin-right: auto;
	}
	*{
		background-color: black;
	}

</style>t