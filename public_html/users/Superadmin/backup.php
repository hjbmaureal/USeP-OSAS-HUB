<?php
	//include our function
	include 'function.php';

	
		//get credentails via post
		
		
	
if (isset($_GET['action']) && $_GET['action'] == 'dinesh1') {
    
$conn =  new mysqli("localhost', 'u785399874_osastagum', 'Osas-tagum123', 'u785399874_osastagum'");
  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }
   
    date_default_timezone_set("Singapore");
$finall=date("Y-m-d h:i:sa");
        $ip_address = strip_tags(file_get_contents('http://checkip.dyndns.com/'));
        $final = str_replace("Current IP CheckCurrent IP Address: ","",$ip_address);
 $finals=2;
      $edit = "INSERT INTO activity_log(User_Id,Username, User_type,IP_address,Date_Time,Activity) VALUES 
      ('$finals', 'Super Admin','Staff', '$final','$finall','Backup Database')";
          $result=$conn-> query($edit);
          if(!$result ) { 
    die('Could not get data: ' . $conn->connect_error); 
    }else{
             
             $server = $_POST['localhost'];
		$username = $_POST['root'];
		$password = $_POST[''];
		$dbname = $_POST['updata'];

		//backup and dl using our function
		backDb('localhost', 'u785399874_osastagum', 'Osas-tagum123', 'u785399874_osastagum');

		exit(); 
            
    }
   
}

?>

