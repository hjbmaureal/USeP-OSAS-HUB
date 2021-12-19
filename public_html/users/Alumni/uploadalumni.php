
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php 
  session_start();
if( isset( $_POST['submits']) && isset($_FILES['my_image'])) 
{
 include('../../conn.php');
$lastsyattendedto = $_POST['to'];
$lastsyattendedfrom = $_POST['from'];
$reqby = $_SESSION['id'];
$datereq = date('Y-m-d H:i:s');
$orno = $_POST['or_no'];
$purpose = $_POST['purpose'];

$admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='OSAS' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$admin_id= $request['staff_id'];

$notif_body = "An alumni requests for a Good Moral Certificate.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$admin_id', '$notif_body',now(),'../users/Osas/ReqGoodMoral.php', 'Delivered')");


	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		   
		    echo "         .";
				    echo '<script>
				                 swal({
				                  title: "Request Submit Failed Sorry, your file is too large.",
				                  text: "Server Request Failed",
				                  type: "warning"
				                });
				                </script>';
				     echo "<script>setTimeout(\"location.href = 'index.php';\",1800);</script>";

		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'image/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);


				 $sql = mysqli_query($conn,"INSERT INTO good_moral_requests (request_id, last_sy_attended, requested_by, date_requested, or_no, purpose, or_pic)
 				VALUES ('','$lastsyattendedfrom-$lastsyattendedto','$reqby','$datereq','$orno','$purpose','$new_img_name')");
				if ($sql && $notification) {
					echo "         .";
				    echo '<script>
				                 swal({
				                  title: "Request Submitted Succesfully",
				                  text: "Server Request Success",
				                  type: "success"
				                });
				                </script>';
				     echo "<script>setTimeout(\"location.href = 'index.php';\",1800);</script>";


				} else {
					echo "         .";
				    echo '<script>
				                 swal({
				                  title: "Request Submit Failed",
				                  text: "Server Request Failed",
				                  type: "warning"
				                });
				                </script>';
				     echo "<script>setTimeout(\"location.href = 'index.php';\",1800);</script>";
				    
				}
 mysqli_close($conn);
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}

 }
  else{

  	}
  
?>