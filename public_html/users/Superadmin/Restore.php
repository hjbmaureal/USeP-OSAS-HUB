<?php 
$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost",  "root", "", "osasdb9");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
      $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
       
       $con =  new mysqli("localhost", "root", "","osasdb9");
  if($con->connect_error){
    die("Connection Failed: " . $con->connect_error);
  }
    
    date_default_timezone_set("Singapore");
$finall=date("Y-m-d h:i:sa");
        $ip_address = strip_tags(file_get_contents('http://checkip.dyndns.com/'));
        $final = str_replace("Current IP CheckCurrent IP Address: ","",$ip_address);
 $finals=5;
      $edit = "INSERT INTO activity_log(User_Id,Username, User_type,IP_address,Date_Time,Activity) VALUES 
      ('$finals', 'Super Admin','Staff', '$final','$finall','Restore Database')";
          $result=$con-> query($edit);
          if(!$result ) { 
    die('Could not get data: ' . $con->connect_error); 
    }else{
             
      
    exit(); 
            
    }
       
       
   }
  }
  else
  {
   $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
  }
 }
 else
 {
  $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
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
          <link rel="icon" href="../image/logo.png" type="image/gif" sizes="16x16">
      <title>USeP Super Admin</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="../css/main_main.css">
          <link rel="stylesheet" type="text/css" href="../css/upstyle_main.css">
      <!-- Font-icon css-->
          <link rel="stylesheet" type="text/css" href="../css/all.min.css">
      <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>


      <div class="tile mb-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Restore Database</i></h2>
            </div>
            <?php
            if (! empty($response)) {
                ?>
            <div class="response <?php echo $response["type"]; ?>">
            <?php echo nl2br($response["message"]); ?>
            </div>
            <?php
            }
            ?>
          <form method="post" action="" enctype="multipart/form-data"
        id="frm-restore">
            <div class="bs-component">
              <div class="jumbotron">
                <h1 class="display-3">Choose A File</h1>
                <input type="file" name="database" class="input-file" />
                 <br>
                <br>

                <p><input type="submit" name="import" class="btn btn-success btn-lg" value="Restore"></a> <a class="btn btn-primary btn-lg" href="Backup_Restore.php">Back</a></p>
                 <br>
                <br>

                <br>
                <br>
                <br>
                <br><br>
                <br><br><br>
          
    </main>
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
    </body>
  </html>