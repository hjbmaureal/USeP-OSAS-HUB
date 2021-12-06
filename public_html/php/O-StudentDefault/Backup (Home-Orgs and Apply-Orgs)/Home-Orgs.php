<?php
session_start();
include("conn.php");

if(strlen($_SESSION['id'])==0)
  { 
header('location:../../index.php');
}
else{ 
  $id = $_SESSION['id'];
  $count = 0;
  $job_count = 0;
  $query=mysqli_query($conn,"SELECT count(*) as cnt from notif where user_id='$id' and message_status='Delivered'");
  while($row=mysqli_fetch_array($query)){$count = $row['cnt'];}

$query2=mysqli_query($conn,"SELECT count(*) as cnt from job_hiring_announcement");
  while($row=mysqli_fetch_array($query2)){ $job_count = ($row['cnt']==0) ? '' : $row['cnt'] ;}

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
      <link rel="icon" href="../../images/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../../css/main_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_main.css">
      <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">

      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->

  <link rel="stylesheet" href="../../css/owl.carousel.min.css">
<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
  <style type="text/css">
    .img{
      width: 130px;
      height: 130px;
    }
  </style>
        
      <header class="app-header">
    
   
      </header>
   

      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../../images/logo.png" width="20%" alt="img">
          <div>
            <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">STUDENT HUB</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item " href="../../users/Student/index.php"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
            <li>
              <a class="app-menu__item" href="../../users/Student/Job-Announcements.php">
                <i class="app-menu__icon fa fa-bullhorn"></i>
                <span class="app-menu__label">Job Hirings</span>
                <span class="text-right"><?php echo $job_count ?></span>
              </a>
          </li>
          <li class="p-2 sidebar-label"><span class="app-menu__label">STUDENT'S AFFAIRS AND SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Discipline Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item " href="../../users/Student/Home-Discipline.php" hidden="">Home</a></li>
              <li><a class="treeview-item" href="../../users/Student/Discipline-Complaints.php">Complaints</a></li>
              <li><a class="treeview-item" href="../../users/Student/Discipline-HistoryComplaints.php">Complaint Records</a></li>
              <li><a class="treeview-item" href="../../users/Student/Discipline-Response.php">Response</a></li>

            </ul>
          </li>

                <?php 
                  if (strlen($_SESSION['org_id'])){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                          <li><a class="treeview-item active" href="Home-Orgs.php">Home</a></li>
                          <li><a class="treeview-item" href="Org-files.php">Organization Files</a></li>
                          <li><a class="treeview-item" href="Accre-files.php">Re-Accreditation Files</a></li>
                          <li><a class="treeview-item" href="Oath-files.php">Oath of Office</a></li>
                        </ul>
                      </li>
            
                    ';
            
            
                  } else {
                    echo '
                         <li><a class="app-menu__item active" href="Home-Orgs.php"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Orgs. Services</span></a></li>
                    ';
                  }
            
            ?>

            <?php 
                  if ($_SESSION['sl_status']=='Hired'){
                    echo '
                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-comments"></i><span class="app-menu__label">Student Labor Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                  <li><a class="treeview-item " href="../../users/Student/Home-Labor.php">Home</a></li>
                                  <li><a class="treeview-item" href="../../users/Student/Labor-DTR.php">DTR</a></li>
                                  <li><a class="treeview-item" href="../../users/Student/Labor-Accomplishments.php">Accomplishment Reports</a></li>
            
            
                                </ul>
                        </li>
             
                    ';
            
            
                  } else {
                    echo '
                          <li><a class="app-menu__item" href="../../users/Student/Home-Labor.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Student Labor Services</span></a></li>
                    ';
                  }
            
            ?>

          <li><a class="app-menu__item" href="ReqGoodMoral_Student.php"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>


          <li class="p-2 sidebar-label"><span class="app-menu__label">GUIDANCE OFFICE SERVICES</span></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-handshake-o"></i><span class="app-menu__label">Guidance Services</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item active" href="Guidance_StudentUI.php">Home</a></li>
              <li><a class="treeview-item" href="Guidance_Student_Counselling.php">Counselling</a></li>
              <li><a class="treeview-item" href="Guidance_Student_GroupGuidance.php">Group Guidance Activities</a></li>
              <li><a class="treeview-item" href="Guidance_Student_Evaluation.php">Evaluation</a></li>
            </ul>
          </li>


            <li class="p-2 sidebar-label"><span class="app-menu__label">SCHOLARSHIP OFFICE SERVICES</span></li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-handshake-o"></i>
                    <span class="app-menu__label">Scholarship Services  </span>
                    <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="student-scholarship-dashboard.php">Home</a></li>
              <li><a class="treeview-item" href="student-scholarship-data-form.php">Scholarship Data Form</a></li>

            </ul>
            </li>



            <li class="p-2 sidebar-label"><span class="app-menu__label">CLINIC OFFICE SERVICES</span></li>
           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-medkit"></i><span class="app-menu__label">Health Services  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Clinic_Home.php">Home</a></li>
              <li><a class="treeview-item" href="Clinic_Privacy_Policy.php">Consultation</a></li>
              <li><a class="treeview-item" href="StudentConsultationHistory.php">Consultation History</a></li>
              <li><a class="treeview-item" href="Prescription.php">Prescription</a></li>
              <li><a class="treeview-item" href="RequestMedCert.php">Request for Medical Certificate</a></li>
              <li><a class="treeview-item" href="RequestMedRecsCert.php">Request for Medical Records Certification</a></li>

            </ul>
          </li>


     

          
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel"><?php 
                 $query = mysqli_query($conn,"SELECT * from student where Student_id ='".$_SESSION['id']."' ");
  $res = mysqli_fetch_array($query);

                echo $res['first_name']; 
                echo'&emsp;';
                echo $res['last_name']; ?></a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>--> 
              <?php
                $sql_get = mysqli_query($conn, "SELECT * FROM remarks_apply WHERE status = 0 and Submitted_by like '%".$_SESSION['id']."%'");
                $count = mysqli_num_rows($sql_get); 
                
              ?> 

   <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class=" fas fa-bell fa-lg mt-2"></i><span class="badge badge-danger" id="count" style="border-radius: 50%; position: relative; top: -10%; left: -10%;"><?php echo $count; ?></span></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have <?php while ($main_res = mysqli_fetch_assoc($sql_get)) { echo $count; } ?> new notifications.</li>
              <div class="app-notification__content">
              
                 <?php
                $sql_get1 = mysqli_query($conn, "SELECT * FROM remarks_apply WHERE status = 0 and Submitted_by like '%".$_SESSION['id']."%'");
                if(mysqli_num_rows($sql_get1)>0){

                    while($result = mysqli_fetch_assoc($sql_get1)){
                      echo '<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa  fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div data-toggle="modal" data-role="exampleModall" id="'.$result['Submitted_by'].'">
                      <p class="app-notification__message">Remarks for submitted file.</p>
                      <p class="app-notification__meta">'.$result['date_apply'].'</p>
                    </div></a></li>';  
                    }

                }
                else{
                    echo '<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p >No Notifications</p>
                      
                    </div></a></li>';
                }
              ?>
               
              </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Prologo Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="user-prologos.html"><i class="fa fa-user fa-lg"></i> Prologo</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

      <!-- Navbar-->
      
         <div class="row">

            <div class="col-md-4">

              <div style="background-color:  #193541;  padding: 12px 10px;">
                          <div class="info" style="color: #FFFFFF;"><center><h5 class="mb-2">HOW TO BE A RECOGNIZED ORGANIZATION</h5></center>
                          </div>
                        </div>
              <div class="tile">  

             <div class="tile-body" style="text-align: center; font-weight: bold;" >STEP 1
              <br>
             Request/Application for Recognition or Re-accreditation
             <br>
             * List of requirements and Format

            </div>
            <br>
             <div class="tile-body"style="text-align: center; font-weight: bold;" >STEP 2
              <br>
              Submit all necessary requirements for checking and evaluation of application      
             </div>
            <br>
             <div class="tile-body"style="text-align: center; font-weight: bold;" >STEP 3
              <br>
             Endorse to Office of Student Affairs and Services (OSAS) for the verification
            </div>
              <br>
            <div class="tile-body"style="text-align: center; font-weight: bold;" >STEP 4
              <br>
             Recognition and Induction of officers
              *Certificate of Recognition
              <br>
              *Oath of Office
            </div>
              <br>
            <button class="btn btn-primary icon-btn center" data-toggle="modal" data-target="#exampleModalLong" style="padding-left: 115px; padding-right: 105px;"> Read More</button>       
            </div>
            </div>

        <div class="col-md-8">
          <div style="background-color:  #193541; text-align: center;  padding:8px 10px; font-weight: bolder; color: white; font-size: 25px;" >Recognized: Govt. Funded  Student Organization</div>
          <div class="tile">
              <div class="owl-carousel owl-theme">
                                <?php
                                         include("conn.php");

                                         $tab = mysqli_query($conn,"SELECT * from govt_funded_org");

                                         
                                           while($res = mysqli_fetch_array($tab))  {         
                                          ?>
                                  <div class="item">
                                    <div class=" card text-center btn btn-light orgbox" data-toggle="modal" data-target="#org-modal" >
                                      <div class="mx-auto">
                                        <img src="../O-StudentDefault/Org_Applications/<?php echo $res['logo'] ?>" class="card-img-top imgbx" alt="...">
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx"><?php echo $res['org_name'] ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php 
                                            }

                                        ?>


                                  
        </div>
</div>

<br>
          <div style="background-color:  #193541; text-align: center; padding:8px 10px; font-weight: bolder; color: white; font-size: 25px;" >Recognized: Non-Funded Student Organization</div>
          <div class="tile">
              <div class="owl-carousel owl-theme">
                                <?php
                                         include("conn.php");

                                         $tab = mysqli_query($conn,"SELECT * from non_govt_funded_org");

                                         
                                           while($res = mysqli_fetch_array($tab)) {         
                                          ?>
                                  <div class="item">
                                    <div class=" card text-center btn btn-light orgbox" data-toggle="modal" data-target="#org-modal" >
                                      <div class="mx-auto">
                                        <img src="../O-StudentDefault/Org_Applications/<?php echo $res['logo'] ?>" class="card-img-top imgbx" alt="...">
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx"><?php echo $res['org_name'] ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php 
                                            }

                                        ?>


                                  
        </div>

       </div>
</div>
</div>



              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Procedure Manual: Recognition of Organization</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                    
              <div class="form-group ">
                <p style="text-align: center;">NOTE 1:</p>
                <p>
The student organization writes a letter of intent to the Office of Student Affairs and Services (OSAS) duly signed by its President and Adviser indicating submission of the required documents enumerated in the checklist as follows:
<p >A. Recognition</p>
1. Application Letter 
<br>
2.  Mission, Vision, Statement   <br>
3. Notarized Affidavit of Leadership (highest officer -President and adviser) <br>
4. Resolution (change/edited CBL) <br>
5. Letter of Permission <br>
6. Letter of Consent  <br>
7. Action and Financial Plan <br>
8. List of Officers and Members the organization <br>
Note: (Officers should have affixed active contact numbers)  <br>
9. Constitutional-by-Laws <br>
10. Official Logo <br>
11. Letter of Intent of the Adviser<br>

</p>
</div>
                <div class="form-group ">
                <p style="text-align: center;">NOTE 2:</p>
                <p>  The Office of Student Affairs and Services (OSAS) evaluates the application of a prospective student organization and verifies their compliance of the required documents. 
                </p>
                </div>
   
                <div class="form-group ">
                <p style="text-align: center;">NOTE 3:</p>
                <p>
                  1.  The OSAS conducts verification of the endorsed documents and checks for completeness.<br>
                  2.  For those with complete documents, the OSAS issues Certificate of Recognition/Re-accreditation. Incomplete documents are returned to the prospective student organization for compliance. Certificate of Recognition will be issued as soon as possible as deficiencies are complied.<br>
                  3.  The OSAS conducts mass oath-taking for all recognized/re-accredited student organizations, (using the FMUSeP-ASO-01 for the Oath of Office Form).
 
                </p>                                  
<br>
                                  <p> By clicking apply now, you can upload your logos. </p>
                 </div>
                               </div>


                                                    </div>
                    <div class="modal-footer">
                      <a type="button" class="btn btn-success" href="Apply-Org.php">Apply Now</a>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
              </div>
            </div>

            
        <!-- View Remarks -->
          <form method="POST" >
              <div class="modal fade" id="remarkk-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header"><?php 
                      $query = "SELECT * FROM remarks_apply WHERE Submitted_by like '%".$_SESSION['id']."%'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_array($result);
                        
                    ?> 
                      <h5 class="modal-title" id="exampleModalLabel"><b><?php echo $row['org_name'];?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="remarkk">
                      </div>
          
                    <div class="modal-footer">
                      <button type="submit" name="postbtn" class="btn btn-danger"><i class="mr-1 fas fa-paper-plane"></i> SUBMIT</button>
                    </div></div>
                </div>
              </div>
            </div>
          </div>
        </form> 
        

    <script src="../../js/jquery-3.3.1.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/sweetalert.min.js"></script>
      <script type="text/javascript">
        $('#demoNotify').click(function(){
          $.notify({
            title: "Update Complete : ",
            message: "Disable Successfuly!",
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
      <script type="text/javascript" src="../../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>
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
           function openForm() {
          document.body.classList.add("myForm");

      }

        function closeForm() {
          document.body.classList.remove("myForm");

      }

      </script>
           
  <script src="../js/jquery.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
  <script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop:false  ,
    margin:10,
    nav:true,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
  </script>
  <script type="text/javascript">
      $(document).on('click','[data-role="exampleModall"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'remarkk.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#remarkk').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarkk-modal').modal("show");


      });
  </script>

  </body>
</html>
  </body>
</html>
<?php 
if(isset($_POST['postbtn'])){

    $by = $id;
   $date = date('y-m-d h:i:s');
   $filee = $_POST['filee'];
   $filesub = $_POST['by'];

   $quer = "SELECT * FROM org_applications WHERE Submitted_by ='$by'";
   $ress = mysqli_query($conn,$quer);
   $roww = mysqli_fetch_array($ress);

   if(isset($_FILES['filee'])){
     

     if($filesub=="Application Letter"){
      $pdf_name = $_FILES['filee']['name'];
      $pdf_size = $_FILES['filee']['size'];
     $pdf_tmp = $_FILES['filee']['tmp_name'];
     $path = "Org_Applications/".$pdf_name;
     $movepdf = move_uploaded_file($pdf_tmp,$path);

     $query = "UPDATE org_applications set App_letter='$pdf_name'  where Submitted_by ='$by'";
    $run = mysqli_query($conn,$query);


     }
     if($filesub=="Mission Vission Statement"){
      $pdf_name1 = $_FILES['filee']['name'];
      $pdf_size1 = $_FILES['filee']['size'];
     $pdf_tmp1 = $_FILES['filee']['tmp_name'];
     $path1 = "Org_Applications/".$pdf_name1;
     $movepdf1 = move_uploaded_file($pdf_tmp1,$path1);

     $query1 = "UPDATE org_applications set MVS='$pdf_name1'  where Submitted_by ='$by'";
    $run1 = mysqli_query($conn,$query1);


     }
     if($filesub=="Notarized Affidavit of Leadership"){
      $pdf_name2 = $_FILES['filee']['name'];
      $pdf_size2 = $_FILES['filee']['size'];
     $pdf_tmp2 = $_FILES['filee']['tmp_name'];
     $path2 = "Org_Applications/".$pdf_name2;
     $movepdf2 = move_uploaded_file($pdf_tmp2,$path2);

     $query2 = "UPDATE org_applications set Aff_Lead='$pdf_name2'  where Submitted_by ='$by'";
    $run2 = mysqli_query($conn,$query2);


     }
     if($filesub=="Resolution"){
      $pdf_name3 = $_FILES['filee']['name'];
      $pdf_size3 = $_FILES['filee']['size'];
     $pdf_tmp3 = $_FILES['filee']['tmp_name'];
     $path3 = "Org_Applications/".$pdf_name3;
     $movepdf3 = move_uploaded_file($pdf_tmp3,$path3);

     $query3 = "UPDATE org_applications set Resolution='$pdf_name3'  where Submitted_by ='$by'";
    $run3 = mysqli_query($conn,$query3);


     }
     if($filesub=="Letter of Permission"){
      $pdf_name4 = $_FILES['filee']['name'];
      $pdf_size4 = $_FILES['filee']['size'];
     $pdf_tmp4 = $_FILES['filee']['tmp_name'];
     $path4 = "Org_Applications/".$pdf_name4;
     $movepdf4 = move_uploaded_file($pdf_tmp4,$path4);

     $query4 = "UPDATE org_applications set Letter_Permission='$pdf_name4'  where Submitted_by ='$by'";
    $run4 = mysqli_query($conn,$query4);


     }
     if($filesub=="Letter of Consent"){
      $pdf_name5 = $_FILES['filee']['name'];
      $pdf_size5 = $_FILES['filee']['size'];
     $pdf_tmp5 = $_FILES['filee']['tmp_name'];
     $path5 = "Org_Applications/".$pdf_name5;
     $movepdf5 = move_uploaded_file($pdf_tmp5,$path5);

     $query5 = "UPDATE org_applications set Letter_content='$pdf_name5'  where Submitted_by ='$by'";
    $run5 = mysqli_query($conn,$query5);


     }
     if($filesub=="List of Officers and Members"){
      $pdf_name6 = $_FILES['filee']['name'];
      $pdf_size6 = $_FILES['filee']['size'];
     $pdf_tmp6 = $_FILES['filee']['tmp_name'];
     $path6 = "Org_Applications/".$pdf_name6;
     $movepdf6 = move_uploaded_file($pdf_tmp6,$path6);

     $query6 = "UPDATE org_applications set Lists='$pdf_name6'  where Submitted_by ='$by'";
    $run6 = mysqli_query($conn,$query6);


     }
     if($filesub=="Constitutional by Laws"){
      $pdf_name7 = $_FILES['filee']['name'];
      $pdf_size7 = $_FILES['filee']['size'];
     $pdf_tmp7 = $_FILES['filee']['tmp_name'];
     $path7 = "Org_Applications/".$pdf_name7;
     $movepdf7 = move_uploaded_file($pdf_tmp7,$path7);

     $query7 = "UPDATE org_applications set ConsLaw='$pdf_name7'  where Submitted_by ='$by'";
    $run7 = mysqli_query($conn,$query7);


     }
     if($filesub=="Office Logo"){
      $pdf_name8 = $_FILES['filee']['name'];
      $pdf_size8 = $_FILES['filee']['size'];
     $pdf_tmp8 = $_FILES['filee']['tmp_name'];
     $path8 = "Org_Applications/".$pdf_name8;
     $movepdf8 = move_uploaded_file($pdf_tmp8,$path8);

     $query8 = "UPDATE org_applications set Logo='$pdf_name8'  where Submitted_by ='$by'";
    $run8 = mysqli_query($conn,$query8);


     }
     if($filesub=="Letter of Intent"){
      $pdf_name9 = $_FILES['filee']['name'];
      $pdf_size9 = $_FILES['filee']['size'];
     $pdf_tmp9 = $_FILES['filee']['tmp_name'];
     $path9 = "Org_Applications/".$pdf_name9;
     $movepdf9 = move_uploaded_file($pdf_tmp9,$path9);

     $query9 = "UPDATE org_applications set Letter_intent='$pdf_name9'  where Submitted_by ='$by'";
    $run9 = mysqli_query($conn,$query9);


     }
   echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "Your work has been saved",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';
                                                 $updateStat = mysqli_query($conn, "UPDATE org_applications SET status = 1 WHERE ID = '$id'");
    } 
 else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "Your work has not been saved",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                
                                        }
}?>
<?php } ?>