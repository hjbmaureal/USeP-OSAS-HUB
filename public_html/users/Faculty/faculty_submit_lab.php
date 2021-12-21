<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/upstyle.css">
    <title></title>
</head>
<body>
<?php
session_start();
include("conn.php"); 
$p_id=$_SESSION['id'];
$id = $_POST['id'];

if(isset($_POST['submit'])) {  
    $sql = mysqli_query($conn, "SELECT CONCAT(first_name,' ',middle_name,' ',last_name) as fullname, type from patient_list where patient_id = '$p_id'");
    while($res = mysqli_fetch_array($sql)) { 
    $name = $res['fullname'];
    }
    
    $sql2 = mysqli_query($conn, "SELECT * from staff where type = 'Staff' AND position='Nurse' AND account_status='Active'");
    while($res = mysqli_fetch_array($sql2)) { 
    $staff_id = $res['staff_id'];
    }
$message = 'Submitted a new laboratory result';

$cbc=PATHINFO($_FILES["cbc"]["name"]?? null);
$plate=PATHINFO($_FILES["plate"]["name"]?? null);
$hema=PATHINFO($_FILES["hema"]["name"]?? null);
$hemo=PATHINFO($_FILES["hemo"]["name"]?? null);
$urine=PATHINFO($_FILES["urine"]["name"]?? null);
$fecal=PATHINFO($_FILES["fecal"]["name"]?? null);
$fbs=PATHINFO($_FILES["fbs"]["name"]?? null);
$sua=PATHINFO($_FILES["sua"]["name"]?? null);
$creat=PATHINFO($_FILES["creat"]["name"]?? null);
$lip=PATHINFO($_FILES["lip"]["name"]?? null);
$sgot=PATHINFO($_FILES["sgot"]["name"]?? null);
$sgpt=PATHINFO($_FILES["sgpt"]["name"]?? null);
$others=PATHINFO($_FILES["others"]["name"]?? null);



         if(empty($cbc['filename'])){
        $cbc_loc='';
    }
    if(!empty($cbc['filename'])){
        $newcbc=$cbc['filename'] ."_". time() . "." . $cbc['extension'];
        move_uploaded_file($_FILES["cbc"]["tmp_name"],"../Clinic/labresult/" . $newcbc);
        $cbc_loc="labresult/" . $newcbc;

    }



        if(empty($plate['filename'])){
        $plate_loc='';
    }
    if(!empty($plate['filename'])){
       $newplate=$plate['filename'] ."_". time() . "." . $plate['extension'];
        move_uploaded_file($_FILES["plate"]["tmp_name"],"../Clinic/labresult/" . $newplate);
        $plate_loc="labresult/" . $newplate;
    }


        if(empty($hema['filename'])){
        $hema_loc='';
    }
    if(!empty($hema['filename'])){
        $newhema=$hema['filename'] ."_". time() . "." . $hema['extension'];
        move_uploaded_file($_FILES["hema"]["tmp_name"],"../Clinic/labresult/" . $newhema);
        $hema_loc="labresult/" . $newhema;
    }


        if(empty($hemo['filename'])){
        $hemo_loc='';
    }
    if(!empty($hemo['filename'])){
        $newhemo=$hemo['filename'] ."_". time() . "." . $hemo['extension'];
        move_uploaded_file($_FILES["hemo"]["tmp_name"],"../Clinic/labresult/" . $newhemo);
        $hemo_loc="labresult/" . $newhemo;
    }


        if(empty($urine['filename'])){
        $urine_loc='';
    }
    if(!empty($urine['filename'])){
        $newurine=$urine['filename'] ."_". time() . "." . $urine['extension'];
        move_uploaded_file($_FILES["urine"]["tmp_name"],"../Clinic/labresult/" . $newurine);
        $urine_loc="labresult/" . $newurine;
    }

        if(empty($fecal['filename'])){
        $fecal_loc='';
    }
    if(!empty($fecal['filename'])){
        $newfecal=$fecal['filename'] ."_". time() . "." . $fecal['extension'];
        move_uploaded_file($_FILES["fecal"]["tmp_name"],"../Clinic/labresult/" . $newfecal);
        $fecal_loc="labresult/" . $newfecal;
    }


        if(empty($fbs['filename'])){
        $fbs_loc='';
    }
    if(!empty($fbs['filename'])){
        $newfbs=$fbs['filename'] ."_". time() . "." . $fbs['extension'];
        move_uploaded_file($_FILES["fbs"]["tmp_name"],"../Clinic/labresult/" . $newfbs);
        $fbs_loc="labresult/" . $newfbs;
    }


        if(empty($sua['filename'])){
        $sua_loc='';
    }
    if(!empty($sua['filename'])){
        $newsua=$sua['filename'] ."_". time() . "." . $sua['extension'];
        move_uploaded_file($_FILES["sua"]["tmp_name"],"../Clinic/labresult/" . $newsua);
        $sua_loc="labresult/" . $newsua;
    }

        if(empty($creat['filename'])){
        $creat_loc='';
    }
    if(!empty($creat['filename'])){
        $newcreat=$creat['filename'] ."_". time() . "." . $creat['extension'];
        move_uploaded_file($_FILES["creat"]["tmp_name"],"../Clinic/labresult/" . $newcreat);
        $creat_loc="labresult/" . $newcreat;
    }


        if(empty($lip['filename'])){
        $lip_loc='';
    }
    if(!empty($lip['filename'])){
        $newlip=$lip['filename'] ."_". time() . "." . $lip['extension'];
        move_uploaded_file($_FILES["lip"]["tmp_name"],"../Clinic/labresult/" . $newlip);
        $lip_loc="labresult/" . $newlip;
    }

        if(empty($sgot['filename'])){
        $sgpt_locg='';
    }
    if(!empty($sgot['filename'])){
        $newsgot=$sgot['filename'] ."_". time() . "." . $sgot['extension'];
        move_uploaded_file($_FILES["sgot"]["tmp_name"],"../Clinic/labresult/" . $newsgot);
        $sgpt_locg="labresult/" . $newsgot;
    }

        if(empty($sgpt['filename'])){
        $sgpt_loc='';
    }
    if(!empty($sgpt['filename'])){
        $newsgpt=$sgpt['filename'] ."_". time() . "." . $sgpt['extension'];
        move_uploaded_file($_FILES["sgpt"]["tmp_name"],"../Clinic/labresult/" . $newsgpt);
        $sgpt_loc="labresult/" . $newsgpt;
    }

    if(empty($others['filename'])){
        $others_loc='';
    }
    if(!empty($others['filename'])){
        $newothers=$others['filename'] ."_". time() . "." . $others['extension'];
        move_uploaded_file($_FILES["others"]["tmp_name"],"../Clinic/labresult/" . $newothers);
        $others_loc="labresult/" . $newothers;
    }


$query =  "UPDATE clinic_certificate_requests SET cbc_loc='$cbc_loc',platelet_loc='$plate_loc',hema_loc='$hema_loc',hemo_loc='$hemo_loc',urine_loc='$urine_loc',fecal_loc='$fecal_loc',fbs_loc='$fbs_loc',sua_loc='$sua_loc',creat_loc='$creat_loc',lipid_loc='$lip_loc',sgot_loc='$sgpt_locg',sgpt_loc='$sgpt_loc',others_loc='$others_loc' WHERE request_id=$id";



if ($conn->query($query) === TRUE) {
    $admin_check_query="SELECT * from staffdetails where type='Coordinator' and office_name='Clinic' LIMIT 1";
$result2=mysqli_query($conn,$admin_check_query);
$request=mysqli_fetch_assoc($result2);

$admin_id= $request['staff_id'];

$staff_name= $_SESSION['fullname'];

$notif_body = "".$staff_name." submitted the result/s for Required Laboratory test/s.";
$notification=mysqli_query($conn,"insert into `notif` (user_id, message_body, time, link, message_status, office_id) values ('$admin_id', '$notif_body',now(),'../users/Clinic/Admin-Request.php', 'Delivered', '3')");
  echo '<script>
                swal({
                title: "Lab Result submitted successfully!",
                text: "Server Request Successful!",
                type:"success",
                icon: "success",
                button: false,
                timer:1000,
                closeOnClickOutside: false,
                closeOnEsc: false,
                }).then(function() {
              window.location = "RequestMedCert.php";
            })
         </script>';
} else {
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

?>
</body>
</html>