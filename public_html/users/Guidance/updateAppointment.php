<?php 
session_start();
include('conn.php');
if (isset($_POST['updatebut'])) {
  $id=$_POST['id'];
  $stud_id=$_POST['stud_id'];
  $mode=$_POST['mode'];
  $date=date('Y-m-d',strtotime($_POST['date']));
  $time=date('H:i',strtotime($_POST['date']));
  $link='';
  if (isset($_POST['link'])) {
      $link=$_POST['link'];
  }
  $code='';
  if (isset($_POST['code'])) {
      $link=$_POST['code'];
  }
          $sqlUpdate="UPDATE `guidance_appointments` SET `mode_id`='$mode',`appointment_date`='$date',`appointment_time`='$time', link='$link', meeting_code='$code' WHERE guidance_appointments.appointment_id='$id'";
         $prorow3=$conn->query($sqlUpdate);

         /*Get Cred from database*/

                            $cred = "SELECT last_name, first_name, middle_name, email_add, appointment_date, appointment_time, mode_of_communication.communication_mode FROM guidance_appointments left join indv_counselling on indv_counselling.appointment_id=guidance_appointments.appointment_id LEFT JOIN mode_of_communication on guidance_appointments.mode_id=mode_of_communication.mode_id LEFT join intake_form on indv_counselling.intake_id = intake_form.intake_id LEFT JOIN student on intake_form.Student_id=student.Student_id WHERE guidance_appointments.appointment_id='$id'";
        if($cd=mysqli_query($conn,$cred))
        {
            while ($creds = mysqli_fetch_assoc($cd))
            {               $time=date('H:i',strtotime('+4 hours', $_POST['date']));
                            /*Send schedule to Google callendar*/
                            $from_name = "Guidance Office";        
                            $from_address = "lloydsryan30@gmail.com";        
                            $to_name = $creds['last_name'].', '.$creds['first_name'].' '.$creds['middle_name'];        
                            $to_address = $creds['email_add'];          
                            $startTime = $date.' '.$time;  
                            $endTime = "";    
                            $subject = "Guidance Meeting Schedule";   
                            $description = "Guidance Meeting Schedule";    
                            $location = $creds['communication_mode'];    
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
                                echo "success";
                            }else{
                                echo "error";
                            }
            }
        }
         ?>
         <?php
            newNotif($conn,$stud_id);
           $_SESSION['success'] = 'Appointment updated successfully';
         header('location: Guidance_Appointment.php');
}

function newNotif($conn,$stud_id){

                        
                            $result=mysqli_query($conn,"insert into notif(notif_id,user_id, message_body, time, link, message_status) values (notif_id,'$stud_id', 'The guidance sets a new appointment schedule with you.',now(),'Guidance_Student_Counselling.php', 'Delivered')");
                              if($result){
                                echo '<script>
                                    alert("Succesful");
                                  </script>';
                              }else{
                                echo '<script>
                                      alert("Failed");
                                    </script>';
                              }
                    }
            ?>