
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count1 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count2 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count3 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count4 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count5 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count6 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count7 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count8 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count9 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count10 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count11 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
  $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count12 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count13 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count14 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '01' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count15 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
      $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE EXTRACT(MONTH FROM date_filed) = '01' AND consultation_type='02' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_total1 = mysqli_num_rows($res);
?>
<!--February-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count101 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count102 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count103 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count104 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count105 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count106 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count107 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count108 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count109 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count110 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count111 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count112 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE consultation.consultation_type='02'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count113 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE consultation.consultation_type='02'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count114 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
  $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE consultation.consultation_type='02'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count115 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '02' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count116 = mysqli_num_rows($res);
?>
<!--March-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count201 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count202 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count203 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count204 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count205 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count206 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count207 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count208 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count209 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count210 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count211 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count212 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count213 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count214 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count215 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '03' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count216 = mysqli_num_rows($res);
?>

<!--April-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count301 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count302 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count303 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count304 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count305 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count306 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count307 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count308 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count309 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count310 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count311 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count312 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count313 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count314 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count315 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '04' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count316 = mysqli_num_rows($res);
?>

<!--May-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count401 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count402 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count403 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count404 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count405 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count406 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count407 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count408 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count409 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count410 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count411 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count412 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count413 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count414 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count415 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '05' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count416 = mysqli_num_rows($res);
?>

<!--June-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count501 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count502 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count503 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count504 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count505 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count506 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count507 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count508 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count509 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count510 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count511 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count512 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count513 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count514 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count515 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '06' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count516 = mysqli_num_rows($res);
?>

<!--July-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count601 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count602 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count603 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count604 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count605 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count606 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count607 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count608 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count609 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count610 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count611 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count612 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count613 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count614 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count615 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '07' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count616 = mysqli_num_rows($res);
?>


<!--August-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count701 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count702 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count703 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count704 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count705 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count706 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count707 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count708 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count709 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count710 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count711 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count712 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count713 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count714 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count715 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '08' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count716 = mysqli_num_rows($res);
?>

<!--September-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count801 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count802 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count803 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count804 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count805 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');

   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count806 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count807 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count808 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count809 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count810 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count811 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count812 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count813 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count814 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count815 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '09' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count816 = mysqli_num_rows($res);
?>
<!--October-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count901 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count902 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count903 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count904 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count905 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count906 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count907 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count908 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count909 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count910 = mysqli_num_rows($res);
?>
<?php //ctet-m

				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count911 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count912 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count913 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count914 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count915 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '10' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count916 = mysqli_num_rows($res);
?>

<!--November-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count001 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count002 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count003 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count004 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count005 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count006 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count007 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count008 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count009 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count010 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count011 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count012 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count013 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count014 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02'  AND patient_type='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count015 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '11' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count016 = mysqli_num_rows($res);
?>

<!--November-->
<?php //bsa
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0201 = mysqli_num_rows($res);
?>
<?php //btvte
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0202 = mysqli_num_rows($res);
?>
<?php //bece
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0203 = mysqli_num_rows($res);
?>
<?php //bsned
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0204 = mysqli_num_rows($res);
?>
<?php //beed
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0205 = mysqli_num_rows($res);
?>
<?php //bsabe
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0206 = mysqli_num_rows($res);
?>
<?php //bsf
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0207 = mysqli_num_rows($res);
?>
<?php //bsit
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0208 = mysqli_num_rows($res);
?>
<?php //cars-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND patient_type='CARS-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0209 = mysqli_num_rows($res);
?>
<?php //cars-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND patient_type='CARS-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0210 = mysqli_num_rows($res);
?>
<?php //ctet-m
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND patient_type='CTET-M' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0211 = mysqli_num_rows($res);
?>
<?php //ctet-d
				
 $date = date('Y');
   $sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02'  AND patient_type='CTET-D' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0212 = mysqli_num_rows($res);
?>
<?php //faculty
				
 $date = date('Y');
     $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE  consultation.consultation_type='02'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0213 = mysqli_num_rows($res);
?>
<?php //Staff
				
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE  consultation.consultation_type='02'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0214 = mysqli_num_rows($res);
?>
<?php //ext
				
 $date = date('Y');
     $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE  consultation.consultation_type='02'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0215 = mysqli_num_rows($res);
?>
<?php //total1
				
 $date = date('Y');
   $sql= "SELECT EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE EXTRACT(MONTH FROM consultation.date_filed) = '12' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bp_count0216 = mysqli_num_rows($res);
?>

<?php //total1-1
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BSA' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total001 = mysqli_num_rows($res);
   
   
?>
<?php //total1-2
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BTVTE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total002 = mysqli_num_rows($res);
   
   
?>
<?php //total1-3
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BECE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total003 = mysqli_num_rows($res);
   
   
?>
<?php //total1-4
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BSNED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total004 = mysqli_num_rows($res);
   
   
?>
<?php //total1-5
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BEED' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total005 = mysqli_num_rows($res);
   
   
?>
<?php //total1-6
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BSABE' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total006 = mysqli_num_rows($res);
   
   
?>
<?php //total1-7
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BSF' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total007 = mysqli_num_rows($res);
   
   
?>
<?php //total1-8
				
 $date = date('Y');
$sql= "SELECT studentdetails.coursetitle,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id 
WHERE consultation.consultation_type='02'  AND coursetitle='BSIT' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total008 = mysqli_num_rows($res);
   
   
?>
<?php //total1-9
				
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Masteral' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total009 = mysqli_num_rows($res);
   
   
?>
<?php //total1-10
				
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CARS' AND degree='Doctorate' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total010 = mysqli_num_rows($res);
   
   
?>
<?php //total1-11
				
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CTET' AND degree='Masteral' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total011 = mysqli_num_rows($res);
   
   
?>
<?php //total1-12
				
 $date = date('Y');
 $sql= "SELECT studentdetails.college,course.degree,EXTRACT(month FROM consultation.date_filed) from consultation join studentdetails on consultation.patient_id=studentdetails.student_id join course on studentdetails.course_id=course.course_id 
WHERE  college='CTET' AND degree='Doctorate' AND consultation.consultation_type='02' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total012 = mysqli_num_rows($res);
   
   
?>

<?php //faculty
				
 $date = date('Y');
     $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE  consultation.consultation_type='02'  AND usertype='Faculty' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total013 = mysqli_num_rows($res);
?>
<?php //staff
				
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE  consultation.consultation_type='02'  AND usertype='Staff' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total014 = mysqli_num_rows($res);
?>

<?php //staff
				
 $date = date('Y');
    $sql= "SELECT login_credentials.usertype,EXTRACT(month FROM consultation.date_filed) from consultation join login_credentials on consultation.patient_id=login_credentials.username
WHERE  consultation.consultation_type='02'  AND usertype='Ext' AND EXTRACT(YEAR FROM consultation.date_filed) = $date
ORDER BY EXTRACT(month FROM consultation.date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total015 = mysqli_num_rows($res);
?>

<?php //total
$date=date('Y');
   $sql= "SELECT EXTRACT(month FROM date_filed),consultation_type from consultation 
WHERE consultation_type='02' AND EXTRACT(YEAR FROM date_filed) = $date
ORDER BY EXTRACT(month FROM date_filed);";
  $res = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $total016 = mysqli_num_rows($res);
?>
