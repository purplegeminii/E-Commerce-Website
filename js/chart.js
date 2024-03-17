// config
const config = {
    type: 'line',
    data: {}, // Initialize with empty data
    options: {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'hour'
                },
                min: new Date('2023-10-20T00:00:00'),
                max: new Date('2025-10-20T00:00:00')
            },
            y: {
                beginAtZero: true
            }
        }
    }
};

// Fetch data from PHP script
fetch('../actions/get_chart_data.php')
    .then(response => response.json())
    .then(data => {
        // Use fetched data to populate the datasets
        config.data = {
            datasets: [{
                label: 'Sales',
                data: data,
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
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

// Render the chart with the fetched data
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

// render init block
function dateFilter(time) {
    myChart.config.options.scales.x.time.unit = time;
    myChart.update();
}

// Instantly assign Chart.js version
const chartVersion = document.getElementById('chartVersion');
chartVersion.innerText = Chart.version;
