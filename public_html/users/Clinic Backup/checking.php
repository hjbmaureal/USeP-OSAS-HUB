<?php

if(isset($_POST['Submit'])){  
    $id = $_POST['id']; 
    $general = $_POST['general'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $pulse = $_POST['pulse'];
    $respiration = $_POST['respiration'];
    $temperature = $_POST['temperature'];
    $bp = $_POST['bp'];
    $rest = $_POST['rest'];
    $act = $_POST['act'];
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
    if(empty($general)|| empty($height)|| empty($weight)|| empty($pulse)|| empty($respiration)|| empty($temperature)|| empty($infect)|| empty($social)|| empty($family)|| empty($system)|| empty($skin)|| empty($lymph)|| empty($integ)|| empty($circulatory)|| empty($endocrine)|| empty($allergic)|| empty($heent)|| empty($mouth)|| empty($breast)|| empty($respiratory)|| empty($cardio)|| empty($gastro)|| empty($geni)|| empty($psy)) { 

        
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
        
        //go back ni
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 

    $s = "SELECT patient_id from patient_health_record_medical where patient_id='$id'";
    $resu = $db->query($s);
      if ($resu->num_rows > 0) {

        $r="UPDATE patient_health_record_medical 
            SET general_appearance='$general',height='$height',weight='$weight',pulse_rate='$pulse',respiration_rate='$respiration',temperature='$temperature',blood_pressure='$bp',cardiac_rate_at_rest='$rest',cardiac_rate_after_activity='$act',infectious_disease='$infect',social_history='$social',family_history='$family',system_review='$system',skin='$skin',lymph_nodes='$lymph',integument_system='$integ',circulatory_system='$circulatory',endocrine_system='$endocrine',allergic_immunologic_history='$allergic',heent='$heent',mouth='$mouth',breast='$breast',respiratory_system='$respiratory',cardiovascular_system='$cardio',gastrointestinal_system='$gastro',genitourinary_tract='$geni',psychiatric_history='$psy',date_filled_out_by_nurse=now()   
            WHERE patient_id='$id'";

       
        if ($db->query($r) === TRUE) {
       
          echo '<script>
                swal({
                title: "Added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,                                                                                             
                }).then(function() {
              window.location = "Admin-PatientList.php";
            })
         </script>';
           

    
    }else{

        echo '<script>
                    swal({
                    title: "Something went wrong...",
                    text: "Server Request Failed!",
                    type:"error",
                    icon: "error",
                    button: false,
                    timer:2000,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    })
        </script>';
}
}

else { 
        
        //insert syntax
        $result ="INSERT INTO patient_health_record_medical(patient_id,general_appearance,height,weight,pulse_rate,respiration_rate,temperature,blood_pressure,cardiac_rate_at_rest,cardiac_rate_after_activity,infectious_disease,social_history,family_history,system_review,skin,lymph_nodes,integument_system,circulatory_system, endocrine_system, allergic_immunologic_history, heent, mouth, breast, respiratory_system, cardiovascular_system, gastrointestinal_system, genitourinary_tract, psychiatric_history, date_filled_out_by_nurse) VALUES('$id','$general','$height','$weight','$pulse','$respiration','$temperature','$bp','$rest','$act','$infect','$social','$family','$system','$skin','$lymph','$integ','$circulatory','$endocrine','$allergic','$heent','$mouth','$breast','$respiratory','$cardio','$gastro','$geni','$psy', now())";

        if ($db->query($result) === TRUE) {
       
          echo '<script>
                swal({
                title: "Added successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:2000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "Admin-PatientList.php";
            })
     </script>';
           
    
    }else{

        echo '<script>
              swal({
              title: "Something went wrong...",
              text: "Server Request Failed!",
              type:"error",
              icon: "error",
              button: false,
              timer:2000,
              closeOnClickOutside: false,
              closeOnEsc: false,
              })
             </script>';
}
}
}
?>