//initialize the variables of type array that will hold callback data
var semester_year = [];
var program_name = [];
var course = [];
var scholar_count = [];
var totals = [];

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
const data2 = {
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
            text: 'No of Grantees'
        }
    }
  }
};
//config for chart
const config2 = {
  type: 'doughnut',
  data: data2,
  options: {
    responsive: true,
    legend: {
      display: false,
    },
    plugins: {
        title: {
            display: true,
            text: 'Total Amount'
        }
    }
  }
};
//get Canvas tag from page
var ctx1 = $('#noOfGrantees');
var ctx2 = $('#totalMoney');

//declare the chart
var granteeChart = new Chart(ctx1, config1);
var totalAmountChart = new Chart(ctx2, config2);

//function for generation of chart
function generateChart(){
  //get newly declared chart and assign label and the data for presentation
  for(var i = 0; i < semester_year.length; i++){
    addDataGrantee(granteeChart, semester_year[i] +' '+ program_name[i], scholar_count[i]);
    addDataTotalAmounts(totalAmountChart, semester_year[i] +' '+ program_name[i], totals[i]);
  }
}
//make the chart!
function addDataGrantee(chart, label, data){
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
      dataset.data.push(data);
      dataset.backgroundColor.push(getRandomColor());
  });
  chart.update();
}
function addDataTotalAmounts(chart, label, data){
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
      dataset.data.push(data);
      dataset.backgroundColor.push(getRandomColor());
  });
  chart.update();
}

//JQUERY!
$(document).ready(function (){
  //JQUERY FOR FETCH DATA AND ASSIGN IN JSON
  $.ajax({
    url: '../../php/fetchTotalsData.php',
    method: 'GET',
    dataType: 'JSON',
    success:function(data){
      //console.log(data); //debug
      //console.log(data.length); //debug

      //assign data to array
      for(var i = 0; i < data.length; i++){
        semester_year.push(data[i].semester_year);
        program_name.push(data[i].program_name);
        scholar_count.push(data[i].scholar_count);
        totals.push(data[i].totals);
        //course.push(data[i].course); TO BE ADDED
      }
      generateChart();
    }
  });
  // USE JAVASCRIPT FILTER TO FILTER
  // console.log(semester_year);
  // console.log(program_name);
  // console.log(scholar_count);
  // console.log(totals);
  // sortScholarshipProgram These are the IDs
  // sortSemester
  // semesterFromYear
  // semesterToYear
  // sortCourse
  // scholarship-type

  //filter trigger

});

