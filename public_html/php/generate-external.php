<?php
  include_once("connect_db.php");
  if(isset($_POST['generate-scholar'])){
    $count = 0;
    var_dump($_POST['select']);
    $allCount = count($_POST['select']);
    $type = 'External';
    $sems = array("1st Semester","2nd Semester","Off Semester");
    $result = mysqli_query($conn, "SELECT fullname(s.first_name , s.middle_name , s.last_name ,'','','','firstname_first') as fullname from staff as s WHERE position = 'Scholarship Coordinator'");
    $row = mysqli_fetch_assoc($result);
    $scholarCoor = strtoupper($row['fullname']);
    foreach($_POST['select'] AS $value){
      $result = mysqli_query($conn,"SELECT g.id, g.Student_id, concat(s.last_name,', ',s.first_name,' ',left(s.middle_name,1)) as fullname, c.name as course, s.year_level, sp.program_name as program, g.semester,g.year, g.card_signed, (SELECT count(*) FROM grantee_history WHERE card_signed is not null AND student_id = g.Student_id) as check_if_card_exists, (SELECT card_years FROM grantee_history WHERE student_id = g.Student_id and card_years is not null limit 1) as card_years FROM grantee_history as g JOIN student as s on s.Student_id = g.Student_id JOIN scholarship_program as sp on sp.program_id = g.program_id JOIN course as c on c.course_id = s.course_id WHERE g.id = ".$value);

      if($row = mysqli_fetch_array($result)){
        $notifSemester = $row['semester'];
        $notifYear = $row['year'];
        $notifStudent = $row['Student_id'];

        $years_in_card = explode("/",$row['card_years']);
        $year_row = getYearRow($row['year'],$years_in_card,$row['card_years']);
        $sem_col = array_search(trim($row['semester']),$sems); 
        $dest_x = 0;
        $dest_y = 0;

        if ($year_row%4 == 0){
          $dest_y=600;
        } else if ($year_row%4 == 1){
          $dest_y=645;
        }  else if ($year_row%4 == 2){
          $dest_y=685;
        } else if ($year_row%4 == 3){
          $dest_y=730;
        }

        if ($sem_col == 0){
          $dest_x=0;
        }
        else if ($sem_col == 1){
          $dest_x=215;
        } 
        else if ($sem_col == 2){
          $dest_x=430;
        }
        $card_ver = getCardNumber($year_row);
        $card_location = ( $card_ver== 0) ? '../images/Scholarship_Cards/External/'.$row['Student_id'].'.png' : '../images/Scholarship_Cards/External/'.$row['Student_id'].'_'.$card_ver.'.png';
        // check if student already has a card
        if ($row['check_if_card_exists'] > 0 && file_exists($card_location)) {
          // check if card is already signed for specified sem
          if (!strlen(trim($row['card_signed'])) > 0){
              echo "card is not signed for this user";
              $location=$card_location;
              $image1= ''.$location.'';
              $image2='../images/scholarship_card_template/signature.png';
              $image1= imagecreatefromstring(file_get_contents($image1));
              $image2= imagecreatefromstring(file_get_contents($image2));
              imagecolortransparent($image2, imagecolorat($image2, 0, 0));
              imagecopyresampled($image1, $image2, $dest_x, $dest_y, 0, 0, 255, 150, imagesx($image2), imagesy($image2));
                //header('Content-Type: image/png');
              imagepng($image1,$card_location);

              $query=mysqli_query($conn, "UPDATE grantee_history SET  card_signed = CURDATE(), card_ver = ".$card_ver." WHERE id = ".$value);

          } else {
              echo "card already signed for this user";
          }
        } else {
            $sy = generateSchoolYears($row['year']);
            
            $image1= '../images/scholarship_card_template/External.jpg';
            $image2='../images/scholarship_card_template/signature.png';
            $image1= imagecreatefromstring(file_get_contents($image1));
            $image2= imagecreatefromstring(file_get_contents($image2));
            imagecolortransparent($image2, imagecolorat($image2, 0, 0));
            imagecopyresampled($image1, $image2,$dest_x, $dest_y, 0, 0, 255, 150, imagesx($image2), imagesy($image2));   
            //header('Content-Type: image/png');
            imagepng($image1,$card_location);


            $dir= dirname(realpath(__FILE__));
            $sep=DIRECTORY_SEPARATOR;   
            $font =$dir.$sep.'ArialCE.ttf';
            $image3= $card_location;
            $image3= imagecreatefromstring(file_get_contents($image3));
            $black = imagecolorallocate($image1, 0, 0, 0);
            imagettftext($image3, 24, 0, 150, 455, $black,$font, $row['fullname']);
            imagettftext($image3, 18, 0, 250, 498, $black,$font," ".$row['course']." ".$row['year_level'] );
            imagettftext($image3, 20, 0, 190, 535, $black,$font, $row['program']);
            imagettftext($image3, 20, 0, 737, 680, $black,$font, $sy[0]);
            imagettftext($image3, 20, 0, 737, 720, $black,$font, $sy[1]);
            imagettftext($image3, 20, 0, 737, 760, $black,$font, $sy[2]);
            imagettftext($image3, 20, 0, 737, 800, $black,$font, $sy[3]);
            imagettftext($image3, 22, 0, 320, 1046, $black,$font, $scholarCoor);
            //header('Content-Type: image/png');
            imagepng($image3,$card_location);
            
            $new_card_years = ($row['card_years'] == null) ? implode("/", $sy) : "/".implode("/", $sy);

           $query=mysqli_query($conn, "UPDATE grantee_history SET  card_signed = CURDATE(), card_ver = ".$card_ver.", card_years = '".$new_card_years."' WHERE id = ".$value);
           $string = "Your scholarship card has been signed for the $notifSemester' ' $notifYear ";
           mysqli_query($conn, "INSERT INTO `notif`(`user_id`, `message_body`, `link`, `message_status`, `office_id`) VALUES ('$notifStudent','$string','../users/Student/student-scholarship-dashboard.php','Delivered','2') ");
        }
       
      }
   header("Location: ../users/Scholarship/generate-external-scholar-card.php?operation=success");
    } 
  }else{
 header("Location: ../users/Scholarship/generate-external-scholar-card.php?operation=failed");
  }
header("Location: ../users/Scholarship/generate-external-scholar-card.php?operation=unknown");

  function generateSchoolYears($startsy){
    $years = array();
    $years[0] = $startsy;
    $prevsy = $startsy;
    for ($i=1; $i < 4; $i++) { 
        $year1 = intval(substr($prevsy,0,4)) + 1;
        $newsy = $year1.'-'.($year1 + 1);
        $years[$i] = $newsy;
        $prevsy = $newsy;
    }

    return $years;

  }


  function getCardNumber($year_row){
    return floor($year_row/4);
  }

  function getCardLocation($studentid, $cardno){
    return $cardno == 0 ? '../images/Scholarship_Cards/External/'.$studentid.'.png' : '../images/Scholarship_Cards/External/'.$studentid.''.$cardno.'.png';
  }

  function getYearRow($year,$year_arr,$card_years){
    $val = 0;
    if ($card_years==null){
      $val = 0;
    } else {
      if (array_search($year, $year_arr) != false){
        $val = array_search($year, $year_arr);
      } else {
        $val = intval(substr($year, 0,4)) - intval(substr($card_years, 0,4));
      }
    }
    return $val;
  }


?>
