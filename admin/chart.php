<?php

    include_once 'header.php';
    
?>
<body>

<div>
    <canvas id="myChart"></canvas>
</div>



        <script>
        const ctx = document.getElementById('myChart');

        const DATA_COUNT = 5;
            const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

            const data = {
            labels: ['Cleared', 'Not Cleared'],
            datasets: [
                {
                label: 'Dataset 1',
                data: [5,12,2,54,62],
                backgroundColor: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
                }
            ]
        };

        new Chart( ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Pie Chart'
                }
                }
        },
    });  

</script>
</body>
</html>