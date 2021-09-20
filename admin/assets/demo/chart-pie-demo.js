// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Thriller", "Action", "Drame", "Comédie", "Crime", "Guerre"],
    datasets: [{
      data: [12.21, 15.58, 11.25, 8.32, 5, 16],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#e707f7', '#28a895', '#08a705'],
    }],
  },
});
