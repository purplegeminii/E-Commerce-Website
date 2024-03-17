
// setup 
const data = {

    datasets: [{
    label: 'Sales',
    data: [
        { x: new Date('2023-10-20T00:00:00'), y:3},
        { x: new Date('2023-10-20T01:00:00'), y:6},
        { x: new Date('2023-10-20T02:00:00'), y:3},
        { x: new Date('2023-11-23T04:30:00'), y:3},
        { x: new Date('2024-10-27T00:00:00'), y:3},
    ],
    backgroundColor: [
        'rgba(255, 26, 104, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(0, 0, 0, 0.2)'
    ],
    borderColor: [
        'rgba(255, 26, 104, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(0, 0, 0, 1)'
    ],
    borderWidth: 1
    }]
};

// config 
const config = {
    type: 'line',
    data,
    options: {
    scales: {
        x:{
            type:'time',
            time:{
                unit:'hour'
            },
            min:new Date('2023-10-20T00:00:00'),
            max: new Date('2025-10-20T00:00:00')
        },
        y: {
        beginAtZero: true
        }
    }
    }
};

// render init block
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
function dateFilter(time){
    myChart.config.options.scales.x.time.unit = time;
    myChart.update();
}

// Instantly assign Chart.js version
const chartVersion = document.getElementById('chartVersion');
chartVersion.innerText = Chart.version;
