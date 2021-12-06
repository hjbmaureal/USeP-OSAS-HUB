<?php
  include_once('connect_db.php');
  $staff_id = $_POST['staff_id'];
  $changePass;
  $passState;
  $profileChanged = true;
  $signChanged = true;
  $email = $_POST['newEmail'];
  $contact = $_POST['newNum'];

  if(isset($_POST['submit-user-profile'])){
    echo "dddd";
      if($_FILES['profilePic']['name']){
        echo $_FILES['profilePic']['name'];
        move_uploaded_file($_FILES['profilePic']['tmp_name'], "../images/".$_FILES['profilePic']['name']);
        $img="../../images/".$_FILES['profilePic']['name'];
        
      }else{
        $profileChanged  = false;
        echo $_FILES['profilePic']['error'];
      }

      if($_FILES['signPic']['name']){
        move_uploaded_file($_FILES['signPic']['tmp_name'], "../images/".$_FILES['signPic']['name']);
        $img2="../../images/".$_FILES['signPic']['name'];
        }
      else{
        $signChanged = false;
        echo $_FILES['signPic']['error'];
      }

      if (isset($_POST['currPass']) && isset($_POST['newPass'])&& isset($_POST['confirmNewPass'])) {
        echo "pass";
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $oldPass = validate($_POST['currPass']);
        $newPass = validate($_POST['newPass']);
        $confirmNewPass = validate($_POST['confirmNewPass']);
          
        if(empty($oldPass)){  
          $passState = "current-password-required";
        }else if(empty($newPass)){
          $passState = "new-pass-required";
        }else if($newPass != $confirmNewPass){
          $passState = "password-dont-match";
        }else {
          // hashing the password
          $oldPass = $oldPass;
          $newPass =$newPass;
          $sql = "SELECT password FROM staff WHERE staff_id='$staff_id' AND password='$oldPass'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
              $changePass = true;
              echo $changePass;
            }else{
              $passState = "incorrect-password";
            }
        }
      }
    $query = "UPDATE staff SET";
    if($changePass){
      $query.=" password = '$newPass',";
      $passState ="";
    }
    if($profileChanged){
      $query.="pic='$img',";
    }
    if($signChanged){
      $query.="e_signature = '$img2',";
    }
    // echo $staff_id.''. $changePass . ' ' . $email . ' ' . $contact .' '. $img .' ' . $img2 . ' ' . $newPass .' ' .$oldPass .' '.$confirmNewPass;
    $query.=" email_add = '$email' , phone_num = '$contact' WHERE Staff_id='$staff_id'";
    
    echo $query;
    if(mysqli_query($conn, $query)){
      header('location:../users/Scholarship/user-profile.php?'.$passState.'update-success');
    }
    else{
      header('location:../users/Scholarship/user-profile.php?update-failed');
    }
  }