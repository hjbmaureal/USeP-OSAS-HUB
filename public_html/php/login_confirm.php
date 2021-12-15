<?php
session_start();
include("../conn.php");
include 'logactivity.php';

if(isset($_POST['submit'])){

     $uid = $_POST['uname'];
     $password = $_POST['pword'];


     $check_query="SELECT * from login_credentials where username='$uid'";
     $resultPass= mysqli_query($conn,$check_query);
     $row=mysqli_fetch_assoc($resultPass);
        $data = array();

    $hash= $row['password'];



   /* $superadmin= '1234';
    $hashed_pass = password_hash($superadmin, PASSWORD_DEFAULT);*/
   /* $sql = "call spLogIn(?,?)";
    $stmt = mysqli_stmt_init($conn);*/
                
    if (password_verify($password,$hash)){
       
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
                if ($_SESSION['usertype']=='Alumni'){
                     echo '<script type="text/javascript">'; 
                     echo 'window.location= "../users/Alumni/";';
                     echo '</script>';
                }
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
                    if($_SESSION['position']=='Guidance Counselor'){
                            $access_level = $row['access_level'];
                        if ($_SESSION['office'] =='Guidance' && $access_level == 1){
                             echo '<script type="text/javascript">'; 
                             echo 'window.location= "../users/Guidance/";';
                             echo '</script>';
                        } 
                    }else{
                         $activity = 'Incorrect Password.';
                        $page = '/osaweb/Log-in.html';
                        log_activity($activity,$page);
                         echo '<script>alert(\"Incorrect Password!\")</script>"';   

                         echo '<script type="text/javascript">'; 
                         echo 'window.location= "../index.php?res=Incorrect";';
                         echo '</script>';
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
            
        
    } else {
         $_SESSION['id'] = $row['username'];
                $_SESSION['fullname'] = $row['name'];
                 $_SESSION['usertype'] = $row['usertype'];

                $activity = 'Incorrect Password.';
                $page = 'USeP-OSAS-HUB/public_html/index.php';
                log_activity($activity,$page);
                 
                 if(isset($_SESSION['id'])){
                        unset($_SESSION['id']);
                    }

                    if(isset($_SESSION['usertype'])){
                        unset($_SESSION['usertype']);
                    }

                    if(isset($_SESSION['offfice'])){
                        unset($_SESSION['office']);
                    }
                      session_destroy();
                       echo '<script type="text/javascript">'; 
                 echo 'window.location= "../index.php?res=Incorrect";';
                 echo '</script>';
                
       

    }
}