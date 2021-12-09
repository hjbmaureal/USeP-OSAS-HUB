<?php
session_start();
include("../conn.php");
include 'logactivity.php';

if(isset($_POST['submit'])){

     $uid = $_POST['uname'];
     $password = $_POST['pword'];
        $data = array();


    $sql = "call spLogIn(?,?)";
    $stmt = mysqli_stmt_init($conn);
                
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed!";
    } else {
        mysqli_stmt_bind_param($stmt,"ss", $uid,$password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){ 

                if (empty($row['pic'])) $row['pic'] = file_get_contents("../images/logo.png");
                if (empty($row['e_signature'])) $row['e_signature'] = file_get_contents("../images/e-sig.png");
                $data[] = $row;
                $pic = base64_encode($row['e_signature']);
               // $photo = base64_encode($row['userpic']);
                $_SESSION['id'] = $row['username'];
                $_SESSION['fullname'] = $row['name'];
                $_SESSION['course'] = isset($row['course']) ? $row['course'] : '';
                $_SESSION['college'] = isset($row['college']) ? $row['college'] : '';
                $_SESSION['usertype'] = $row['usertype'];
                $_SESSION['office'] = $row['staff_office'];
                
                $_SESSION['photo'] = base64_encode ($row['pic']);
                $_SESSION['user_signature'] = base64_encode ($row['e_signature']);
                $_SESSION['access_level'] = $row['access_level'];
                $access_level = $row['access_level'];
                $_SESSION['org_id'] = $row['student_org'];
                $_SESSION['position'] = $row['staff_position'];
                $activity = 'Successfully Logged in.';
                $page = 'public_html/index.php';   
                log_activity($activity,$page);
                if($_SESSION['id']=='superadmin'){         
                    echo '<script type="text/javascript">'; 
                     echo 'location.href= "../users/Superadmin/";';
                     echo '</script>';
                }
                if ($_SESSION['usertype']=='Student'){
                    $_SESSION['sl_status'] = $row['sl_status'];
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Student/";';
                     echo '</script>';
                }
                if ($_SESSION['usertype']=='Alumni'){
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Alumni/";';
                     echo '</script>';
                }
                if ($_SESSION['usertype']=='Coordinator'){
                    $access_level = $row['access_level'];
                    if ($_SESSION['office'] == 'OSAS' && $access_level == 1){
                         echo '<script type="text/javascript">'; 
                         echo 'window.location="../users/Osas/";';
                         echo '</script>';
                    }
                }  
                if ($_SESSION['usertype']=='Coordinator'){
                    $access_level = $row['access_level'];
                    if ($_SESSION['office'] =='Scholarship' && $access_level == 1){
                         echo '<script type="text/javascript">'; 
                         echo 'window.location= "../users/Scholarship/";';
                         echo '</script>';
                    }

                }
                 if ($_SESSION['usertype']=='Coordinator'){
                    $access_level = $row['access_level'];
                    if ($_SESSION['office'] =='Clinic' && $access_level == 1){
                         echo '<script type="text/javascript">'; 
                         echo 'window.location= "../users/Clinic/Admin-Dashboard.php";';
                         echo '</script>';
                    } 
                }
                if ($_SESSION['usertype']=='Coordinator'){
                    if($_SESSION['position']=='Guidance Councelor'){
                            $access_level = $row['access_level'];
                        if ($_SESSION['office'] =='Guidance' && $access_level == 1){
                             echo '<script type="text/javascript">'; 
                             echo 'window.location= "../users/Guidance/";';
                             echo '</script>';
                        } 
                    }
                    
                }
                if ($_SESSION['usertype']=='Faculty' && $access_level = 2){
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Faculty/";';
                     echo '</script>';
                }
                if ($_SESSION['usertype']=='Staff' && $access_level = 2){
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Faculty/";';
                     echo '</script>';
                }
                if ($_SESSION['usertype']=='Faculty Head' && $access_level = 1){
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Faculty/";';
                     echo '</script>';
                }
                if ($_SESSION['usertype']=='Medical Personnel' && $access_level = 2){
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Faculty/";';
                     echo '</script>';
                }
            }
        
        } else {

                $activity = 'Incorrect Password.';
                $page = '/osaweb/Log-in.html';
                log_activity($activity,$page);
                 echo '<script>alert(\"Incorrect Password!\")</script>"';   

                 echo '<script type="text/javascript">'; 
                 echo 'window.location= "../index.php";';
                 echo '</script>';
            }

    }

}