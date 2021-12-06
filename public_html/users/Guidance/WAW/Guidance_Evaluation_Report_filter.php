<?php 
include('conn.php');
include('session_admin.php');
   $admin_id=$_SESSION['id'];
sleep(1);

if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['fromyear']) && isset($_POST['toyear'])) {
        $from=$_POST['from'];
        $to=$_POST['to'];
        if ($to=='') {
         $to='all';
       }
        $fromyear=$_POST['fromyear'];
        $toyear=$_POST['toyear'];
        
      if ($from!='from' && $to!='to' && $fromyear=='' && $toyear=='') {
          // code...
            $count="SELECT count(counsel_eval_id) as count from counselling_evaluation where DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            $count1="SELECT count(counsel_eval_id) as count from counselling_evaluation where DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            $count2="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            $count3="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            /*SQL FOR TABLE*/
            $sql="SELECT counselling_evaluation.comments, course.title from counselling_evaluation join student USING(Student_id) join course USING (course_id) where counselling_evaluation.Student_id = student.Student_id and DATE_FORmAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";

      }if ($from!='from' && $to!='to' && $fromyear!='' && $toyear!='') {
          // code...
            $count="SELECT count(counsel_eval_id) as count from counselling_evaluation where DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to' and DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
            $count1="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear' and DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            $count2="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear' and DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            $count3="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear' and DATE_FORMAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to'";
            /*SQL FOR TABLE*/
            $sql="SELECT counselling_evaluation.comments, course.title from counselling_evaluation join student USING(Student_id) join course USING (course_id) where counselling_evaluation.Student_id = student.Student_id and DATE_FORmAT(counselling_evaluation.eval_date, '%m') BETWEEN '$from' and '$to' and DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
      }if ($from=='from' && $to=='to' && $fromyear!='' && $toyear!='') {
          // code...
      
            $count="SELECT count(counsel_eval_id) as count from counselling_evaluation where DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
            $count1="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
            $count2="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
            $count3="SELECT count(counsel_eval_id) as count from counselling_evaluation WHERE DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
            /*SQL FOR TABLE*/
            $sql="SELECT counselling_evaluation.comments, course.title from counselling_evaluation join student USING(Student_id) join course USING (course_id) where counselling_evaluation.Student_id = student.Student_id and DATE_FORMAT(counselling_evaluation.eval_date, '%Y') BETWEEN '$fromyear' and '$toyear'";
        }
        
 ?>
    <input type="hidden" id="filtermonth"name="filtermonth" value="<?php echo $from;?>">
    <input type="hidden" id="filtermonth2"name="filtermonth2" value="<?php echo $to;?>">
    <input type="hidden" id="fromyear"name="fromyear" value="<?php echo $fromyear;?>">
    <input type="hidden" id="toyear"name="toyear" value="<?php echo $toyear;?>">
    <div class="calldata">
    <div class="row d-flex justify-content-center" style="margin-top: 20px">
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;"> 
            <h5 class="title">Quality (Effectiveness) of the Service</h5>
            <h9>Total Number of Respondents:</h9>

            <?php 
                    if($result = mysqli_query($conn, $count1)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br>
            <div>
              <canvas id="myChart"></canvas>
            </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;">
            <h5 class="title">Timeliness (Waiting Period)</h5>
            <h9>Total Number of Respondents:</h9>
            <?php
                    if($result = mysqli_query($conn, $count2)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br>
            <div>
              <canvas id="myChart2"></canvas>
            </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="tile" style="border-width:2px; border-style: solid;">
            <h5 class="title">Student's Satisfaction</h5>
            <h9>Total Number of Respondents:</h9>
            <?php 
                    if($result = mysqli_query($conn, $count3)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br>
            <div>
              <canvas id="myChart3"></canvas>
            </div>
            </div>
          </div>
        </div>
      
      </div>
          <div class="row d-flex justify-content-center">
          <div class="col-md-11">
            <div class="tile">
              <div class="tile-body">
                
                <div class="center"><h5>Other Comments/Suggestions</h5></div>
                <div><h9>Total Number of Respondents:</h9>
                <?php 
                    if($result = mysqli_query($conn, $count)){
          while ($row = mysqli_fetch_assoc($result)) {     
                 ?>
            <b> <?php echo $row['count'];}}?></b><br></div>
                </div>
                  <div class="table-bd">
                <div class="table-responsive">
                  <br>
                  <div class="calldiv">
                  <table class="table table-hover table-bordered" id="sampleTable2">
                    <thead>
                      <tr>
                      <th>Course</th>
                      <th>Comments/Suggestions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
       
          if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {
                                echo'<tr>
                                  <td>'. $row['title'].'</td>
                                  <td>'. $row['comments'].'</td>
                                </tr>';}}

       ?>
                    
                  </tbody>
                  </table>
 
                </div>
                </div>
<?php if ($from=='from' && $fromyear=='' && $toyear=='') { ?>
<script>
$(document).ready(function(){
  showGraph();
  showGraph2();
  showGraph3();
});

function showGraph()
        {{
                $.post("EvalReports.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q1);
                        count.push(data[i].count1);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#d4ac6e',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }
function showGraph2()
        {
            {
                $.post("EvalReports2.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q2);
                        count.push(data[i].count2);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart2");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }

function showGraph3()
        {
            {
                $.post("EvalReports3.php",
                function (data)
                {
                    console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q3);
                        count.push(data[i].count3);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart3");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
});
}
  }
</script>
<?php }else{
 ?>
<script type="text/javascript">
    $(document).ready(function(){
        var filtermonth = $("#filtermonth").val();
        var filtermonth2 = $("#filtermonth2").val();
        var fromyear = $("#fromyear").val();
        var toyear = $("#toyear").val();
                  /*  alert(fromyear);
                    alert(toyear);
                    alert(filtermonth);
                    alert(filtermonth2);*/
                    if (filtermonth2!='to' || fromyear!='' || toyear!='') {
                    $.ajax({
                          url:"EvalReportsfilter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : fromyear, toyear : toyear},
                          
                          success:function(data){
                                      console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q1);
                        count.push(data[i].count1);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#d4ac6e',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
                          },
                    });
                }
                /*end if=====================================*/

                      /*alert("2");*/
                    if (filtermonth2!='to' || fromyear!='' || toyear!='') {
                    $.ajax({
                          url:"EvalReports2filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : fromyear, toyear : toyear},
                          
                          success:function(data){
                               console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q2);
                        count.push(data[i].count2);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart2");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
                          },
                    });
                }
                /*end if==================================================*/
        /*alert("3");*/
                    if (filtermonth2!='to' || fromyear!='' || toyear!='') {
                    $.ajax({
                          url:"EvalReports3filter.php",
                          type:"POST",
                          data:{from : filtermonth, to : filtermonth2, fromyear : fromyear, toyear : toyear},
                          
                          success:function(data){
                               console.log(data);
                    var radio = [];
                    var count = [];

                    for (var i in data) {
                        radio.push(data[i].radio_q3);
                        count.push(data[i].count3);
                    }
var data = {
    labels: radio,
    datasets: [
        {
            label: "Respondents",
            backgroundColor: '#82b74b',
            borderColor: '#46d5f1',
            hoverBackgroundColor: '#b5e7a0',
            hoverBorderColor: '#666666',
            data: count
        }
    ]
};
var ctx = $("#myChart3");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 5,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 20,
                }
            }]
        }
    }
});
                          },
                    });
                }

    });
 </script>
<?php } ?>
<!-- 
 -->
 
<?php }












?>