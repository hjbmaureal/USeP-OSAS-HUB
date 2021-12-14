<?php

header('Content-Type: application/json');

include('conn.php');

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
  $query = "SELECT radio_q1,count(radio_q1) AS count1 from counselling_evaluation where DATE_FORmAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear' and radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q1";

}else if ($from!='from' && $to!='to' && $fromyear!='' && $toyear!='') {
  // code...
  $query = "SELECT radio_q1,count(radio_q1) AS count1 from counselling_evaluation where DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to' and DATE_FORmAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear' and radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q1";

}else if ($from!='from' && $to!='to' && $fromyear=='' && $toyear=='') {
  // code...
  $query = "SELECT radio_q1,count(radio_q1) AS count1 from counselling_evaluation where DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to' and radio_q1 IN ('Excellent','Very Satisfactory', 'Satisfactory', 'Fair','Poor') GROUP BY radio_q1";

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