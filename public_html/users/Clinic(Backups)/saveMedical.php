<?php
include_once("connect.php");
 
  if(isset($_POST['Submit'])){  
    $id = $_POST['id']; 
    $patient_id = $_POST['idnum'];
    $general = $_POST['general'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $pulse = $_POST['pulse'];
    $respiration = $_POST['respiration'];
    $temperature = $_POST['temperature'];
    $bp = $_POST['bp'];
    $cardiac = $_POST['cardiac'];
    $phy_act = $_POST['physical_activity'];
    $infect = $_POST['infect'];
    $social = $_POST['social'];
    $family = $_POST['family'];
    $system = $_POST['system'];
    $skin = $_POST['skin'];
    $lymph = $_POST['lymph'];
    $integ = $_POST['integ'];
    $circulatory = $_POST['circulatory'];
    $endocrine = $_POST['endocrine'];
    $allergic = $_POST['allergic'];
    $heent = $_POST['heent'];
    $mouth = $_POST['mouth'];
    $breast = $_POST['breast'];
    $respiratory = $_POST['respiratory'];
    $cardio = $_POST['cardio'];
    $gastro = $_POST['gastro'];
    $geni = $_POST['geni'];
    $psy = $_POST['psy'];

 
        
        
    // checker
    if(empty($general)|| empty($height)|| empty($weight)|| empty($pulse)|| empty($respiration)|| empty($temperature)|| empty($bp)|| empty($cardiac)|| empty($phy_act)|| empty($infect)|| empty($social)|| empty($family)|| empty($system)|| empty($skin)|| empty($lymph)|| empty($integ)|| empty($circulatory)|| empty($endocrine)|| empty($allergic)|| empty($heent)|| empty($mouth)|| empty($breast)|| empty($respiratory)|| empty($cardio)|| empty($gastro)|| empty($geni)|| empty($psy)) { 

        
        if(empty($general)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }  
        if(empty($height)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($weight)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($pulse)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($respiration)) {
            echo "<font color='red'>field is empty.</font><br/>";
        } 
        if(empty($temperature)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($bp)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($cardiac)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($phy_act)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($infect)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($social)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($family)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($system)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($skin)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($lymph)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($integ)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($circulatory)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($endocrine)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($allergic)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($heent)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($mouth)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($breast)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($respiratory)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($cardio)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($gastro)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($geni)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($psy)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        
     
        if(empty($preslist)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        if(empty($status)) {
            echo "<font color='red'>field is empty.</font><br/>";
        }
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        
        //insert syntax
        $result ="INSERT INTO patient_health_record_medical VALUES('$patient_id','$general','$height','$weight','$pulse','$respiration','$temperature','$bp','$cardiac','$phy_act','$infect','$social','$family','$system','$skin','$lymph','$integ','$circulatory','$endocrine','$allergic','$heent','$mouth','$breast','$respiratory','$cardio','$gastro','$geni','$psy', now())";

          if ($db->query($result) === TRUE) {

          echo '<script>alert("Data added successfully!");</script>';

          echo "<script type='text/javascript'> document.location = 'Admin-PatientList.php'; </script>";
                exit();
           
    
    }else{

  echo '<script>alert("Failed!Try Again!"); </script>';
}
}
}
?>