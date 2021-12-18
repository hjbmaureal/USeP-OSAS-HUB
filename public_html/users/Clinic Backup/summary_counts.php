<?php //bsa 
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0001 = mysqli_num_rows($res);
   
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others1= mysqli_num_rows($res);
   $bp_count1=$bp_count0001+$others1;
?> 

<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0002 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others2= mysqli_num_rows($res);
   $bp_count2=$bp_count0002+$others2;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0003 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others3= mysqli_num_rows($res);
   $bp_count3=$bp_count0003+$others3;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0004 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others4= mysqli_num_rows($res);
   $bp_count4=$bp_count0004+$others4;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0005 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others5= mysqli_num_rows($res);
   $bp_count5=$bp_count0005+$others5;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0006 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others6= mysqli_num_rows($res);
   $bp_count6=$bp_count0006+$others6;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0007 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others7= mysqli_num_rows($res);
   $bp_count7=$bp_count0007+$others7;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0008 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others8= mysqli_num_rows($res);
   $bp_count8=$bp_count0008+$others8;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0009 = mysqli_num_rows($res);
   
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others9 =mysqli_num_rows($res);
    $bp_count9=$bp_count0009+$others9;
   
?>
<?php //cars-d
        
 $date = date('Y');
     $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00010 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others10 =mysqli_num_rows($res);
    $bp_count10=$bp_count00010+$others10;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00011 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others11 =mysqli_num_rows($res);
    $bp_count11=$bp_count00011+$others11;
?>
<?php //ctet-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00012 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others12 =mysqli_num_rows($res);
    $bp_count12=$bp_count00012+$others12;
?>
<?php //faculty
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00013 = mysqli_num_rows($res);
   
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others13= mysqli_num_rows($res);
    $bp_count13=$bp_count00013+$others13;
?>
<?php //Staff
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00014 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others14= mysqli_num_rows($res);
    $bp_count14=$bp_count00014+$others14;
?>
<?php //ext
    
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00015 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others214= mysqli_num_rows($res);
    $bp_count15=$bp_count00015+$others214;
?>
<?php //total1
        
 $date = date('Y');
      $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '01' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_total001 = mysqli_num_rows($res);
   
    $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '01'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others15= mysqli_num_rows($res);
   $bp_total1=$bp_total001+$others15;
?>
<!--February-->
<?php //bsa
        
 $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00101 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others16= mysqli_num_rows($res);
   $bp_count101=$bp_count00101+$others16;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00102 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others17= mysqli_num_rows($res);
   $bp_count102=$bp_count00102+$others17;
?>
<?php //bece
        
 $date = date('Y');
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00103 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others18= mysqli_num_rows($res);
   $bp_count103=$bp_count00103+$others18;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00104 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others19= mysqli_num_rows($res);
   $bp_count104=$bp_count00104+$others19;
?>
<?php //beed
        
 $date = date('Y');
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00105 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others20= mysqli_num_rows($res);
   $bp_count105=$bp_count00105+$others20;
?>
<?php //bsabe
        
 $date = date('Y');
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00106 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others21= mysqli_num_rows($res);
   $bp_count106=$bp_count00106+$others21;
?>
<?php //bsf
        
 $date = date('Y');
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00107 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others22= mysqli_num_rows($res);
   $bp_count107=$bp_count00107+$others22;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00108 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others23= mysqli_num_rows($res);
   $bp_count108=$bp_count00108+$others23;
?>
<?php //cars-m
        
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00119 = mysqli_num_rows($res);
   
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others24 =mysqli_num_rows($res);
    $bp_count109=$bp_count00119+$others24;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00110 = mysqli_num_rows($res);
   
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others25 =mysqli_num_rows($res);
    $bp_count110=$bp_count00110+$others25;
?>
<?php //ctet-m
        
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00111 = mysqli_num_rows($res);
   
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others26 =mysqli_num_rows($res);
    $bp_count111=$bp_count00111+$others26;
?>
<?php //ctet-d
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00112 = mysqli_num_rows($res);
   
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others27 =mysqli_num_rows($res);
    $bp_count112=$bp_count00112+$others27;
?>
<?php //faculty
        
$date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00113 = mysqli_num_rows($res);
   
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others28= mysqli_num_rows($res);
    $bp_count113=$bp_count00113+$others28;
?>
<?php //Staff
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00114 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others29= mysqli_num_rows($res);
    $bp_count114=$bp_count00114+$others29;
?>
<?php //ext
        
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00115 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others229= mysqli_num_rows($res);
    $bp_count115=$bp_count00115+$others229;
?>
<?php //total1
        
  $date = date('Y');
      $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '02' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00116 = mysqli_num_rows($res);
   
    $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others30= mysqli_num_rows($res);
   $bp_count116=$bp_count00116+$others30;
?>
<!--March-->
<?php //bsa
        
$date = date('Y');
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00201 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others33= mysqli_num_rows($res);
   $bp_count201=$bp_count00201+$others33;
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00202 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others34= mysqli_num_rows($res);
   $bp_count202=$bp_count00202+$others34;
?>
<?php //bece
        
 $date = date('Y');
    $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00203 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others35= mysqli_num_rows($res);
   $bp_count203=$bp_count00203+$others35;
?>
<?php //bsned
        
 $date = date('Y');
 $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00204 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others36= mysqli_num_rows($res);
   $bp_count204=$bp_count00204+$others36;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00205 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others37= mysqli_num_rows($res);
   $bp_count205=$bp_count00205+$others37;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00206 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others38= mysqli_num_rows($res);
   $bp_count206=$bp_count00206+$others38;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00207 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others39= mysqli_num_rows($res);
   $bp_count207=$bp_count00207+$others39;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00208 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others40= mysqli_num_rows($res);
   $bp_count208=$bp_count00208+$others40;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00209 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others41 =mysqli_num_rows($res);
    $bp_count209=$bp_count00209+$others41;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00210 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others42 =mysqli_num_rows($res);
    $bp_count210=$bp_count00210+$others42;
?>
<?php //ctet-m
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00211 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others43 =mysqli_num_rows($res);
    $bp_count211=$bp_count00211+$others43;
?>
<?php //ctet-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00212 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others44 =mysqli_num_rows($res);
    $bp_count212=$bp_count00212+$others44;
?>
<?php //faculty
        
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00213 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others45= mysqli_num_rows($res);
    $bp_count213=$bp_count00213+$others45;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00214 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others46= mysqli_num_rows($res);
    $bp_count214=$bp_count00214+$others46;
?>
<?php //ext
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00215 = mysqli_num_rows($res);
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '03' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others247= mysqli_num_rows($res);
    $bp_count215=$bp_count00215+$others247;
?>
<?php //total1
        
 $date = date('Y');
    $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '03' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00216 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '02'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others47= mysqli_num_rows($res);
   $bp_count216=$bp_count00216+$others47;
?>

<!--April-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00301 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others48= mysqli_num_rows($res);
   $bp_count301=$bp_count00301+$others48;
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00302 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others49= mysqli_num_rows($res);
   $bp_count302=$bp_count00302+$others49;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00303 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others50= mysqli_num_rows($res);
   $bp_count303=$bp_count00303+$others50;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00304 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others51= mysqli_num_rows($res);
   $bp_count304=$bp_count00304+$others51;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00305 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others52= mysqli_num_rows($res);
   $bp_count305=$bp_count00305+$others52;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00306 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others53= mysqli_num_rows($res);
   $bp_count306=$bp_count00306+$others53;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00307 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others54= mysqli_num_rows($res);
   $bp_count307=$bp_count00307+$others54;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00308 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others55= mysqli_num_rows($res);
   $bp_count308=$bp_count00308+$others55;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00309 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others56 =mysqli_num_rows($res);
    $bp_count309=$bp_count00309+$others56;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00310 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others57 =mysqli_num_rows($res);
    $bp_count310=$bp_count00310+$others57;
?>
<?php //ctet-m
        
  $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00311 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others58 =mysqli_num_rows($res);
    $bp_count311=$bp_count00311+$others58;
?>
<?php //ctet-d
        
  $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00312 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others59 =mysqli_num_rows($res);
    $bp_count312=$bp_count00312+$others59;
?>
<?php //faculty
        
  $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00313 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others60= mysqli_num_rows($res);
    $bp_count313=$bp_count00313+$others60;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00314 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others61= mysqli_num_rows($res);
    $bp_count314=$bp_count00314+$others61;
?>
<?php //ext
        
 $date = date('Y');
     $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00315 = mysqli_num_rows($res);
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others261= mysqli_num_rows($res);
    $bp_count315=$bp_count00315+$others261;
?>
<?php //total1
        
 $date = date('Y');
    $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '04' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00316 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '04'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others62= mysqli_num_rows($res);
   $bp_count316=$bp_count00316+$others62;
?>

<!--May-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00401 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others63= mysqli_num_rows($res);
   $bp_count401=$bp_count00401+$others63;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00402 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others64= mysqli_num_rows($res);
   $bp_count402=$bp_count00402+$others64;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00403 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others65= mysqli_num_rows($res);
   $bp_count403=$bp_count00403+$others65;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00404 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others66= mysqli_num_rows($res);
   $bp_count404=$bp_count00404+$others66;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00405 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others67= mysqli_num_rows($res);
   $bp_count405=$bp_count00405+$others67;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00406 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others68= mysqli_num_rows($res);
   $bp_count406=$bp_count00406+$others68;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00407 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others69= mysqli_num_rows($res);
   $bp_count407=$bp_count00407+$others69;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00408 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others70= mysqli_num_rows($res);
   $bp_count408=$bp_count00408+$others70;
?>
<?php //cars-m
        
 $date = date('Y');
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00409 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others71 =mysqli_num_rows($res);
    $bp_count409=$bp_count00409+$others71;
?>
<?php //cars-d
        
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00410 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others72 =mysqli_num_rows($res);
    $bp_count410=$bp_count00410+$others72;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00411 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others73 =mysqli_num_rows($res);
    $bp_count411=$bp_count00411+$others73;
?>
<?php //ctet-d
        
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00412 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others74 =mysqli_num_rows($res);
    $bp_count412=$bp_count00412+$others74;
?>
<?php //faculty
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00413 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others75= mysqli_num_rows($res);
    $bp_count413=$bp_count00413+$others75;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00414 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others76= mysqli_num_rows($res);
    $bp_count414=$bp_count00414+$others76;
?>
<?php //ext     
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00415 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others276= mysqli_num_rows($res);
    $bp_count415=$bp_count00415+$others276;
?>
<?php //total1
        
 $date = date('Y');
    $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '05' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00416 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '05'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others78= mysqli_num_rows($res);
   $bp_count416=$bp_count00416+$others78;
?>

<!--June-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00501 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others79= mysqli_num_rows($res);
   $bp_count501=$bp_count00501+$others79;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00502 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others80= mysqli_num_rows($res);
   $bp_count502=$bp_count00502+$others80;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00503 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others81= mysqli_num_rows($res);
   $bp_count503=$bp_count00503+$others81;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00504 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others82= mysqli_num_rows($res);
   $bp_count504=$bp_count00504+$others82;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00505 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others83= mysqli_num_rows($res);
   $bp_count505=$bp_count00505+$others83;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00506 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others85= mysqli_num_rows($res);
   $bp_count506=$bp_count00506+$others85;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00507 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others86= mysqli_num_rows($res);
   $bp_count507=$bp_count00507+$others86;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00508 = mysqli_num_rows($res);
   
       $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others87= mysqli_num_rows($res);
   $bp_count508=$bp_count00508+$others87;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00509 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others88 =mysqli_num_rows($res);
    $bp_count509=$bp_count00509+$others88;
?>
<?php //cars-d
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00510 = mysqli_num_rows($res);
   
      $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others89 =mysqli_num_rows($res);
    $bp_count510=$bp_count00510+$others89;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00511 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others90 =mysqli_num_rows($res);
    $bp_count511=$bp_count00511+$others90;
?>
<?php //ctet-d
        
 $date = date('Y');
   $$sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00512 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others91 =mysqli_num_rows($res);
    $bp_count512=$bp_count00512+$others91;
?>
<?php //faculty
        
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00513 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others92= mysqli_num_rows($res);
    $bp_count513=$bp_count00513+$others92;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00514 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others93= mysqli_num_rows($res);
    $bp_count514=$bp_count00514+$others93;
?>
<?php //ext
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00515 = mysqli_num_rows($res);
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others293= mysqli_num_rows($res);
    $bp_count515=$bp_count00515+$others293;
?>
<?php //total1
        
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '06' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00516 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '06'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others94= mysqli_num_rows($res);
   $bp_count516=$bp_count00516+$others94;
?>

<!--July-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00601 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others95= mysqli_num_rows($res);
   $bp_count601=$bp_count00601+$others95;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00602 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others96= mysqli_num_rows($res);
   $bp_count602=$bp_count00602+$others96;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00603 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others97= mysqli_num_rows($res);
   $bp_count603=$bp_count00603+$others97;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00604 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others98= mysqli_num_rows($res);
   $bp_count604=$bp_count00604+$others98;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00605 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others99= mysqli_num_rows($res);
   $bp_count605=$bp_count00605+$others99;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00606 = mysqli_num_rows($res);

    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others100= mysqli_num_rows($res);
   $bp_count606=$bp_count00606+$others100;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00607 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others101= mysqli_num_rows($res);
   $bp_count607=$bp_count00607+$others101;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00608 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others102= mysqli_num_rows($res);
   $bp_count608=$bp_count00608+$others102;
?>
<?php //cars-m
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00609 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others103 =mysqli_num_rows($res);
    $bp_count609=$bp_count00609+$others103;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00610 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others104 =mysqli_num_rows($res);
    $bp_count610=$bp_count00610+$others104;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00611 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others105 =mysqli_num_rows($res);
    $bp_count611=$bp_count00611+$others105;
?>
<?php //ctet-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00612 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others106 =mysqli_num_rows($res);
    $bp_count612=$bp_count00612+$others106;
?>
<?php //faculty
        
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00613 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others107= mysqli_num_rows($res);
    $bp_count613=$bp_count00613+$others107;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00614 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others108= mysqli_num_rows($res);
    $bp_count614=$bp_count00614+$others108;
?>
<?php //ext
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00615 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others2108= mysqli_num_rows($res);
    $bp_count615=$bp_count00615+$others2108;
?>
<?php //total1
        
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '07' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00616 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '07'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others110= mysqli_num_rows($res);
   $bp_count616=$bp_count00616+$others110;
?>


<!--August-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00701 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others111= mysqli_num_rows($res);
   $bp_count701=$bp_count00701+$others111;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00702 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others112= mysqli_num_rows($res);
   $bp_count702=$bp_count00702+$others112;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00703 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others113= mysqli_num_rows($res);
   $bp_count703=$bp_count00703+$others113;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00704 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others114= mysqli_num_rows($res);
   $bp_count704=$bp_count00704+$others114;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00705 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others115= mysqli_num_rows($res);
   $bp_count705=$bp_count00705+$others115;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00706 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others116= mysqli_num_rows($res);
   $bp_count706=$bp_count00706+$others116;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00707 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others117= mysqli_num_rows($res);
   $bp_count707=$bp_count00707+$others117;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00708 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others118= mysqli_num_rows($res);
   $bp_count708=$bp_count00708+$others118;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00709 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others119 =mysqli_num_rows($res);
    $bp_count709=$bp_count00709+$others119;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00710 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others120 =mysqli_num_rows($res);
    $bp_count710=$bp_count00710+$others120;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00711 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others121 =mysqli_num_rows($res);
    $bp_count711=$bp_count00711+$others121;
?>
<?php //ctet-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00712 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others122 =mysqli_num_rows($res);
    $bp_count712=$bp_count00712+$others122;
?>
<?php //faculty
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00713 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others123= mysqli_num_rows($res);
    $bp_count713=$bp_count00713+$others123;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00714 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others124= mysqli_num_rows($res);
    $bp_count714=$bp_count00714+$others124;
?>
<?php //ext
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00715 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others125= mysqli_num_rows($res);
    $bp_count715=$bp_count00715+$others125;
?>
<?php //total1
        
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '08' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00716 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '08'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others126= mysqli_num_rows($res);
   $bp_count716=$bp_count00716+$others126;
?>

<!--September-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00801 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others127= mysqli_num_rows($res);
   $bp_count801=$bp_count00801+$others127;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00802 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others128= mysqli_num_rows($res);
   $bp_count802=$bp_count00802+$others128;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00803 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others129= mysqli_num_rows($res);
   $bp_count803=$bp_count00803+$others129;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00804 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others130= mysqli_num_rows($res);
   $bp_count804=$bp_count00804+$others130;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00805 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others131= mysqli_num_rows($res);
   $bp_count805=$bp_count00805+$others131;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00806 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others132= mysqli_num_rows($res);
   $bp_count806=$bp_count00806+$others132;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00807 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others133= mysqli_num_rows($res);
   $bp_count807=$bp_count00807+$others133;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00808 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others134= mysqli_num_rows($res);
   $bp_count808=$bp_count00808+$others134;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00809 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others135 =mysqli_num_rows($res);
    $bp_count809=$bp_count00809+$others135;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00810 = mysqli_num_rows($res);
   
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others136 =mysqli_num_rows($res);
    $bp_count810=$bp_count00810+$others136;
?>
<?php //ctet-m
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00811 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others137 =mysqli_num_rows($res);
    $bp_count811=$bp_count00811+$others137;
?>
<?php //ctet-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00812 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others138 =mysqli_num_rows($res);
    $bp_count812=$bp_count00812+$others138;
?>
<?php //faculty
        
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00813 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others139= mysqli_num_rows($res);
    $bp_count813=$bp_count00813+$others139;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00814 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others140= mysqli_num_rows($res);
    $bp_count814=$bp_count00814+$others140;
?>
<?php //ext
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000815 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others141= mysqli_num_rows($res);
    $bp_count815=$bp_count000815+$others141;
?>
<?php //total1
        
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '09' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00816 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '09'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others142= mysqli_num_rows($res);
   $bp_count816=$bp_count00816+$others142;
?>
<!--October-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00901 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others143= mysqli_num_rows($res);
   $bp_count901=$bp_count00901+$others143;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00902 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others144= mysqli_num_rows($res);
   $bp_count902=$bp_count00902+$others144;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00903 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others145= mysqli_num_rows($res);
   $bp_count903=$bp_count00903+$others145;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00904 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others146= mysqli_num_rows($res);
   $bp_count904=$bp_count00904+$others146;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00905 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others147= mysqli_num_rows($res);
   $bp_count905=$bp_count00905+$others147;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00906 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others148= mysqli_num_rows($res);
   $bp_count906=$bp_count00906+$others148;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00907 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others149= mysqli_num_rows($res);
   $bp_count907=$bp_count00907+$others149;
   
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00908 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others150= mysqli_num_rows($res);
   $bp_count908=$bp_count00908+$others150;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00909 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others151 =mysqli_num_rows($res);
    $bp_count909=$bp_count00909+$others151;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00910 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others152 =mysqli_num_rows($res);
    $bp_count910=$bp_count00910+$others152;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00911 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others153 =mysqli_num_rows($res);
    $bp_count911=$bp_count00911+$others153;
?>
<?php //ctet-d
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00912 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others154 =mysqli_num_rows($res);
    $bp_count912=$bp_count00912+$others154;
?>
<?php //faculty
        
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00913 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others155= mysqli_num_rows($res);
    $bp_count913=$bp_count00913+$others155;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00914 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others156= mysqli_num_rows($res);
    $bp_count914=$bp_count00914+$others156;
?>
<?php //ext
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00915 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others2156= mysqli_num_rows($res);
    $bp_count915=$bp_count00915+$others2156;
?>
<?php //total1
        
 $date = date('Y');
    $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '10' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count00916 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '10'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others157= mysqli_num_rows($res);
   $bp_count916=$bp_count00916+$others157;
?>

<!--November-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001001 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others158= mysqli_num_rows($res);
   $bp_count001=$bp_count00101+$others158;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001002 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others159= mysqli_num_rows($res);
   $bp_count002=$bp_count001002+$others159;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001003 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others160= mysqli_num_rows($res);
   $bp_count003=$bp_count001003+$others160;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001004 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others161= mysqli_num_rows($res);
   $bp_count004=$bp_count001004+$others161;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001005 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others162= mysqli_num_rows($res);
   $bp_count005=$bp_count001005+$others162;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001006 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others163= mysqli_num_rows($res);
   $bp_count006=$bp_count001006+$others163;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001007 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others164= mysqli_num_rows($res);
   $bp_count007=$bp_count001007+$others164;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001008 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others165= mysqli_num_rows($res);
   $bp_count008=$bp_count001008+$others165;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001009 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others166 =mysqli_num_rows($res);
    $bp_count009=$bp_count001009+$others166;
?>
<?php //cars-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001010 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others167 =mysqli_num_rows($res);
    $bp_count010=$bp_count001010+$others167;
?>
<?php //ctet-m
        
 $date = date('Y');
    $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001011 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others168 =mysqli_num_rows($res);
    $bp_count011=$bp_count001011+$others168;
?>
<?php //ctet-d
        
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001012 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others169 =mysqli_num_rows($res);
    $bp_count012=$bp_count001012+$others169;
?>
<?php //faculty
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001013 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others170= mysqli_num_rows($res);
    $bp_count013=$bp_count001013+$others170;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001014 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others171= mysqli_num_rows($res);
    $bp_count014=$bp_count001014+$others171;
?>
<?php //ext
        
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001015 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others2171= mysqli_num_rows($res);
    $bp_count015=$bp_count001015+$others2171;
?>
<?php //total1
        
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '11' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001016 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '11'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others172= mysqli_num_rows($res);
   $bp_count016=$bp_count001016+$others172;
?>

<!--December-->
<?php //bsa
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000201 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others173= mysqli_num_rows($res);
   $bp_count0201=$bp_count000201+$others173;
?>
<?php //btvte
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000202 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others174= mysqli_num_rows($res);
   $bp_count0202=$bp_count000202+$others174;
?>
<?php //bece
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000203 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others175= mysqli_num_rows($res);
   $bp_count0203=$bp_count000203+$others175;
?>
<?php //bsned
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000204 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others176= mysqli_num_rows($res);
   $bp_count0204=$bp_count000204+$others176;
?>
<?php //beed
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000205 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others177= mysqli_num_rows($res);
   $bp_count0205=$bp_count000205+$others177;
?>
<?php //bsabe
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000206 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others178= mysqli_num_rows($res);
   $bp_count0206=$bp_count000206+$others178;
?>
<?php //bsf
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000207 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others179= mysqli_num_rows($res);
   $bp_count0207=$bp_count000207+$others179;
?>
<?php //bsit
        
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000208 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others180= mysqli_num_rows($res);
   $bp_count0208=$bp_count000208+$others180;
?>
<?php //cars-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000209 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others181 =mysqli_num_rows($res);
    $bp_count0209=$bp_count000209+$others181;
?>
<?php //cars-d
        
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000210 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others182 =mysqli_num_rows($res);
    $bp_count0210=$bp_count000210+$others182;
?>
<?php //ctet-m
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000211 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others183 =mysqli_num_rows($res);
    $bp_count0211=$bp_count000211+$others183;
?>
<?php //ctet-d
        
 $date = date('Y');
   $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000212 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others184 =mysqli_num_rows($res);
    $bp_count0212=$bp_count000212+$others184;
?>
<?php //faculty
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000213 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others185= mysqli_num_rows($res);
    $bp_count0213=$bp_count000213+$others185;
?>
<?php //Staff
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000214 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others186= mysqli_num_rows($res);
    $bp_count0214=$bp_count000214+$others186;
?>
<?php //ext
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000215 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND  EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others2186= mysqli_num_rows($res);
    $bp_count0215=$bp_count000215+$others2186;
?>
<?php //total1
        
 $date = date('Y');
  $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '12' AND consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count000216 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(MONTH FROM medical_other_services_log.date_avail) = '12'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $others188= mysqli_num_rows($res);
   $bp_count0216=$bp_count000216+$others188;
?>

<?php //total1-1
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total001 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss01= mysqli_num_rows($res);
   $total01=$total001+$otherss01;
   
?>
<?php //total1-2
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total002 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss02= mysqli_num_rows($res);
   $total02=$total002+$otherss02;
   
?>
<?php //total1-3
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total003 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss03= mysqli_num_rows($res);
   $total03=$total003+$otherss03;
   
?>
<?php //total1-4
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total004 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss04= mysqli_num_rows($res);
   $total04=$total004+$otherss04;
   
?>

<?php //total1-5
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total005 = mysqli_num_rows($res);
   
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss05= mysqli_num_rows($res);
   $total05=$total005+$otherss05;
   
?>
<?php //total1-6
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total006 = mysqli_num_rows($res);
     $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss06= mysqli_num_rows($res);
   $total06=$total006+$otherss06;
?>
<?php //total1-7
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total007 = mysqli_num_rows($res);
   
   $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss07= mysqli_num_rows($res);
   $total07=$total007+$otherss07;
   
?>
<?php //total1-8
        
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='03'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total008 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
  WHERE coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss08= mysqli_num_rows($res);
   $total08=$total008+$otherss08;
   
?>
<?php //total1-9
        
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total009 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss09 =mysqli_num_rows($res);
    $total09=$total009+$otherss09;
   
   
?>

<?php //total1-10
        
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total010 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CARS' AND degree='Doctorate'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss10 =mysqli_num_rows($res);
    $total10=$total010+$otherss10;
   
?>
<?php //total1-11
        
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CTET' AND degree='Masteral' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total011 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Masteral'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss11 =mysqli_num_rows($res);
    $total11=$total011+$otherss11;
   
?>
<?php //total1-12
        
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CTET' AND degree='Doctorate' AND consultation.consultation_type='03' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total012 = mysqli_num_rows($res);
   
    $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE college='CTET' AND degree='Doctorate'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss12 =mysqli_num_rows($res);
    $total12=$total012+$otherss12;
   
?>
<?php //total1-13
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE consultation.consultation_type='03'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total013 = mysqli_num_rows($res);
   
    $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss13= mysqli_num_rows($res);
    $total13=$total013+$otherss13;
?>
<?php //Staff-14
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE  consultation.consultation_type='03'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total013 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss14= mysqli_num_rows($res);
    $total14=$total013+$otherss14;
?>

<?php //ext-15
        
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username 
WHERE  consultation.consultation_type='03'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total015 = mysqli_num_rows($res);
   
   $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss15= mysqli_num_rows($res);
    $total15=$total015+$otherss15;
?>
<?php //total1-16
        
 $date = date('Y');
  $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE consultation_type='03' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total016 = mysqli_num_rows($res);
   
   $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $otherss16= mysqli_num_rows($res);
   $total16=$total016+$otherss16;
?>
<!--medical services-->

<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='1' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BTVTE'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='1' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='1' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other10= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='1'AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other11= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='1'AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other12= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='1' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='1' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='1' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='1' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16= mysqli_num_rows($res);
?>

<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='2' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other111= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other112= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other113= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other114= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other115= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other116= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other117= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other118= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='2' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other119 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='2' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1110= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='2'AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1111= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='2'AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1112= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='2' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1113= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='2' AND usertype='Staff'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1114= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='2' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1115= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='2' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1116= mysqli_num_rows($res);
?>

<!--refer to physician-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='3' AND coursetitle='BSA'";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other211= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other212= mysqli_num_rows($res);
?>
<?php //bece
         $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other213= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BSNED'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other214= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BEED'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other215= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other216= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other217= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other218= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='3' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other219 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='3' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2210= mysqli_num_rows($res);
?>

<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='3' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2211= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='3' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2212= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='3' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2213= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='3' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2214= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='3' AND usertype='Ext'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2215= mysqli_num_rows($res);
?>
<?php //total
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='3'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other2216= mysqli_num_rows($res);
?>
<!--refer to hospital-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='4' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other311= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other312= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other313= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other314= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BEED'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other315= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other316= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other317= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other318= mysqli_num_rows($res);
?>

<?php //cars-m
$date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='4' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other319 =mysqli_num_rows($res);
?>
<?php //cars-d
$date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='4' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3310= mysqli_num_rows($res);
?>
<?php //ctet-m
$date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='4'AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3311= mysqli_num_rows($res);
?>
<?php //ctet-d
$date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='4'AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3312= mysqli_num_rows($res);
?>
<?php //faculty
$date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='4' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3313= mysqli_num_rows($res);
?>
<?php //staff
$date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='4' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3314= mysqli_num_rows($res);
?>
<?php //ext
$date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='4' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3315= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='4'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other3316= mysqli_num_rows($res);
?>
<!--refer to laboratory-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='5' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other411= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other412= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other413= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other414= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other415= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other416= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other417= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other418= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='5' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other419 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='5' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4410= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='5'AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4411= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='5'AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4412= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='5' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4413= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='5' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4414= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='5' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4415= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='5' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other4416= mysqli_num_rows($res);
?>
<!--refer to Dentist-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='6' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other511= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other512= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other513= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other514= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other515= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other516= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other517= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other518= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='6' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other519 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='6' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5510= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='6'AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5511= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='6'AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5512= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='6' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5513= mysqli_num_rows($res);
?>
<?php //staff
$date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='6' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5514= mysqli_num_rows($res);
?>
<?php //ext
$date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='6' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5515= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='6' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other5516= mysqli_num_rows($res);
?>
<!--refer to Dressing-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='7' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other611= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other612= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BECE'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other613= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BSNED'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other614= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BEED'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other615= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BSABE'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other616= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BSF'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other617= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND coursetitle='BSIT'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other618= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='7' AND college='CARS' AND degree='Masteral'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other619 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='7' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6610= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='7'AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6611= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='7' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6612= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='7' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6613= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='7' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6614= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='7' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6615= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='7' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other6616= mysqli_num_rows($res);
?>


<!--refer to warm/cold compress-->
<?php //bsa
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='8' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other711= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other712= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other713= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other714= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other715= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other716= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other717= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other718= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='8' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other719 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='8' AND college='CARS' AND degree='Doctorate'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7710= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='8' AND college='CTET' AND degree='Masteral'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7711= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='8' AND college='CTET' AND degree='Doctorate'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7712= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='8' AND usertype='Faculty'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7713= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='8' AND usertype='Staff'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7714= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='8' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7715= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='8' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other7716= mysqli_num_rows($res);
?>

<!--Immunization-->
<?php //bsa
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='9' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other811= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other812= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other813= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other814= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other815= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other816= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BSF'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other817= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND coursetitle='BSIT'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other818= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='8' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other819 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='9' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8810= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='9' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8811= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='9' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8812= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='9' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8813= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='9' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8814= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='9' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8815= mysqli_num_rows($res);
?>
<?php //total
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='9' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date ";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other8816= mysqli_num_rows($res);
?>
<!--Med cert-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='10' AND coursetitle='BSA'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other911= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other912= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other913= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other914= mysqli_num_rows($res);
?>
<?php //beed
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other915= mysqli_num_rows($res);
?>
<?php //bsabe
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other916= mysqli_num_rows($res);
?>
<?php //bsf
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other917= mysqli_num_rows($res);
?>
<?php //bsit
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other918= mysqli_num_rows($res);
?>

<?php //cars-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='10' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other919 =mysqli_num_rows($res);
?>
<?php //cars-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='10' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9910= mysqli_num_rows($res);
?>
<?php //ctet-m
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='10' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9911= mysqli_num_rows($res);
?>
<?php //ctet-d
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='10' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9912= mysqli_num_rows($res);
?>
<?php //faculty
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='10' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9913= mysqli_num_rows($res);
?>
<?php //staff
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='10' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9914= mysqli_num_rows($res);
?>
<?php //ext
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='10' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9915= mysqli_num_rows($res);
?>
<?php //total
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='10' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other9916= mysqli_num_rows($res);
?>

<!--Nebulization-->
<?php //bsa
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='11' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0011= mysqli_num_rows($res);
?>
<?php //btvte
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0012= mysqli_num_rows($res);
?>
<?php //bece
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0013= mysqli_num_rows($res);
?>
<?php //bsned
        
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0014= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0015= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0016= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0017= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND coursetitle='BSIT'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0018= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='11' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0019 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='11' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0910= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='11' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0911= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='11' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0912= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='11' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0913= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='11' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0914= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='11' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0915= mysqli_num_rows($res);
?>
<?php //total
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='11' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other0916= mysqli_num_rows($res);
?>
<!--Suture Removal-->
<?php //bsa
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='12' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1100= mysqli_num_rows($res);
?>
<?php //btvte     
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1200= mysqli_num_rows($res);
?>
<?php //bece      
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1300= mysqli_num_rows($res);
?>
<?php //bsned   
 $date = date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1400= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1500= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1600= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1700= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1800= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='12' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other1900 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='12' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99100= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='12' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99110= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='12' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99120= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='12' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99130= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='12' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99140= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='12' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99150= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='12' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other99160= mysqli_num_rows($res);
?>

<!--Rest at Recovery Room-->
<?php //bsa
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='13' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other133100= mysqli_num_rows($res);
?>
<?php //btvte
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13200= mysqli_num_rows($res);
?>
<?php //bece
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13300= mysqli_num_rows($res);
?>
<?php //bsned
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13400= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13500= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13600= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BSF'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13700= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13800= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='13' AND college='CARS' AND degree='Masteral' ";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13900 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='13' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13100= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='13' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13110= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='13' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13120= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='13' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13130= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='13' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13140= mysqli_num_rows($res);
?>
<?php //ext
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='13' AND usertype='Ext'";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13150= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='13' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other13160= mysqli_num_rows($res);
?>

<!--Pregnancy Test-->
<?php //bsa
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='14' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14100= mysqli_num_rows($res);
?>
<?php //btvte
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14200= mysqli_num_rows($res);
?>
<?php //bece
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14300= mysqli_num_rows($res);
?>
<?php //bsned
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14400= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14500= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14600= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14700= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14800= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='14' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14900 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='14' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other141000= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='14' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14110= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='14' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14120= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='14' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14130= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='14' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14140= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='14' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14150= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='14' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other14160= mysqli_num_rows($res);
?>
<!--Removal of Foreign Body-->
<?php //bsa
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='15' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15100= mysqli_num_rows($res);
?>
<?php //btvte
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15200= mysqli_num_rows($res);
?>
<?php //bece
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15300= mysqli_num_rows($res);
?>
<?php //bsned
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15400= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15500= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15600= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15700= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15800= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='15' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15900 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='15' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other151000= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='15' AND college='CTET' AND degree='Masteral'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15110= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='15' AND college='CTET' AND degree='Doctorate'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15120= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='15' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15130= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='15' AND usertype='Staff'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15140= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='15' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15150= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='15' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other15160= mysqli_num_rows($res);
?>

<!--IM Injection-->
<?php //bsa
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='16' AND coursetitle='BSA'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16100= mysqli_num_rows($res);
?>
<?php //btvte
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BTVTE'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16200= mysqli_num_rows($res);
?>
<?php //bece
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16300= mysqli_num_rows($res);
?>
<?php //bsned
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16400= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16500= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16600= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16700= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16800= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='16' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16900 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='16' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other161000= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='16' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16110= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='16' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16120= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='16' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16130= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='16' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16140= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='16' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16150= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='16' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other16160= mysqli_num_rows($res);
?>

<!--Elastic Bandage-->
<?php //bsa
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  mservice_id='17' AND coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17100= mysqli_num_rows($res);
?>
<?php //btvte
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17200= mysqli_num_rows($res);
?>
<?php //bece
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BECE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17300= mysqli_num_rows($res);
?>
<?php //bsned
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17400= mysqli_num_rows($res);
?>
<?php //beed
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17500= mysqli_num_rows($res);
?>
<?php //bsabe
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17600= mysqli_num_rows($res);
?>
<?php //bsf
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BSF' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17700= mysqli_num_rows($res);
?>
<?php //bsit
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17800= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE mservice_id='17' AND college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17900 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='17' AND college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other171000= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='17' AND college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17110= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='17' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17120= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='17' AND usertype='Faculty' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17130= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='17' AND usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17140= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE mservice_id='17' AND usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17150= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE mservice_id='17' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $other17160= mysqli_num_rows($res);
?>

<!--Total-->

<?php //bsa-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BSA' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22201= mysqli_num_rows($res);
?>
<?php //BTVTE-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BTVTE'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22202= mysqli_num_rows($res);
?>

<?php //bece-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BECE'  AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22203= mysqli_num_rows($res);
?>
<?php //bsned-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BSNED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22204= mysqli_num_rows($res);
?>

<?php //beed-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BEED' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22205= mysqli_num_rows($res);
?>

<?php //BSABE-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BSABE' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22206= mysqli_num_rows($res);
?>

<?php //bsf-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BSF'";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22207= mysqli_num_rows($res);
?>

<?php //bsit-total
$date=date('Y');
  $sql= "SELECT studentdetails.coursetitle,medical_other_services_log.mservice_id from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id 
WHERE  coursetitle='BSIT' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22208= mysqli_num_rows($res);
?>

<?php //cars-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22209 =mysqli_num_rows($res);
?>
<?php //cars-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id join course on studentdetails.course_id=course.course_id  
WHERE college='CARS' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22210= mysqli_num_rows($res);
?>
<?php //ctet-m
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE college='CTET' AND degree='Masteral' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22211= mysqli_num_rows($res);
?>
<?php //ctet-d
$date=date('Y');
  $sql= "SELECT studentdetails.college,course.degree from medical_other_services_log join studentdetails on medical_other_services_log.id_number=studentdetails.student_id  join course on studentdetails.course_id=course.course_id  
WHERE mservice_id='17' AND college='CTET' AND degree='Doctorate' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22212= mysqli_num_rows($res);
?>
<?php //faculty
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE  usertype='Faculty'AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22213= mysqli_num_rows($res);
?>
<?php //staff
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE  usertype='Staff' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22214= mysqli_num_rows($res);
?>
<?php //ext
$date=date('Y');
  $sql= "SELECT login_credentials.usertype,medical_other_services_log.mservice_id from medical_other_services_log join login_credentials on medical_other_services_log.id_number=login_credentials.username
WHERE usertype='Ext' AND EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22215= mysqli_num_rows($res);
?>
<?php //total
$date=date('Y');
  $sql= "SELECT * from medical_other_services_log 
  WHERE EXTRACT(YEAR FROM medical_other_services_log.date_avail) = $date";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total22216= mysqli_num_rows($res);
?>
