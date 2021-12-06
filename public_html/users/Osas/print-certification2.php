 <?php
    include 'conn.php'; 
    $requestid = $_GET['id'];
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
    <title>Print Good Moral Certificate</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <link rel="stylesheet" type="text/css" href="css/upstyle2.css">
    <link rel="stylesheet" type="text/css" href="css/upstyle_shy.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl" style="background-color: #fff;" onload="window.print()">
  <div id="print-container">
      <?php
                                  $query = mysqli_query($conn, "call PrintGoodMoral($requestid);");

                                  while($row = mysqli_fetch_array($query)) {
                                    ?>
                   <div class="row mt-5">
                                <div class="col">
                                  <div class="text-center w-100">
                                    <img src="image/logo.png" width="150px" class="mb-2">
                                    <h5 class="s30 oldenglish lh">University of Southeastern Philippines</h5>
                                    <h5 class="s27 times lh-1 fw"><i>Tagum Mabini Campus</i></h5>
                                    <h5 class="s27 times lh-1 fw"><i>Office of Student Affairs and Services</i></h5>
                                    <h4 class="s35 times fw mt-5 mb-5">CERTIFICATION</h4>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="mlr s23" style="line-height: 2; font-family: Arial;">
                                    <p class="text-justify w-100 p-print">This is to certify that per records on file,

                                    <input class="form-control fc2 ww300 ph text-center" type="text" placeholder="<?php echo $row["user_name"]; ?>" disabled="">, is a 
                                    <span>graduate of the University of Southeastern Philippines, Tagum - Mabini with the </span>
                                    degree of  

                                    <input class="form-control fc2 ph text-center" style="width: 500px;" type="text" placeholder="<?php echo $row["degree"]; ?>" disabled=""> major in 

                                    <input class="form-control fc2 ph text-center" style="width: 350px;" type="text" placeholder="<?php echo $row['major']; ?>" disabled="">SY. 

                                    <input class="form-control fc2 ww85 ph text-center" type="text" placeholder="<?php echo $row['sy_from']; ?>" disabled="">
                                    - 

                                    <input class="form-control fc2 ww85 ph text-center" type="text" placeholder="<?php echo $row['sy_to']; ?>" disabled="">.  </p>

                                    <p class="text-justify w-100 mt-4 p-print"> Records of this office show that he/she was not reported or charged for any misbehavior or infraction against the school's rules and regulations.</p>

                                    <p class="text-justify w-100 mt-4 p-print text-center"> This certifies further that

                                     <input class="form-control fc2 ww290 ph text-center" type="text" placeholder="<?php echo $row['user_name']; ?>" disabled="">

                                   possesses good moral character during his/her stay in this University.</p>

                                   <p class="text-justify w-100 mt-4 p-print"> This certification is being issued upon the request of 

                                    <input class="form-control fc2 ww300 ph text-center" type="text" placeholder="<?php echo $row['user_name']; ?>" disabled="" >

                                    for 

                                    <input class="form-control fc2 ww200 ph text-center" type="text" placeholder="<?php echo $row['purpose']; ?>" disabled="">

                                  purposes only.</p>

                                  <p class="text-justify w-100 mt-4 p-print">Issued this 

                                    <input class="form-control fc2 ww50 ph text-center" type="text" placeholder="<?php echo $row['day']; ?>" disabled="">

                                    day of 

                                    <input class="form-control fc2 ww50 ph text-center" type="text"  placeholder="<?php echo $row['month']; ?>" disabled="">

                                    ,  

                                    <input class="form-control fc2 ww50 ph text-center" type="text" placeholder="<?php echo $row ['year']; ?>"disabled="">

                                  at USeP Tagum - Mabini Campus, apokon, Tagum City.</p>


                                  <div class="float-right text-center mt70" style="font-family: Arial;">
                                    <p class="lh-1 s20"><b>KENDI B. ARSITIO</b></p>
                                    <p class="lh-1 s20">OSAS-Coordinator, Tagum Unit</p>
                                  </div><br><br>

                                  <div class=" mt130 d-block" style="font-family: Arial;">
                                    <span class="s17">O.R# <input class="form-control fc ww120" type="text" placeholder="<?php echo $row ['or_no']; ?>" disabled=""></span><br>
                                    <span class="s17">Not valid without the</span><br>
                                    <span class="s17">University Seal</span>
                                  </div>


                                </div>

                              </div>
                            </div>
<?php } ?>


</div>

                  </main>
                </main>
                <!-- Essential javascripts for application to work-->

                <script src="js/jquery-3.3.1.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/main.js"></script>
                <!-- The javascript plugin to display page loading on top-->
                <script src="js/plugins/pace.min.js"></script>
                <!-- Page specific javascripts-->
                <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
                <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
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
                <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
                <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>  <!-- Google analytics script-->
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