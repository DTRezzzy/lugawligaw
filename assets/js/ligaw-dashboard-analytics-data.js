var xValues = ["Mandaluyong", "Marikina ", "Pasig ", "Quezon ", "San Juan"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

//----------------------------------------------pie chart
new Chart("myChart", {
    type: "pie",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        title: {
            display: true,
            text: "NCR: District I "
        }
    }
});

//----------------------------------------------bar chart
new Chart("myChart2", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "NCR: District I "
        }
    }
});

//----------------------------------------------line chart
var xValues1 = [50,60,70,80,90,100,110,120,130,140,150];
var yValues1 = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart3", {
  type: "line",
  data: {
    labels: xValues1,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues1
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});