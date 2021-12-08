//initialize the variables of type array tat will store callback data from ajax
var student_id = [];
var type = [];
var semester = [];
var year = [];
var label = ['Signed', 'Not yet signed'];

//get current semester
var currSemester = $('#currentSemester').text();

console.log(currSemester)
var totalCount = 0;
var signedCard = 0;
var notYetSigned = 0;

//random color for doughnut
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

//update chart for filter function
function removeData(chart) {
  for(var i = 0; i < semester_year.length; i++){
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
      dataset.data.pop();
    });
  }
  chart.update();
}

//data for config
const data1 = {
  labels:  [],
  datasets: [{
    backgroundColor: [],
    data: [],
  }]
};

//config for chart
const config1 = {
  type: 'doughnut',
  data: data1,
  options: {
    responsive: true,
    legend: {
      display: false,
    },
    plugins: {
        title: {
            display: true,
            text: 'Signed Cards'
        }
    }
  }
};

//get Canvas tag from page
var ctx1 = $('#cardSummary');

//declare chart
var cardSummary = new Chart(ctx1, config1);

//function for generation of chart
function generateChart(){
  //get newly declared chart and assign label and the data for presentation
  for(var i = 0; i < label.length; i++){
    if(i == 0){
      addSummaryData(cardSummary, label[i], signedCard);
    }else{
      addSummaryData(cardSummary, label[i], notYetSigned);
    }
  }
}

//make the chart
function addSummaryData(chart, label, data){
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
      dataset.data.push(data);
      dataset.backgroundColor.push(getRandomColor());
  });
  chart.update();
}

// JQUERY !
$(document).ready(function(){
  //Execute after loading page
  $.ajax({
    url: '../../php/fetchCardSummary.php',
    method: 'GET',
    dataType: 'JSON',
    success:function(data){
      console.log(data)
      //assign data to array
      for(var i = 0; i < data.length; i++){
        student_id.push(data[i].student_Id);
        type.push(data[i].type);
        totalCount = data.length;
        if(data[i].semester == 1){
          semester.push("1st Semester");
        }else if(data[i].semester == 2){
          semester.push("2nd Semester");
        }else{
          semester.push("Off Semester");
        }
        if(data[i].year == 1){
          year.push("1st Year");
        }else if(data[i].year == 2){
          year.push("2nd Year");
        }else if(data[i].year == 3){
          year.push("3rd Year");
        }else if(data[i].year == 4){
          year.push("4th Year");
        }else if(data[i].year == 5){
          year.push("5th Year");
        }
        if(semester[i] == currSemester){
          signedCard++;
        }
        console.log(semester[i] == currSemester)
        notYetSigned = totalCount - signedCard;
        // if(Math.sign(notYetSigned) == -1){
        //   notYetSigned = 0;
        // }
      }
      console.log(signedCard);
      console.log(student_id);
      console.log(type);
      console.log(semester);
      console.log(year);
      generateChart();
    }
  })
 })