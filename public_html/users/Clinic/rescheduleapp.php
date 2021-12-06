<?php
include_once('connect.php');
                if(isset($_POST['reschedule'])){      
   $pat_id= $_POST['id'];
   $patient_id= $_POST['patient_id'];
   $name= $_POST['name']; 
   $mode=$_POST['mode'];
    $mode2=$_POST['mode2'];
   $type=$_POST['type'];
   $date=$_POST['date'];
   $date2=date_format( new DateTime($date),"F d, Y");
   $start=$_POST['start'];
    $start2=date_format( new DateTime($start),"F d, Y h:i a");
   $link= $_POST['link'];
   $email =$_POST['email'];
   $name = $_REQUEST['name'];
   
   $sql1=mysqli_query($db,"select * from consultation where patient_id='$patient_id' AND  communication_mode_first_option='$mode'  AND  communication_mode_second_option='$mode2' AND  appointment_date='$date'  AND  appointment_timefrom='$date'  AND  consultation_duration='$start'");
   
 if(mysqli_num_rows($sql1)>0)
 {
   echo '<script>alert("Conflict of schedule! Select another schedule!");</script>';
    echo "<script type='text/javascript'> document.location = 'Admin-NewConsultation.php'; </script>";
 }else $sql1=mysqli_query($db,"select * from consultation where patient_id='$patient_id' AND  communication_mode_first_option='$mode'  AND  communication_mode_second_option='$mode2' AND  appointment_date='$date'  AND  appointment_timefrom='$date'  AND  consultation_duration='$start'");
   
 if(mysqli_num_rows($sql1)>0)
 {
   echo '<script>alert("Duplicate Entry!");</script>';
    echo "<script type='text/javascript'> document.location = 'Appointments.php'; </script>";
 }
 else
 {
   $sql = "Update consultation set appointment_date='$date', communication_mode_first_option='$mode', communication_mode_first_option='$mode2', appointment_timefrom='$date',consultation_duration='$start',status='Approved', appointment_meetinglink='$link', date_received_by_nurse= now() where id='$pat_id'"; 
   if ($db->query($sql) === TRUE) {
 echo '<script>alert("Appointment rescheduled successfully!");</script>';
    $from_name = "Therese Joy Inso";        
    $from_address = "theresejoyinso@gmail.com";        
    $to_name = "Teejay";   
  $startTime =$date ;
    $endTime= $start;      
    $to_address = 'theresejoyinso@gmail.com';     
  $subject = "Appointment Schedule";   
  $description = "Appointment schedule";    
  $location = ""; 
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
    
    $message .= 'Good day  '.$name.',';
  $message .= "<br><br>\n \n";
  $message .= 'Your appointment has been set on  '.$date2.' to '.$start2.'. The mode of communication you choose is '.$mode2.' and '.$mode.'.';
  if($mode=="Google Meet" || $mode2=="Google Meet"){
  $message .= 'Click the meeting link  '.$link.' at the specified time to start your consultation.';
  }else if($mode=="Zoom" || $mode2=="Zoom"){
  $message .= 'Click the meeting link  '.$link.' at the specified time to start your consultation.';
  }else if($mode=="Cellphone" || $mode2=="Cellphone"){
  $message .= 'The Clinic will directly contact you at your phone. Please be ready at your schedule.';
  }else if($mode=="Messenger" || $mode2=="Messenger"){
  $message .= 'The Clinic will directly contact you at your messenger. Please be guided that you registered correctly your messenger account on the system.';
  }else{
  }
  $message .="<br><br> \n \n";
  $message .=' Sincerely,';
  $message .="<br> \n ";
  $message .='USeP Tagum-Mabini Clinic';
  
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
        echo "<script type='text/javascript'> document.location = 'Appointments.php'; </script>";
    }else{
        echo "error";
    }
 
} else {
  echo '<script>alert("Failed!Try Again!"); </script>';
}
}
}
   ?>
