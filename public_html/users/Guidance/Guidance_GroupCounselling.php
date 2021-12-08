 <?php include('../../conn.php');
  /*include 'conn.php';*/
  include '../../php/notification-timeago.php'; 
  session_start();
  if (!isset($_SESSION['id']) || isset($_SESSION['usertype']) != 'Staff' || isset($_SESSION['office']) != 'Guidance'){
    echo '<script type="text/javascript">'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';
  }
   $admin_id=$_SESSION['id'];


  $count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where (user_id='$admin_id' or office_id = 4) and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}


//Add group counselling
  if(isset($_POST['add_gc'])){
    $gc_date = date('Y-m-d',strtotime($_POST['gguidance_date']));
    $gc_time = date('H:i',strtotime($_POST['gguidance_date']));
    $gc_purpose = $_POST['gguidance_topic'];
    $gc_mode = $_POST['gguidance_mode'];
    $gc_course = $_POST['filtr_course'];
    $gc_year = $_POST['filtr_year'];
    $code= '';
    $gc_link = '';
    if (isset($_POST['code'])) {
        $code= $_POST['code'];
    }if (isset($_POST['gguidance_link'])) {
        $gc_link = $_POST['gguidance_link'];
    }
    
    $gc_section = 'all';
    if (isset($_POST['filtr_section'])) {
       $gc_section = $_POST['filtr_section'];
    }
       $sql6 = "SELECT course_id FROM course WHERE course_id = '$gc_course'";
      $result6 = $conn->query($sql6);
      if ($result6->num_rows > 0) {
        while($row = $result6->fetch_assoc()) {
                  $fil_c = $row['course_id'];
         }
       }
      
      $sql0 = "INSERT INTO `guidance_appointments`(`appointment_id`, `status_id`, `mode_id`, `date_filed`, `appointment_date`, `appointment_time`, `date_completed`, `link`, `meeting_code`) VALUES (NULL,'3','$gc_mode',NOW(),'$gc_date','$gc_time',NULL,'$gc_link','$code')";
      

      if ($conn->query($sql0) === TRUE) {
      $apt_id = $conn->insert_id;

      $sql2 = "INSERT INTO `group_guidance`(`grp_guidance_id`, `appointment_id`, `course_id`, `year_level`, `section`, `topic`, `meet_link`) VALUES (NULL,'$apt_id','$fil_c','$gc_year','$gc_section','$gc_purpose','$gc_link')";
      

      if ($conn->query($sql2) === TRUE) {
      $gg_id = $conn->insert_id;

      if ($gc_course=='all') {
        $sql7="SELECT * FROM `student`";
      }if ($gc_course !='all' && $gc_year=='all' && $gc_section=='all')  {
      $sql7="SELECT Student_id FROM `student` WHERE student.course_id='$gc_course'";

    }if ($gc_course !='all' && $gc_year!='all' && $gc_section=='all') {
      $sql7="SELECT Student_id FROM `student` WHERE student.course_id='$gc_course' and student.year_level like '$gc_year'";

    }if ($gc_course !='all' && $gc_year!='all' && $gc_section !='all') {
      $sql7="SELECT Student_id FROM `student` WHERE student.course_id='$gc_course' and student.year_level like '$gc_year' and student.section like '$gc_section'";
               
    }


      $result7 = $conn->query($sql7);
      if ($result7->num_rows > 0) {
        while($row = $result7->fetch_assoc()) {
                $studid = $row['Student_id'];
                $sql2 = "INSERT INTO participants VALUES(NULL,'$gg_id','$studid',NULL)";

               if ($conn->query($sql2) === TRUE) {
                    $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, _time, link, message_status) values (notif_id,'$studid', 'You have been added to a group guidance activity.',now(),'Guidance_Student_GroupGuidance.php', 'Delivered')");

                              if($result){
                                echo '<script>
                          swal({
                              title: "New Group Guidance Saved!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
                      }else{
                        echo '<script>
                          swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                          })
                        </script>';
                      }
                        echo "<meta http-equiv='refresh' content='2'>";

                }

                  /*SEND EMAIL*/
                  if(!mysqli_query($conn,"SELECT student.email_add, student.Student_id as id, student.last_name, student.first_name, student.middle_name, course.name, student.section, student.year_level, mode_of_communication.communication_mode, guidance_appointments.appointment_date, guidance_appointments.appointment_time FROM guidance_appointments JOIN group_guidance ON group_guidance.appointment_id=guidance_appointments.appointment_id left JOIN participants ON participants.grp_guidance_id=group_guidance.grp_guidance_id LEFT join student on student.Student_id=participants.Student_id LEFT JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id LEFT JOIN course on course.course_id = student.course_id WHERE student.Student_id ='$studid' and group_guidance.grp_guidance_id='$gg_id'")){

                  }else{ $sqlselect=mysqli_query($conn,"SELECT student.email_add, student.Student_id as id, student.last_name, student.first_name, student.middle_name, course.name, student.section, student.year_level, mode_of_communication.communication_mode, guidance_appointments.appointment_date, guidance_appointments.appointment_time FROM guidance_appointments JOIN group_guidance ON group_guidance.appointment_id=guidance_appointments.appointment_id left JOIN participants ON participants.grp_guidance_id=group_guidance.grp_guidance_id LEFT join student on student.Student_id=participants.Student_id LEFT JOIN mode_of_communication ON mode_of_communication.mode_id=guidance_appointments.mode_id LEFT JOIN course on course.course_id = student.course_id WHERE student.Student_id ='$studid' and group_guidance.grp_guidance_id='$gg_id'");

                    while($result = mysqli_fetch_array($sqlselect)) {  

                                             $from = "USeP Office of Student Affairs Services"; 
          $fromName = "Admin"; 
           
          $subject = "Guidance Office"; 

          $htmlContent = " <html>

          <head>
              <title></title>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
              <meta name='viewport' content='width=device-width, initial-scale=1'>
              <meta http-equiv='X-UA-Compatible'content='IE=edge' />
              <style type='text/css'>
           @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*='margin: 16px 0;'] {
            margin: 0 !important;
        }
        
        td{
            margin-left: 5px;
        }
    </style>
</head>

<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#C12C32' align='center'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'style='max-width: 1000px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#C12C32' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 1000px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                            <img src='https://www.usep.edu.ph/wp-content/themes/usep-website/images/usep-logo2.png' width='125' height='120' style='display: block; border: 0px;' />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#C12C32'  align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 1000px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 50px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;'>
                            <span style='margin: 0;'>Dear ".$result['last_name'].', '.$result['first_name'].' '.$result['middle_name']."</span><br><br>
                            <p style='margin: 0;'>&emsp;&emsp;You have been invited to attend the Group Guidance hosted by Guidance office, the details of your Group Guidance appointment are as the follows:</p>
                                                        <center><table  style='width: 80%; padding: 5px; margin: 3%; border: 1px solid black;font-size: 24px; font-weight: 400; line-height: 25px;'>
                                                        <tr>
                                                            <th colspan='2' style='padding-left: 30px;border: 1px solid black; height: 50px;'>COUNSELLING DETAILS</th>
                                                        </tr>
                                                        <tr>
                                                           <td style='padding-left: 30px;border: 1px solid black; height: 50px;'>ID Number:</td>
                                                           <td style='height: 30px;padding-left: 30px;border: 1px solid black;'>".$result['id']."</td>  
                                                        </tr>
                                                        <tr>
                                                           <td style='height: 30px;padding-left: 30px;border: 1px solid black;'>Name:</td>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>".$result['last_name'].', '.$result['first_name'].' '.$result['middle_name']."</td>  
                                                        </tr>
                                                        <tr>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>Course:</td>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>".$result['name']."</td>  
                                                        </tr>
                                                        <tr>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>Year & Section</td>
                                                           <td style='height: 30px;padding-left: 30px;border: 1px solid black;'>".$result['year_level'].'-'.$result['section']."</td>  
                                                        </tr>
                                                        <tr>
                                                           <td style='height: 30px;padding-left: 30px;border: 1px solid black;'>Mode of<br> Communication:</td>
                                                           <td style='height: 30px;padding-left: 30px;border: 1px solid black;'>".$result['communication_mode']."</td>  
                                                        </tr>
                                                        <tr>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>Date:</td>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>".$result['appointment_date']."</td>  
                                                        </tr>
                                                        <tr>
                                                           <td style='height: 50px;padding-left: 30px;border: 1px solid black;'>Time:</td>
                                                           <td style='height: 30px; padding-left: 30px;border: 1px solid black; width: 60%;'>".$result['appointment_time']."</td>  
                                                        </tr>
                                                    </table></center>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                          
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor='ffffff' align='left'style='padding: 0px 20px 0px 80px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>For more concerns regarding this transaction, please email us at our official email, guidanceoffice@usep.edu.ph or contact us at our contact number 09480834578.</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 80px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>Thank you for availing our services. </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 80px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>Guidance Office, Guidance Counsellor. </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='center' style='padding: 0px 0px 40px 0px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>****This is a system generated message. DO NOT REPLY TO THIS EMAIL****</p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td bgcolor='#C12C32' align='center'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'style='max-width: 1000px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>


</html>";
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
 
// Send email 
if(mail($result['email_add'], $subject, $htmlContent, $headers)){ 
    /*echo "<script>
window.location.href='index.php';
alert('Email Verification Sent!');
</script>";*/ 
    $newTime=date('H:i',strtotime('+4 hours', $result['appointment_date']));
    $from_name = "Guidance Office";        
    $from_address = "lloydsryan30@gmail.com";        
    $to_name = $result['last_name'].', '.$result['first_name'].' '.$result['middle_name'];        
    $to_address = $result['email_add'];          
    $startTime = $result['appointment_date'].' '.$newTime;  
    $endTime = "";    
    $subject = "Group Guidance Meeting Schedule";   
    $description = "Group Guidance Meeting Schedule";    
    $location = $result['communication_mode'];    
    $domain = 'gmail.com';
    
    //Create Email Headers
    $mime_boundary = "----Meeting Booking----".MD5(TIME());

    $headers = "From: ".$from_name." <".$from_address.">\n";
    $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
    $headers .= "Content-class: urn:content-classes:calendarmessage\n";
    
    //Create Email Body (HTML)
    $message = "--$mime_boundary\r\n";
    $message .= "Content-Type: text/html; charset=UTF-8\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= "<html>\n";
    $message .= "<body>\n";
    
    $message .= 'Group Guidance Meeting';
    
    $message .= "</body>\n";
    $message .= "</html>\n";
    $message .= "--$mime_boundary\r\n";

    //Event setting
    $ical = 'BEGIN:VCALENDAR' . "\r\n" .
    'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
    'VERSION:2.0' . "\r\n" .
    'METHOD:REQUEST' . "\r\n" .
    'BEGIN:VTIMEZONE' . "\r\n" .
    'TZID:Eastern Time' . "\r\n" .
    'BEGIN:STANDARD' . "\r\n" .
    'DTSTART:20091101T020000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=1SU;BYMONTH=11' . "\r\n" .
    'TZOFFSETFROM:-0400' . "\r\n" .
    'TZOFFSETTO:-0500' . "\r\n" .
    'TZNAME:EST' . "\r\n" .
    'END:STANDARD' . "\r\n" .
    'BEGIN:DAYLIGHT' . "\r\n" .
    'DTSTART:20090301T020000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=2SU;BYMONTH=3' . "\r\n" .
    'TZOFFSETFROM:-0500' . "\r\n" .
    'TZOFFSETTO:-0400' . "\r\n" .
    'TZNAME:EDST' . "\r\n" .
    'END:DAYLIGHT' . "\r\n" .
    'END:VTIMEZONE' . "\r\n" .  
    'BEGIN:VEVENT' . "\r\n" .
    'ORGANIZER;CN="'.$from_name.'":MAILTO:'.$from_address. "\r\n" .
    'ATTENDEE;CN="'.$to_name.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_address. "\r\n" .
    'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
    'UID:'.date("Ymd\TGis", strtotime($startTime)).rand()."@".$domain."\r\n" .
    'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
    'DTSTART;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($startTime)). "\r\n" .
    'DTEND;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($endTime)). "\r\n" .
    'TRANSP:OPAQUE'. "\r\n" .
    'SEQUENCE:1'. "\r\n" .
    'SUMMARY:' . $subject . "\r\n" .
    'LOCATION:' . $location . "\r\n" .
    'CLASS:PUBLIC'. "\r\n" .
    'PRIORITY:5'. "\r\n" .
    'BEGIN:VALARM' . "\r\n" .
    'TRIGGER:-PT15M' . "\r\n" .
    'ACTION:DISPLAY' . "\r\n" .
    'DESCRIPTION:Reminder' . "\r\n" .
    'END:VALARM' . "\r\n" .
    'END:VEVENT'. "\r\n" .
    'END:VCALENDAR'. "\r\n";
    $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST'."\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= $ical;

    if(mail($to_address, $subject, $message, $headers)){

    }else{

    }
}else{ 
  /* echo "<script>
window.location.href='index.php';
alert('Email Verification Failed!');
</script>"; */
echo "ERROR";}}

                }

                

         } 
       }
      }
      
     echo '<script>
                          swal({
                              title: "New Group Guidance Saved!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
                      }else{
                        echo '<script>
                          swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                          })
                        </script>';
                      }
                        echo "<meta http-equiv='refresh' content='2'>";
  }


  if(isset($_POST['up_stat'])){
  
    $gidd = $_POST['ggidd']; 
    $end_stat = "ABSENT";
    $date = date('Y-m-d H:i:s'); 

       $sql11 = "SELECT grp_guidance_id, appointment_id FROM group_guidance WHERE grp_guidance_id = '$gidd' ";
      $result11 = $conn->query($sql11);
      if ($result11->num_rows > 0) {
        while($row = $result11->fetch_assoc()) {
                  $app_id = $row['appointment_id'];
         }
       }

  
  $sql12 = "UPDATE guidance_appointments SET status_id ='1' WHERE appointment_id = '$app_id'";

if ($conn->query($sql12) === TRUE) {
  $todaydate = date("Y-m-d");
  $sqlDate = date('Y-m-d', strtotime($todaydate));
  $sql13 = "UPDATE guidance_appointments SET date_completed = '$sqlDate' WHERE appointment_id = '$app_id'";
    if ($conn->query($sql13) === TRUE) {
  $sql14 = "UPDATE participants SET attendance ='$end_stat' WHERE attendance IS NULL AND grp_guidance_id = '$gidd' ";

    if ($conn->query($sql14) === TRUE) {

  echo '<script>
                          swal({
                              title: "Changes Saved!",
                              text: "Server Request Successful!",
                              icon: "success",
                              buttons: false,
                              timer: 1800,
                              closeOnClickOutside: false,
                                closeOnEsc: false,
                          })
                        </script>';
                      }else{
                        echo '<script>
                          swal({
                            title: "Something went wrong...",
                            text: "Server Request Failed!",
                            icon: "error",
                            buttons: false,
                            timer: 1800,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                          })
                        </script>';
                      }
                        echo "<meta http-equiv='refresh' content='2'>";
  }
  }
}


  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <!-- Twitter meta-->
      <meta property="twitter:card" content="summary_large_image">
      <meta property="twitter:site" content="@pratikborsadiya">
      <meta property="twitter:creator" content="@pratikborsadiya">
      <!-- Open Graph Meta-->
      <meta property="og:type" content="website">
      <meta property="og:site_name" content="Vali Admin">
      <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
      <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
      <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
      <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!--  TITLE -->
    <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Guidance Admin Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
          <link rel="stylesheet" type="text/css" href="css/upstyle.css">

      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- DATEPICKER --> 
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <!-- DISABLE DATE AND TIME SCRIPT -->
      <script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
      <link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl" onload="initClock()">
      <!-- Navbar-->

        
      <header class="app-header">
    
   
      </header>

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">COORDINATOR</p>
            <p style="text-align: center;" class="app-sidebar__user-name font-sec" >HUB</p>
          </div>
      </div>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item active" href="Guidance_Counselling.php" data-toggle="treeview"><i class="app-menu__icon far fa-sticky-note"></i><span class="app-menu__label">Counselling</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Counselling.php">List of Counselling Sessions</a></li>
              <li><a class="treeview-item active" href="Guidance_GroupCounselling.php">Group Guidance</a></li>
              <li><a class="treeview-item" href="Guidance_NewForms.php">New Submitted Intake Forms</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Referrals.php" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Referrals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Referrals.php">List of Referral Forms</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item" href="Guidance_Admin_Records.php"><i class="app-menu__icon fas fa-vcard"></i><span class="app-menu__label">Student Records</span></a></li>
          <li><a class="app-menu__item" href="Guidance_Appointment.php"><i class="app-menu__icon  fas fa-calendar-check-o"></i><span class="app-menu__label">Appointments</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="Guidance_Reports.php" data-toggle="treeview"><i class="app-menu__icon  fas fa-line-chart"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Guidance_Reports.php">Counselling Reports</a></li>
              <li><a class="treeview-item" href="Guidance_GroupGuidance_Reports.php">Group Guidance Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Evaluation_Reports.php">Evaluation Reports</a></li>
              <li><a class="treeview-item" href="Guidance_Referral_Reports.php">Referral Reports</a></li>
              
            </ul>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
          <li><a class="app-menu__item" href="Guidance_Admin_Announcements.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
      <div><!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      </div>
      <ul class="app-nav">
        <li>
          <a class="appnavlevel">Hi, <?php echo $_SESSION['fullname'] ?></a>
        </li>
        <!-- SEMESTER, TIME, USER DROPDOWN -->
          <?php
            if($result = mysqli_query($conn, "SELECT * FROM list_of_semester where status='Active'")){
              while($row = mysqli_fetch_array($result)){
                $currSemesterYear = $row['semester'] .' '. $row['year'];
                echo '
                  <li>
                    <div class="appnavlevel" style="color: black;">
                      <span class="semesterYear">'.$row['semester'].'</span>
                    </div>
                  </li>
                  <li>
                    <div class="appnavlevel" style="color: black;">
                      <span class="semesterYear">'.$row['year'].'</span>
                    </div>
                  </li>
                ';
              }
            }
          ?>
          <li>
            <div class="datetime appnavlevel" style="color: black;">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
            </div>
          </li>
          <li>
            <div class="datetime appnavlevel" style="color: black;">
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
            </div>
          </li>
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
            <b style="color: red;"><?php echo $count;  ?></b>
            <i class=" fas fa-bell fa-lg mt-2"></i>
          </a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have <?php echo $count;  ?> new notifications.</li>              
              <div class="app-notification__content">                   
                <?php 
                  $count_sql="SELECT * from notif where (user_id=$admin_id or office_id = 4)  order by time desc";
                  $result = mysqli_query($conn, $count_sql);
                  while ($row = mysqli_fetch_assoc($result)) { 
                    $intval = intval(trim($row['time']));
                      if ($row['message_status']=='Delivered') {
                        echo'
                            <b><li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                <p class="app-notification__message">'.$row['message_body'].'</p>
                                <p class="app-notification__meta">'.timeago($row['time']).'</p>
                                <p class="app-notification__message">
                                <form method="POST" action="../../php/change_notif_status.php">
                                  <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                                  <input type="submit" name="open_notif" value="Open Message">
                                </form></p>
                              </div></a></li></b>
                              ';
                      }else{
                              echo'
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                <p class="app-notification__message">'.$row['message_body'].'</p>
                                <p class="app-notification__meta">'.timeago($row['time']).'</p>
                                <p class="app-notification__message"><form method="POST" action="../../php/change_notif_status.php">
                                <input type="hidden" name="notif_id" value="'.$row['notif_id'].'">
                                <input type="submit" name="open_notif" value="Open Message">
                                </form></p>
                              </div></a></li>
                              ';
                       }                 

                  }
                ?> 
              </div>
            <li class="app-notification__footer">
              <a href="Notifications.php">See all notifications.</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">      
              
               <a class="app-nav__item" style="width: 48px;" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <img class="rounded-circle" src="data:image/png;base64,<?php echo $_SESSION['photo'] ?>" style="max-width:100%;">
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                  <li><a class="dropdown-item" href="user-profiles.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                 <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
      
      </ul>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <form action="../../logout.php"><button class="btn btn-primary" name="logout" id="logoutbtn2" type="submit">Logout</button></form>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        


        //CLOCK
      function updateClock(){
        var now = new Date();
        var dname = now.getDay(),
            mo = now.getMonth(),
            dnum = now.getDate(),
            yr = now.getFullYear(),
            hou = now.getHours(),
            min = now.getMinutes(),
            sec = now.getSeconds(),
            pe = "AM";
        
            if(hou >= 12){
              pe = "PM";
            }
            if(hou == 0){
              hou = 12;
            }
            if(hou > 12){
              hou = hou - 12;
            }

            Number.prototype.pad = function(digits){
              for(var n = this.toString(); n.length < digits; n = 0 + n);
              return n;
            }

            var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
            var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for(var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];
      }

      function initClock(){
        updateClock();
        window.setInterval("updateClock()", 1);
      }
      var myInput = document.getElementById("newPass");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");
      var special = document.getElementById("special");

      var loadFile = function (event,imgname) {
        console.log("userPic");
        var image = document.getElementById(imgname);
        image.src = URL.createObjectURL(event.target.files[0]);
      };
      </script>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
       

         <!--<div class="page-error tile">-->
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div>
                <div>
                <div class="float-left"><h4>History of Group Guidance</h4></div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-auto">
                     
                  <div class="inline-block">
                    Month 
                  <select class="bootstrap-select" id="filter_month">
                      <option class="select-item" value="all" selected="selected">All</option>
                      <option class="select-item" value="01" >January</option>
                      <option class="select-item" value="02">February</option>
                      <option class="select-item" value="03">March</option>
                      <option class="select-item" value="04">April</option>
                      <option class="select-item" value="05">May</option>
                      <option class="select-item" value="06">June</option>
                      <option class="select-item" value="07">July</option>
                      <option class="select-item" value="08">August</option>
                      <option class="select-item" value="09">September</option>
                      <option class="select-item" value="10">October</option>
                      <option class="select-item" value="11">November</option>
                      <option class="select-item" value="12">December</option>
                    </select>
                   Status
                    <select class="bootstrap-select" name="filterstatus" id="filterstatus">
                        <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                          $result=mysqli_query($conn, "SELECT * FROM _status where status_id !='2'");               
                          while($res = mysqli_fetch_array($result)) { 
                           
                              $value= $res['status_id']; ?>
                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['status'];?></option>
                        <?php } ?>
                      </select>
                  Course
                  <select class="bootstrap-select" id="filtcourse">
                    <option class="select-item" value="all" selected="selected">All</option>
                       <?php
                                           $result=mysqli_query($conn, "SELECT * FROM course");               
                                          while($res = mysqli_fetch_array($result)) {         
                                              $value= $res['course_id']; ?>
                                              <option class="select-item" value="<?php echo $value; ?>"><?php echo $res['name'];?></option>
                                              <?php } ?>
                    </select>
                    </div>
                      </div>
                    <div class="col-sm">
                          <div class="inline-block float ml-2 mt-1">
                            <button class="btn btn-warning btn-sm verify" style="width: 200px; height: 40px;">
                            <a class="text" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-edit"></i> New Group Guidance
                          </button></a>

                      </div>

                  </div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="divFilter">
                  <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                      <tr>
                      <th width="5%;">Date of Counselling</th>
                      <th>Time</th>
                      <th>Purpose/Topic</th>
                      <th>Participants</th>
                      <th>Mode of Communication</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT guidance_appointments.status_id as sid, guidance_appointments.appointment_date, guidance_appointments.appointment_time, guidance_appointments.date_completed, group_guidance.grp_guidance_id, group_guidance.topic, course.title, group_guidance.year_level, group_guidance.section, mode_of_communication.communication_mode, _status.status FROM mode_of_communication JOIN guidance_appointments ON mode_of_communication.mode_id=guidance_appointments.mode_id JOIN group_guidance ON guidance_appointments.appointment_id=group_guidance.appointment_id JOIN course ON group_guidance.course_id=course.course_id JOIN _status ON guidance_appointments.status_id=_status.status_id ORDER by _status.status_id DESC";
                      $result = $conn->query($sql);
                      if($result = mysqli_query($conn, $sql)){
                      
                      while($row = $result->fetch_assoc()) {
                        $section=$row['section']; $year_level=$row['year_level'];
                        if ($section=='all') {
                          $section='';
                        }if ($year_level=='all') {
                          $year_level='';
                        }
                    ?>
                    <tr>
                      <td> <?php echo htmlentities($row['appointment_date']);?></td>
                      <td><?php echo htmlentities($row['appointment_time']);?></td>
                      <td><?php echo htmlentities($row['topic']);?></td>
                      <td><?php echo htmlentities($row['title']);?>&nbsp;<?php echo htmlentities($year_level);?>&nbsp;<?php echo htmlentities($section);?></td>
                      <td><?php echo htmlentities($row['communication_mode']);?></td>
                      <td><?php echo htmlentities($row['status']);?>&nbsp;<?php echo htmlentities($row['date_completed']);?></td>
                      <td><center><!-- <a href="#list<?php// echo $row['grp_guidance_id']; ?>" class="btn btn-info btn-sm viewbutton" data-toggle="modal" style="width:35px;"><i class="fa fa-eye"></i></a><?php //include('participant-modal.php');?>&nbsp; | &nbsp; -->
                      <?php if ($row['sid']=='1') { ?>
                       <button disabled="disabled" class="btn btn-warning btn-sm updatebutton" ><i class="fa fa-pencil-square-o"></i></button>
                      <?php }else{ ?>
                      <a href="#statt<?php echo $row['grp_guidance_id']; ?>" class="btn btn-warning btn-sm updatebutton" data-toggle="modal"><i class="fa fa-pencil-square-o"></i></a><?php include('Guidance_group_stat_up-modal.php'); }?>
                      </center></td>
                    </tr>

                    <?php
                      }}

                    ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>

   
<!-- NEW GROUP COUNSELLING -->

  <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:1050px; margin-left: -250px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> NEW GROUP COUNSELLING
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body c">
        <div class="tile">
        <form action="" method="post"> 
          <div>
        <div class="float-left"><h4>Select Participants</h4></div>
      </div><br><br>

      <div class="row">
         <div class="col-auto">
                  <div class="inline-block">
                    <?php
                      $sql1="SELECT course_id, title FROM course"; 
                    ?>
                    Course
                    <select class="bootstrap-select" id="filtr_course" name="filtr_course" >
                      <option class="select-item" value="all" selected="selected">ALL</option>
                       <?php
                          foreach ($conn->query($sql1) as $row){
                        ?>
                        <option value="<?php echo $row['course_id'];?>"><?php echo $row['title'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                      </div>
        <div class="col-auto">
                  <div class="inline-block">
                     <?php
                      $sql5="SELECT year_level from student GROUP BY year_level"; 
                    ?>
                    Year Level
                    <select class="bootstrap-select" id="filtr_year" name="filtr_year" disabled >
                        <option class="select-item" value="all" selected="selected">ALL</option>
                        <?php
                          foreach ($conn->query($sql5) as $row){
                        ?>
                        <option value="<?php echo $row['year_level'];?>"><?php echo $row['year_level'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                      </div>
          <div class="col-auto">
                  <div class="inline-block">
                    <?php
                      $sql4="SELECT section FROM student GROUP BY section"; 
                    ?>
                    Section
                    <select class="bootstrap-select" id="filtr_section" name="filtr_section" disabled >
                        <option class="select-item" value="all" selected="selected">ALL</option>
                        <?php
                          foreach ($conn->query($sql4) as $row){
                        ?>
                        <option value="<?php echo $row['section'];?>"><?php echo $row['section'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                      </div>


                    </div>
               
              <!-- PARTICIPANTS TALBE -->
               <br><br>
        
                      <div class="table-bd">
                <div class="table-responsive">
                  <br>
                      <div id="filterparticipants" class="filterparticipants"  >
                   <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                      <tr align="center">
                      <th>ID </th>
                      <th>Name</th>
                      <th class="max">Course</th>                      
                      <th class="max">Year&Section</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     
                    </tbody>
                  </table>
                  </div></div></div>
                
                 
                      </div>
              <div class="tile">
                <div>
                <div class="float-left"><h4>Set Schedule</h4></div>
                </div><br><br>
                 
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <b>DATE:</b> <input type="text"name="gguidance_date" id="gguidance_date" class="form-control datepicker" onkeydown="return false" placeholder="YY-MM-DD" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="col-sm">
                              <!-- <div class="form-group">
                                <b>Time:</b> <input class="form-control" type="time" name="gguidance_time" id="gguidance_time" required="">
                                </div> -->
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm">
                              <div class="form-group">
                                  <b>Purpose/Topic:</b><input class="form-control" type="text" name="gguidance_topic" id="gguidance_topic" required="">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                    <?php
                                    $sql1="SELECT mode_id, communication_mode FROM mode_of_communication"; 
                                    ?>
                                    <b>Mode of Communication:</b>
                                    <select type="text" class="form-control" name="gguidance_mode" id="gguidance_mode" required="">
                                    <?php
                                    foreach ($conn->query($sql1) as $row){
                                    ?>
                                      <option value="<?php echo $row['mode_id'];?>"><?php echo $row['communication_mode'];?></option>
                                    <?php } ?>
                                    </select>
                            </div>
                            <div class="calldivlink"></div>

                          </div>
                          
                      </div>
                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_gc" class="btn btn-success">Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

        <!--</div>-->


      </main>
<script type="text/javascript">
    $(document).ready(function(){
                  $("#gguidance_mode").on('change', function(){
                    var mode = $(this).val();
                                        
                    $.ajax({
                          url:"filter_groupguidance_mode_com.php",
                          type:"POST",
                          data:{mode: mode},
                          success:function(data){
                            $(".calldivlink").html(data);
                          },
                    });
                    
                  });
                });
</script>
 <!-- DATEPICKER -->
<?php 
                 $results[]= '';$disableTimeArr[]=''; $i=0;$count=0;
                $from= date('Y-m-d'); 
                $sql="SELECT DATE_FORMAT(appointment_date, '%d') as dy,appointment_date, appointment_time FROM `guidance_appointments` WHERE appointment_date > '$from'";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){

                  /*collect all schedule by hours(format-11/27/2021:8)*/
                  $hourholder=date('H', strtotime($row['appointment_time']));
                  $hourRemoveLeadingZero=ltrim($hourholder, "0");
                  $dateholder=date('m/d/Y',strtotime($row['appointment_date']));
                  $timeToDisableVar=$dateholder.':'.$hourRemoveLeadingZero;
                  $disableTimeArr[]='"'.$timeToDisableVar.'"';
                  
                  /*count the number of schedule, if >= 6 disable dates*/
                  $sql2="SELECT DATE_FORMAT(appointment_date, '%d') as dy, appointment_date FROM `guidance_appointments` WHERE  appointment_date > '$from' and DATE_FORMAT(appointment_date, '%d')";
                $result2 = mysqli_query($conn, $sql2);
               
                while($row2 = mysqli_fetch_assoc($result2)){
                  if ($row['dy']==$row2['dy']) {
                    $count++;
                    if ($count==6) {
                      $time= strtotime($row['appointment_date']);
                    $holder=date('d-m-Y', $time);
                    $results[] = '"'.$holder.'"';
                    }
                    # code...
                  }
                  
                }
                    
                } 
                $results=array_filter($results);
                $totaldayslist= implode(", ", $results);
                $disableTimeArr=array_filter($disableTimeArr);
                $timeToDisable= implode(", ", $disableTimeArr);
                ?>
                <!-- DISABLE DATESCHEDULE -->
<script type="text/javascript">
    var disabledtimes_mapping = [<?php echo $timeToDisable;?>];
    var datesForDisable = [<?php echo $totaldayslist;?>];
function formatDate(datestr)
{
    var date = new Date(datestr);
    var day = date.getDate(); day = day>9?day:"0"+day;
    var month = date.getMonth()+1; month = month>9?month:"0"+month;
    return month+"/"+day+"/"+date.getFullYear();
}

$(".datepicker").datetimepicker({
    format: 'yyyy/mm/dd hh:ii',
    startDate: new Date(),
    datesDisabled: datesForDisable,
    daysOfWeekDisabled: [0,6],
    autoclose: true,
    onRenderHour:function(date){
  if(disabledtimes_mapping.indexOf(formatDate(date)+":"+date.getUTCHours())>-1)
    {
        return ['disabled'];
    }
    }
});</script>
      <!-- Essential javascripts for application to work-->

      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>



      <script type="text/javascript">
        $('#demoNotify').click(function(){
          $.notify({
            title: "Update Complete : ",
            message: "Verified Successfuly!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });
        });
      </script>
      <script>
        <!-- table selection -->
          $('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
      </script>
      <!-- Data table plugin-->
      <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">$('#sampleTable').DataTable();</script>
      <script type="text/javascript">$('#sampleTable2').DataTable();</script>
      <!-- Google analytics script-->
      <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-72504830-1', 'auto');
          ga('send', 'pageview');
        }
      </script>
  <script type="text/javascript">
                $(document).ready(function(){
                  /*STATUS*/
                  $("#filter_month").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    var status = $("#filterstatus").val();
                    /*alert(month);*/
                    $.ajax({
                          url:"filter_Guidance_GroupCounselling.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                  $("#filtcourse").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    var status = $("#filterstatus").val();
                    /*alert(value);*/
                    $.ajax({
                          url:"filter_Guidance_GroupCounselling.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                  $("#filterstatus").on('change', function(){
                    var month = $("#filter_month").val();
                    var course = $("#filtcourse").val();
                    var status = $("#filterstatus").val();
                    /*alert(status);*/
                    $.ajax({
                          url:"filter_Guidance_GroupCounselling.php",
                          type:"POST",
                          data:{month : month, course: course, status:status},
                          beforeSend:function(){
                            $(".divFilter").html("Working.....");
                          },
                          success:function(data){
                            $(".divFilter").html(data);
                          },
                    });
                
                  });
                });
              </script>
              <script type="text/javascript">

                $(document).ready(function(){
                  $("#filtr_course").on('change', function(){
                    var course = $("#filtr_course").val();
                    var year = $("#filtr_year").val();
                    var section = $("#filtr_section").val();

                    if (year=='all') {
                      $('#filtr_year').prop("disabled", false);
                    }if(course=='all'){
                       $('#filtr_year').prop("disabled", true);
                       $('#filtr_section').prop("disabled", true);
                    }
                    $.ajax({
                          url:"Filter_Guidance_GroupCounselling_participants.php",
                          type:"POST",
                          data:{course: course, year: year, section: section},
                          beforeSend:function(){
                            $(".filterparticipants").html("Working.....");
                          },
                          success:function(data){
                            $(".filterparticipants").html(data);
                          },
                    });
                    
                
                  });

                  $("#filtr_year").on('change', function(){
                    var course = $("#filtr_course").val();
                    var year = $("#filtr_year").val();
                    var section = $("#filtr_section").val();
                    /*DISABLE ENABLE*/
                    if (section=='all') {
                      $('#filtr_section').prop("disabled", false);
                    }if(year=='all'){
                       $('#filtr_section').prop("disabled", true);
                    }
                    $.ajax({
                          url:"Filter_Guidance_GroupCounselling_participants.php",
                          type:"POST",
                          data:{course: course, year: year, section: section},
                          beforeSend:function(){
                            $(".filterparticipants").html("Working.....");
                          },
                          success:function(data){
                            $(".filterparticipants").html(data);
                          },
                    });
                
                  });
                    $("#filtr_section").on('change', function(){
                    var course = $("#filtr_course").val();
                    var year = $("#filtr_year").val();
                    var section = $("#filtr_section").val();
                    /*DISABLE ENABLE*/
                    $.ajax({
                          url:"Filter_Guidance_GroupCounselling_participants.php",
                          type:"POST",
                          data:{course: course, year: year, section: section},
                          beforeSend:function(){
                            $(".filterparticipants").html("Working.....");
                          },
                          success:function(data){
                            $(".filterparticipants").html(data);
                          },
                    });
                
                  });
                });
        </script>
<script type="text/javascript">
  
$( "frm" ).submit(function( event ) {
  event.preventDefault();
});

</script>
<?php  
      if ($count2!=0) { ?>
        <script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
      <?php
    }
      ?>
<!-- 
<div id="myModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notifications</h5>
            </div>
            <div class="modal-body">
                <p>You have <?php echo $count2;  ?> unread notifications</p><br>
                
                   
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div> -->

    </body>
  </html>