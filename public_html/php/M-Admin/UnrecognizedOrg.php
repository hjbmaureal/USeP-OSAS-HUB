  <?php
include("conn.php");

$sql = "SELECT * from org_filess";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqll = "SELECT * from accre_files";
$resultt = mysqli_query($conn, $sqll);

$filess = mysqli_fetch_all($resultt, MYSQLI_ASSOC);

// Downloads files

if (isset($_GET['AccomRep'])) {
    $file_name = $_GET['AccomRep'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from org_filess where AccomRep='$file_name' and ID='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Org_Files/'. $file['AccomRep'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Org_Files/' . $file['AccomRep']));
        readfile('../M-StudentGov/Org_Files/' . $file['AccomRep']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['ActionPlan'])) {
    $file_name = $_GET['ActionPlan'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from org_filess where ActionPlan='$file_name' and ID='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Org_Files/'. $file['ActionPlan'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Org_Files/' . $file['ActionPlan']));
        readfile('../M-StudentGov/Org_Files/' . $file['ActionPlan']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['AFS'])) {
    $file_name = $_GET['AFS'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from org_filess where AFS='$file_name' and ID='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Org_Files/'. $file['AFS'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Org_Files/' . $file['AFS']));
        readfile('../M-StudentGov/Org_Files/' . $file['AFS']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Lists_officers'])) {
    $file_name = $_GET['Lists_officers'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Lists_officers='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Accre_Files/'. $file['Lists_officers'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Accre_Files/' . $file['Lists_officers']));
        readfile('../M-StudentGov/Accre_Files/' . $file['Lists_officers']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Lists_members'])) {
    $file_name = $_GET['Lists_members'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Lists_members='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Accre_Files/'. $file['Lists_members'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Accre_Files/' . $file['Lists_members']));
        readfile('../M-StudentGov/Accre_Files/' . $file['Lists_members']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Aff_adviser'])) {
    $file_name = $_GET['Aff_adviser'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Aff_adviser='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Accre_Files/'. $file['Aff_adviser'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Accre_Files/' . $file['Aff_adviser']));
        readfile('../M-StudentGov/Accre_Files/' . $file['Aff_adviser']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['Aff_high_officer'])) {
    $file_name = $_GET['Aff_high_officer'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where Aff_high_officer='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Accre_Files/'. $file['Aff_high_officer'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Accre_Files/' . $file['Aff_high_officer']));
        readfile('../M-StudentGov/Accre_Files/' . $file['Aff_high_officer']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['AFP'])) {
    $file_name = $_GET['AFP'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where AFP='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Accre_Files/'. $file['AFP'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Accre_Files/' . $file['AFP']));
        readfile('../M-StudentGov/Accre_Files/' . $file['AFP']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
if (isset($_GET['CBL_logo'])) {
    $file_name = $_GET['CBL_logo'];
    $file_id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * from accre_files where CBL_logo='$file_name' and org_id='$file_id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../M-StudentGov/Accre_Files/'. $file['CBL_logo'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../M-StudentGov/Accre_Files/' . $file['CBL_logo']));
        readfile('../M-StudentGov/Accre_Files/' . $file['CBL_logo']);



        // Now update downloads count
     /*   $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
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
      <link rel="icon" href="../image/logo.png" type="../image/gif" sizes="16x16">
      <title>USeP Student Hub</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../css/main_main.css">
      <link rel="stylesheet" type="text/css" href="../css/upstyle_shy.css">
      <link rel="stylesheet" type="text/css" href="../css/upstyle_scholarship.css">
      <link rel="stylesheet" href="../css/owl.carousel.min.css">
      <link rel="stylesheet" href="../css/owl.theme.default.min.css">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     </head>
      <body class="app sidebar-mini rtl">
      <!-- Navbar-->

        
      <header class="app-header">
    
   
      </header>
   


      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="../image/logo.png" width="20%" alt="img">
          <div>
                                   <p class="app-sidebar__user-name font-sec" style="margin-top: 8px;">COORDINATOR</p><p style="text-align: center;" class="app-sidebar__user-name font-sec" > PORTAL</p>
          </div>
        </div>

        <hr>

        <ul class="app-menu font-sec">
          <li class="p-2 sidebar-label"><span class="app-menu__label">DASHBOARD</span></li>
          <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Student Discipine</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
              <li><a class="treeview-item" href="Complaints.html">Complaints</a></li>
              <li><a class="treeview-item" href="Response.html">Response</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="StudentOrg.html" data-toggle="treeview"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Student Organizations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
   <li><a class="treeview-item" href="NewOrgApplicants.php">New Organization Applicants</a></li>
              <li><a class="treeview-item" href="RecognizedOrg.php">Funded Organizations</a></li>
              <li><a class="treeview-item active" href="UnrecognizedOrg.php">Non-Funded Organizations</a></li>
            </ul>
          </li> 
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Student Labor</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="Labor-Requisition.html">Requisition Form</a></li>
              <li><a class="treeview-item " href="Labor-Recommendation.html">Recommendation Form</a></li>
              <li><a class="treeview-item " href="Labor-Acceptance.html">Acceptance Form</a></li>
              <li><a class="treeview-item " href="Labor-Application.html">Student Labor Application</a></li>
              <li><a class="treeview-item" href="DTR.html">Student Labor DTR</a></li>
              <li><a class="treeview-item" href="Salary.html">Student Labor Salary</a></li>
              <li><a class="treeview-item" href="Labor-Accomplishment.html">Accomplishment Reports</a></li>
            </ul>
          </li>

          

          <li><a class="app-menu__item" href="ReqGoodMoral.html"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Request for Good Moral</span></a></li>
          
                     <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
  <li><a class="treeview-item" href="RStudentOrg.html">Student Organization</a></li>
              <li><a class="treeview-item" href="RStudentDiscipline.html">Student Discipline</a></li>
              <li><a class="treeview-item" href="RStudentlists.html">Student Labor</a></li>
              <li><a class="treeview-item" href="RStudentRequest.html">Good Moral</a></li>        </ul>
          </li>

                    <li class="p-2 sidebar-label"><span class="app-menu__label">OTHERS</span></li>
                    <li><a class="app-menu__item" href="Announcements.html"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Announcements</span></a></li>
                    <li><a class="app-menu__item" href="Job-Announcements.html"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Job Hirings</span></a></li>
        </ul>
      </aside>


       <!--navbar-->

          <main class="app-content">
            
        <div class="app-title">
           <div><!-- Sidebar toggle button--><a class="app-sidebar__toggle fa fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a></div>
          <ul class="app-nav">
            <li>
                <a class="appnavlevel">Admin</a>
              </li>
             <!-- <li class="app-search">
                   <input class="app-search__input" type="search" placeholder="Search">
                  <button class="app-search__button"><i class="fa fa-search"></i></button>
              </li>-->  
              <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class=" fas fa-bell fa-lg mt-2"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 4 new notifications.</li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
                <div class="app-notification__content">
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Lisa sent you a mail</p>
                        <p class="app-notification__meta">2 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Mail server not working</p>
                        <p class="app-notification__meta">5 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div></a></li>
                </div>
              </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
              
                 <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="text-warning fas fa-user-circle fa-2x"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                       <li><a class="dropdown-item" href="user-profiles.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </li>
      
          </ul>
        </div>
        <div class="red"> 
          
        </div>

             
        

                        <h3 class="mb-4">Non-Funded Organizations</h3>
                        <div class="row">
                          <div class="col-xl">
                            <div class="tile"> 
                              <div class="row">
                                <div class="col">
                                 <div class="owl-carousel owl-theme">
                                   <?php
                                         include("conn.php");

                                         $tab = mysqli_query($conn,"SELECT * from org_filess where Type='Non-Govt. Funded Organization'");

                                         
                                           while($res = mysqli_fetch_array($tab)) {         
                                          ?>
                                  <div class="item">
                                    <div class=" card text-center btn btn-light orgbox" data-toggle="modal" data-role="orgbtn" id="<?php echo $res['ID']?>">

                                      <div class="mx-auto">
                                         

                                        <img src="../O-StudentDefault/Org_Applications/" class="card-img-top imgbx" alt="...">
                                      </div>
                                      <div class="card-body">
                                        <p class="card-text txbx"><?php echo $res['Org'] ?></p>
                                      </div>
                                      

                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm blocking w-100 mt-2" data-toggle="modal" data-role="remarkbtn" id="<?php echo $res['ID']?>" data-type="<?php echo $res['Type']?>"><i class="mr-2 fas fa-comment" ></i> ADD REMARKS</button>
                                  
                                  </div>




                                  <?php 
                                            }

                                        ?>

                                  


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>





                      <!-- MODAL VIew -->


                     <form method="post" >

                      <div class="modal fade" id="org-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            
                            <div class="modal-body" id="orgbox-detail">
                            </div>
                 <div class="modal-footer">
                  <button type="submit"  name="submit1" class="btn btn-success">Approve</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          </form>  

<form method="POST" enctype="multipart/form-data" >
  <div class="modal fade" id="remarks-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Remarks</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="remark-detail">
          
    </div>
     <div class="modal-footer">
                          <button type="submit" name="postbtn" class="btn btn-danger btn-sm blocking w-100 mt-2"><i class="mr-1 fas fa-paper-plane"></i> POST</button>
                      </div>
                    </div>
                  </div>
 </form>
                  <!-- schedule -->

         <!--<div class="page-error tile">-->

        
    </main>
    <!-- Essential javascripts for application to work-->

    <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="../js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="../js/plugins/bootstrap-notify.min.js"></script>
      <script type="text/javascript" src="../js/plugins/sweetalert.min.js"></script>
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
      <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
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
      $(document).on('click','[data-role="orgbtn"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'nonfunded_orgbox.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#orgbox-detail').html(data);
          }
      })

        jQuery.noConflict();
        $('#org-modal').modal("show");


      });
  </script>
   <script type="text/javascript">
      $(document).on('click','[data-role="remarkbtn"]', function(){
        var id = $(this).attr("id");
        $.ajax({  
          url:'remarks3.php',  
          method:'POST',  
          data:{id:id},  
          success: function(data){
            $('#remark-detail').html(data);
          }
      })

        jQuery.noConflict();
        $('#remarks-modal').modal("show");


      });
  </script>

  </body>
</html>
  </body>
</html>          
<?php 
if(isset($_POST['submit1']))
                                        {
                                            $name = $_POST['name'];
                                            $idd =  $_POST['idd'];
                                            $gov =  $_POST['gov'];
                                            $adviser =  $_POST['adviser'];
                                            $type =  $_POST['type'];
                                            

                                           

                                            $query = "INSERT INTO approve_funded(org_name,id,org_pres_gov,org_adviser,type) VALUES('$name','$idd','$gov','$adviser','$type')";
                                          $run = mysqli_query($conn, $query);

                                            if($run){

                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "'.$name.' :Approved",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';
                                                    }
                                        else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "'.$name.' :Not approved",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                
                                        }
                                          
                                         
                                      }
if(isset($_POST['postbtn'])){
    $name = $_POST['name'];
    $file =  $_POST['file'];
    $message = $_POST['message'];
   
$query = "INSERT INTO remarks_apply values('$name','$file','$message','')";
    $run = mysqli_query($conn,$query); 
  if(isset($_FILES['image'])){
    $pdf_name2 = $_FILES['image']['name'];
  $pdf_size = $_FILES['image']['size'];
  $pdf_tmp = $_FILES['image']['tmp_name'];
  $path = "Remarks/".$pdf_name2;
  $movepdf = move_uploaded_file($pdf_tmp,$path);

    $queryy = "UPDATE remarks_apply set image ='$pdf_name2' where org_name ='$name' and file='$file'";
    $runn = mysqli_query($conn,$queryy); 


   if($run){ 
    
echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "success",
                                                    title: "Your remark has been saved",
                                                    showConfirmButton: true
                                                    
                                                  })
                                                });
                                                 </script>';

}
else{
                                            echo '<script> 
                                                $(document).ready(function(){
                                                  swal({
                                                    
                                                    type: "warning",
                                                    title: "Your remark has not been saved",
                                                    showConfirmButton: true
                                                   
                                                  })
                                               });

                                                </script>';
                                                  //  echo $name, $file,$message, $image;
                                                   
                                                
                                        }

}
}  
?>