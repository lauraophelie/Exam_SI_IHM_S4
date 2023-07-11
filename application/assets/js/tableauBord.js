var table = document.querySelector('table');
var labels = Array.from(table.querySelectorAll('th')).slice(1).map(th => th.textContent.trim());
var datasets = Array.from(table.querySelectorAll('tbody tr')).map(tr => {
  var label = tr.querySelector('td').textContent.trim();
  var data = Array.from(tr.querySelectorAll('td')).slice(1).map(td => parseInt(td.textContent.trim()));
  return {
    label: label,
    data: data
  };
});

var data = {
  labels: labels,
  datasets: datasets.map(dataset => ({
    label: dataset.label,
    data: dataset.data,
    backgroundColor: randomColor(),
    borderColor: randomColor(),
    borderWidth: 1
  }))
};

var options = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
};

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});

function randomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}