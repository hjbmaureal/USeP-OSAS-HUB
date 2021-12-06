<!DOCTYPE html>
  <html>
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
      <link rel="icon" href="../image/logo.png" type="image/gif" sizes="16x16">
      <title>Super Admin | USeP Virtual Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../css/superadmin/main_main.css">
      <link rel="stylesheet" type="text/css" href="../css/superadmin/upstyle_main.css">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  </head>
  <body>
<?php
	include("../conn.php");
	if(isset($_POST['submit']))
        {

        $complaintID = $_POST['complain_ID'];
        $responseID = $_POST['response_id'];
        $date = $_POST['appdate'];
        $time = $_POST['appdate'];
        $meet_type = $_POST['meet_type'];
        $meet_link = $_POST['meet_link'];
        $meet_id = $_POST['meet_id'] ?? null;
        $passcode = $_POST['passcode'] ?? null;
        $status = 'On Going';

        //$date1 = $date->format('Y-m-d');


        // if($meet_id == null && $passcode == null){
        //   $meet_id = "N/A";
        //   $passcode = "N/A";
        // }


        $sql2 = "SELECT * FROM complaint WHERE Complaint_ID = '$complaintID'";
        $sql3 = "SELECT * FROM response WHERE response_id = '$responseID'";
            $res = mysqli_query($conn,$sql2);
            $res1 = mysqli_query($conn,$sql3);

            $row = mysqli_fetch_assoc($res);
            $row1 = mysqli_fetch_assoc($res1);

                $id1 = $row['Student_id'];
                $id2 = $row1['defendant'];

                $sql4 = "SELECT * FROM studentdetails WHERE student_id = '$id1'";
                $sql5 = "SELECT * FROM studentdetails WHERE student_id = '$id2'";
                $res2 = mysqli_query($conn,$sql4);
                $res3 = mysqli_query($conn,$sql5);
                $row2 = mysqli_fetch_assoc($res2);
                $row3 = mysqli_fetch_assoc($res3); 
                $name1 = $row2['fullname'];
                $name2 = $row3['fullname'];
                $gmail1 = $row2['email_add'];
                $gmail2 = $row3['email_add'];

$notification1=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$id1', 'Your meeting with the Student Discipline regarding to your complaint to a student has been scheduled. Please check your email for the meeting link.',now(),'../users/Student/Discipline-Response.php', 'Delivered')");

$notification2=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status) values ('$id2', 'Your meeting with the Student Discipline regarding to your response in a complaint has been scheduled. Please check your email for the meeting link.',now(),'../users/Student/Discipline-Response.php', 'Delivered')");

        $sql = "UPDATE response SET date_schedule= '$date', time_from = '$time', meeting_type = '$meet_type', meeting_link = '$meet_link', meeting_id = '$meet_id', passcode = '$passcode', status = '$status' WHERE Complaint_ID = '$complaintID' ";

        $sql1 = "UPDATE complaint SET Status = '$status' WHERE Complaint_ID = '$complaintID' ";

        $sql_run = mysqli_query($conn , $sql);
        $sql_run1 = mysqli_query($conn , $sql1);
       
        // echo $statuscom;
        // echo $complaintID;
        // echo $dependantID;
        // echo $action_taken;
        
        //Complainant email sending 

        $time1 = strtotime($time);      

        $from_name = "OSAS TAGUM - MABINI";        
        $from_address = "edwinpams1@gmail.com";        
        $to_name = $name1;        
        $to_address = $gmail1; 
        $startTime = $date." ".date("H:i:s", strtotime('+4 hours', $time1));  
        $endTime = $date." ".date("H:i:s", strtotime('+5 hours', $time1));    
        $subject = "Reminder for event";   
        $description = "Reminder for Virtual Meeting";    
        $location = $meet_type;    
        $domain = 'gmail.com';
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
    
    $message .= 'Demo Message';
    
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

    //Defendant email sending 
    $from_name2 = "OSAS TAGUM - MABINI";        
        $from_address2 = "edwinpams1@gmail.com";        
        $to_name2 = $name2;        
        $to_address2 = $gmail2; 
        $startTime2 = $date." ".date("H:i:s", strtotime('+4 hours', $time1));  
        $endTime2 = $date." ".date("H:i:s", strtotime('+5 hours', $time1));    
        $subject2 = "Reminder for event";   
        $description2 = "Reminder for Virtual Meeting";    
        $location2 = $meet_type;    
        $domain2 = 'gmail.com';
        $mime_boundary2 = "----Meeting Booking----".MD5(TIME());

    $headers2 = "From: ".$from_name2." <".$from_address2.">\n";
    $headers2 .= "Reply-To: ".$from_name2." <".$from_address2.">\n";
    $headers2 .= "MIME-Version: 1.0\n";
    $headers2 .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
    $headers2 .= "Content-class: urn:content-classes:calendarmessage\n";
    
    //Create Email Body (HTML)
    $message2 = "--$mime_boundary\r\n";
    $message2 .= "Content-Type: text/html; charset=UTF-8\n";
    $message2 .= "Content-Transfer-Encoding: 8bit\n\n";
    $message2 .= "<html>\n";
    $message2 .= "<body>\n";
    
    $message2 .= 'Demo Message';
    
    $message2 .= "</body>\n";
    $message2 .= "</html>\n";
    $message2 .= "--$mime_boundary\r\n";

    //Event setting
    $ical2 = 'BEGIN:VCALENDAR' . "\r\n" .
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
    'ORGANIZER;CN="'.$from_name2.'":MAILTO:'.$from_address2. "\r\n" .
    'ATTENDEE;CN="'.$to_name2.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_address2. "\r\n" .
    'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
    'UID:'.date("Ymd\TGis", strtotime($startTime2)).rand()."@".$domain2."\r\n" .
    'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
    'DTSTART;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($startTime2)). "\r\n" .
    'DTEND;TZID="Pacific Daylight":'.date("Ymd\THis", strtotime($endTime2)). "\r\n" .
    'TRANSP:OPAQUE'. "\r\n" .
    'SEQUENCE:1'. "\r\n" .
    'SUMMARY:' . $subject2 . "\r\n" .
    'LOCATION:' . $location2 . "\r\n" .
    'CLASS:PUBLIC'. "\r\n" .
    'PRIORITY:5'. "\r\n" .
    'BEGIN:VALARM' . "\r\n" .
    'TRIGGER:-PT15M' . "\r\n" .
    'ACTION:DISPLAY' . "\r\n" .
    'DESCRIPTION:Reminder' . "\r\n" .
    'END:VALARM' . "\r\n" .
    'END:VEVENT'. "\r\n" .
    'END:VCALENDAR'. "\r\n";
    $message2 .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST'."\n";
    $message2 .= "Content-Transfer-Encoding: 8bit\n\n";
    $message2 .= $ical2;

        if(mail($to_address, $subject, $message, $headers) && mail($to_address2, $subject2, $message2, $headers2)){
            if($sql_run && $sql_run1){
            echo '<script>
               swal({
              title: "Schedule Created Successfully!",
              text: "Server Request Success",
              type: "success"
            }, function () {
              setTimeout(function () {
                 window.location.href="../users/Osas/Response.php";
              }, 500);
            });
                  </script>';            }
            else{
                echo '<script>
               swal({
              title: "Schedule Created Unsuccessfully!",
              text: "Server Request Success",
              type: "success"
            }, function () {
              setTimeout(function () {
                 window.location.href="../users/Osas/Response.php";
              }, 500);
            });
                  </script>';  
            }
        }
        else{
            echo '<script>
               swal({
              title: "Schedule Created Unsuccessfully!",
              text: "Server Request Success",
              type: "success"
            }, function () {
              setTimeout(function () {
                 window.location.href="../users/Osas/Response.php";
              }, 500);
            });
                  </script>';  
        }

        
    }
    

 ?>