<?php

header('Content-Type: application/json');

$databaseHost = 'localhost';
$databaseName = 'guidance_db'; 
$databaseUsername = 'root'; 
$databasePassword = ''; 
$conn= mysqli_connect ($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }
if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['fromyear']) && isset($_POST['toyear'])) {

    $from=$_POST['from'];
    $to=$_POST['to'];
    if ($to=='') {
         $to='all';
       }
    $fromyear=$_POST['fromyear'];
    $toyear=$_POST['toyear'];
  # code...
if ($from=='from' && $to=='to' && $fromyear!='' && $toyear!='') {
  // code...
  $query = "SELECT radio_q1,count(radio_q1) AS count1 from counselling_evaluation where  DATE_FORmAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$from' and '$to' and radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q1";

}if ($from!='from' && $to!='to' && $fromyear!='' && $toyear!='') {
  // code...
  $query = "SELECT radio_q1,count(radio_q1) AS count1 from counselling_evaluation where  DATE_FORmAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to' and DATE_FORmAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear' and radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q1";

}if ($from!='from' && $to!='to' && $fromyear=='' && $toyear=='') {
  // code...
  $query = "SELECT radio_q1,count(radio_q1) AS count1 from counselling_evaluation where  DATE_FORmAT(counselling_evaluation.eval_date, '%m') BETWEEN '$fromyear' and '$toyear' and radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q1";

}


$result = mysqli_query($conn,$query);

$data = array();

foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
}
?>