var xValues = ["On-going", "Pending ", "Approved ", "Completed "];
var yValues = [55, 49, 44, 24];
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
            text: "Status of Projects"
        }
    }
});