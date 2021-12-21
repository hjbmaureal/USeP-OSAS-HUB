  <?php
 require('../../conn.php');
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
    <title>Print</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/main2.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle2.css">
    <link rel="stylesheet" type="text/css" href="../../css/upstyle_shy.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </script>

  </head>
  <body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">
  <div id="print-container">
                   <div class="row mt-5">
                                <div class="col">
                                  <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <thead>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td style="border-color: black; " class="text-center align-middle" width="100px;"><img src="../../images/logo.png" width="100px;"></td>
                                          <td style="border-color: black; font-weight:bold;" class="text-center align-middle" width="450px">
                                            <span class="fs-11 d-block">Republic of the Philippines</span>
                                            <span style="font-family:Old English Text MT;">University of Southeasetern Philippines</span>
                                            <span class="fs-11 d-block">Iñigo St., Bo. Obrero, Davao City 8000</span>
                                            <span class="fs-11 d-block">Telephone: (082) 227-8192</span>
                                            <span class="fs-11 d-block">Website: www.usep.edu.ph</span>
                                            <span class="fs-11 d-block">Email: president@usep.edu.ph</span>
                                          </td>
                                          <td style="padding:0px; border-color: black; font-weight: bold;" class="td-b" width="230px">
                                            <table width="100%">
                                              <tr>
                                                <td class="fs-11 p-1" style=" border: 1px solid black;border-top: 0px; border-left: 0px;">Form No.</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-top: 0px; border-right: 0px; width: 70%"> </td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px; border-bottom: 0px;">Issue Status</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;"></td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px;">Revision No.</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;"></td>
                                              </tr>
                                              <tr>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-left: 0px;">Date Effective</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-right: 0px;"></td>
                                              </tr>
                                              <tr>
                                          <td class="fs-11 p-1" style="border: 1px solid black;border-bottom: 0px; border-left: 0px;">Approved by</td>
                                                <td class="fs-11 p-1" style="border: 1px solid black;border-bottom: 0px; border-right: 0px;"></td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      <tr>
                                          <td style="border-color: black; font-size: 16px; font-weight: bold; border: 1px solid black;" colspan="4" class="text-center p-1 text-b">SUMMARY REPORT</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="table-bd">
                <div class="table-responsive">
                   <br>
                  
                  <table class="table table-hover table-bordered mt32 reports-list" id="myTable">
                     <thead>
                       <thead>
                      <?php
                   

                      

                    if (isset($_POST['submit_org'])) {
                            echo "
                            <tr>
                            <th scope='col' colspan='10'><center><b>Student Organization Summary</b></center></th>
                            </tr>
                            <tr>
                            
                            <th scope='col'>Name of Organization</th>
                            <th scope='col'>Governor/President</th>
                            <th scope='col'>Adviser</th>
                            <th scope='col'>Type</th>
                            <th scope='col'>WFP</th>
                            <th scope='col'>PPMP</th>
                           <th scope='col'>Accomplishment Report</th>
                           <th scope='col'>Action Plan</th>
                           <th scope='col'>AFS</th>
                            <th scope='col'>Date</th>
                      
                          </tr>
                        </thead>
                        <tbody>";

                           
                          
                          $sql_org = $_POST['sql_val'];
                          
                          if ($sql_org != null) {
                          $result = mysqli_query($conn,$sql_org);
                          
                            # code...
                            
                              if (!$result) {
                                 printf("Error: %s\n", mysqli_error($conn));
                                 exit();
                                 }
                                 else{
                                 while($row=mysqli_fetch_array($result)){
                                      echo  "<tr>";
                                      echo  "<td>".$row['Org']."</td>";
                                      echo  "<td>".$row['Org_pres_gov']."</td>";
                                      echo  "<td>".$row['Org_adviser']."</td>";
                                      echo  "<td>".$row['Type']."</td>";
                                      echo  "<td>".$row['WFP']."</td>";
                                      echo  "<td>".$row['PPMP']."</td>";
                                      echo  "<td>".$row['AccomRep']."</td>";
                                      echo  "<td>".$row['ActionPlan']."</td>";
                                      echo  "<td>".$row['AFS']."</td>";
                                      echo  "<td>".$row['date']."</td>";
                                      echo  "</tr>";
                                    }
                                }
                            }
                    }
                    if(isset($_POST['submit_discipline'])){

                      

                      echo "
                      <tr>
                        <th scope='col' colspan='11'><center><b>Student Discipline: Complaint Reports</b></center></th>
                      </tr>
                      <tr>
                            
                          <th>Comp. ID</th>
                          <th class='max'>Name of Complainant</th>
                          <th>College</th>
                          <th>Course</th>
                          <th>Year Level</th>
                          <th>Detail</th>
                          <th>Time & Date of Incident</th>
                          <th>Location of Incident</th>
                          <th>Name of Person Complained</th>
                          <th>Witness of Incident</th>
                          <th>Action Taken</th>
                      
                          </tr>
                        </thead>
                        <tbody>";

                        $sql_dis = $_POST['sql_val'];
                          if ($sql_dis != null) {
                            $result = mysqli_query($conn,$sql_dis);
                          
                              if (!$result) {
                                 printf("Error: %s\n", mysqli_error($conn));
                                 exit();
                                 }
                                 else{
                                 while($row=mysqli_fetch_array($result)){
                                echo  "<tr>";
                                echo  "<td>".$row['Complaint_ID']. "</td>";
                                echo  "<td>".$row['name']. "</td>";
                                echo  "<td>".$row['college']."</td>";
                                echo  "<td>".$row['course']."</td>";
                                echo  "<td>".$row['year_level']."</td>";
                                echo  "<td>".$row['Detail']."</td>";
                                echo  "<td>".$row['daytime']."</td>";
                                echo  "<td>".$row['Loc_of_incident']."</td>";
                                echo  "<td>".$row['Person_Complained']."</td>";
                                echo  "<td>".$row['witness']."</td>";
                                echo  "<td>".$row['action_taken']."</td>";
                                echo  "</tr>";
                              }
                              }
                          }
                  }

                  if (isset($_POST['submit_gm'])) {
                    # code...
                    echo " 
                    <tr>
                      <th scope='col' colspan='11'><center><b>Request Good Moral Reports </b></center></th>
                    </tr> 
                    <tr>
                      <th>Request No.</th>
                      <th>OR No.</th>
                      <th class='max'>Full Name</th>
                      <th>Course/Degree</th>
                      <th>Year Level</th>
                      <th>School Year</th>
                      <th>Purpose</th>
                      <th>Student Type</th>
                      <th class='max'>Date Requested</th>
                    </tr>
                  </thead>
                  <tbody>";

                  $sql_dis = $_POST['sql_val'];
                    if ($sql_dis != null) {
                      # code...
                    
                        $result = mysqli_query($conn,$sql_dis);
                                if (!$result) {
                                   printf("Error: %s\n", mysqli_error($conn));
                                   exit();
                                   }
                                   else{
                                     while($row=mysqli_fetch_array($result)){
                                        echo  "<tr>";
                                        echo  "<td>".$row['req_id']. "</td>";
                                        echo  "<td>".$row['or_no']. "</td>";
                                        echo  "<td>".$row['name']."</td>";
                                        echo  "<td>".$row['course']."</td>";
                                        echo  "<td>".$row['year_level']."</td>";
                                        echo  "<td>".$row['sy_attended']."</td>";
                                        echo  "<td>".$row['purpose']."</td>";
                                        echo  "<td>".$row['type']."</td>";
                                        echo  "<td>".$row['date_req']."</td>";
                                       
                                        echo  "</tr>";
                                      }
                                }
                    }            
                  }
                  if (isset($_POST['submit_sll'])) {
                            echo "
                            <tr>
                                <th scope='col' colspan='11'><center><b>Student Labor Reports - Student Labor Lists</b></center></th>
                            </tr>
                            <tr>
                            
                            <th scope='col'>Student Labor ID</th>
                            <th scope='col'>Full Name</th>
                            <th scope='col'>Course & Year</th>
                            <th scope='col'>Semester</th>
                            <th scope='col'>Assigned Office</th>
                            <th scope='col'>Immediate Supervisor</th>
                      
                          </tr>
                        </thead>
                        <tbody>";

                           
                          
                          $sql_sll = $_POST['sql_val'];
                          
                          if ($sql_sll != null) {
                          $result = mysqli_query($conn,$sql_sll);
                          
                            # code...
                            
                              if (!$result) {
                                 printf("Error: %s\n", mysqli_error($conn));
                                 exit();
                                 }
                                 else{
                                 while($row=mysqli_fetch_array($result)){
                                      echo  "<tr>";
                                      echo  "<td>".$row['applicant_id']."</td>";
                                      echo  "<td>".$row['applicant_name']."</td>";
                                      echo  "<td>".$row['course_year']."</td>";
                                      echo  "<td>".$row['sem_year']."</td>";
                                      echo  "<td>".$row['unit_assigned']."</td>";
                                      echo  "<td>".$row['staff_requested_by']."</td>";
                                      echo  "</tr>";
                                    }
                                }
                            }
                    }
                    if (isset($_POST['submit_sldtr'])) {
                            echo "
                            <tr>
                                <th scope='col' colspan='11'><center><b>Student Labor Reports - Student Labor DTR</b></center></th>
                            </tr>
                            <tr>
                            
                            <th scope='col'>Student Labor ID</th>
                            <th scope='col'>Full Name</th>
                            <th scope='col'>Course & Year</th>
                            <th scope='col'>Semester</th>
                            <th scope='col'>Assigned Office</th>
                            <th scope='col'>Immediate Supervisor</th>
                            <th scope='col'>Date Submitted</th>
                            <th scope='col'>Total No. of Hours</th>
                      
                          </tr>
                        </thead>
                        <tbody>";

                           
                          
                          $sql_sll = $_POST['sql_val'];
                          
                          if ($sql_sll != null) {
                          $result = mysqli_query($conn,$sql_sll);
                          
                            # code...
                            
                              if (!$result) {
                                 printf("Error: %s\n", mysqli_error($conn));
                                 exit();
                                 }
                                 else{
                                 while($row=mysqli_fetch_array($result)){
                                      echo  "<tr>";
                                      echo  "<td>".$row['applicant_id']."</td>";
                                      echo  "<td>".$row['applicant_name']."</td>";
                                      echo  "<td>".$row['course_year']."</td>";
                                      echo  "<td>".$row['sem_year']."</td>";
                                      echo  "<td>".$row['unit_assigned']."</td>";
                                      echo  "<td>".$row['staff_requested_by']."</td>";
                                      echo  "<td>".$row['date_posted']."</td>";
                                      echo  "<td>".$row['total_hours']."</td>";
                                      echo  "</tr>";
                                    }
                                }
                            }
                    }

                    if (isset($_POST['submit_sls'])) {
                            echo "
                            <tr>
                                <th scope='col' colspan='11'><center><b>Student Labor Reports - Student Labor Salary</b></center></th>
                            </tr>   
                            <tr>
                            
                            <th scope='col'>Student Labor ID</th>
                            <th scope='col'>Full Name</th>
                            <th scope='col'>Course & Year</th>
                            <th scope='col'>Semester</th>
                            <th scope='col'>Assigned Office</th>
                            <th scope='col'>Immediate Supervisor</th>
                            <th scope='col'>Total No. of Hours</th>
                            <th scope='col'>Total Salary</th>
                      
                          </tr>
                        </thead>
                        <tbody>";

                           
                          
                          $sql_sll = $_POST['sql_val'];
                          
                          if ($sql_sll != null) {
                          $result = mysqli_query($conn,$sql_sll);
                          
                            # code...
                            
                              if (!$result) {
                                 printf("Error: %s\n", mysqli_error($conn));
                                 exit();
                                 }
                                 else{
                                 while($row=mysqli_fetch_array($result)){
                                      echo  "<tr>";
                                      echo  "<td>".$row['applicant_id']."</td>";
                                      echo  "<td>".$row['applicant_name']."</td>";
                                      echo  "<td>".$row['course_year']."</td>";
                                      echo  "<td>".$row['sem_year']."</td>";
                                      echo  "<td>".$row['unit_assigned']."</td>";
                                      echo  "<td>".$row['staff_requested_by']."</td>";
                                      echo  "<td>".$row['total_hours']."</td>";
                                      echo  "<td>".$row['salary']."</td>";
                                      echo  "</tr>";
                                    }
                                }
                            }
                    }
                  ?>


                  </tbody>
                  </table>
                </div>
              </div>







                                  </div>


                                </div>
                              </div>   
                              <br><br>
                             

               
                </main>
                <!-- Essential javascripts for application to work-->
  <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="../../js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/fullcalendar.min.js"></script>
                <script type="text/javascript">
                  $('#demoNotify').click(function(){
                    $.notify({
                      title: "Update Complete : ",
                      message: "Verified Successfuly!",
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
                <script type="text/javascript" src="../../js/plugins/dataTables.bootstrap.min.js"></script>  <!-- Google analytics script-->
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
          
              </body>
              </html>