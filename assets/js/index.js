$(function(){




    /* Peity charts */

    $('.peity-donut').peity('donut');

    /*--- Apex (#spark1) ---*/
    var spark1 = {
        chart: {
            id: 'spark1',
            group: 'sparks',
            type: 'line',
            height: 38,
            sparkline: {
                enabled: true
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 1,
                opacity: 0.1,
            }
        },
        series: [{
            data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
        }],
        stroke: {
            curve: 'smooth'
        },
        markers: {
            size: 0
        },
        grid: {
            padding: {
                top: 10,
                bottom: 10,
                left: 50
            }
        },
        colors: ['#0a9ae1'],
        stroke: {
            width: 2
        },
        tooltip: {
            x: {
                show: false,
                width: 1,
            },
            y: {
                title: {
                    formatter: function formatter(val) {
                        return '';
                    }
                }
            }
        }
    }
    /*--- Apex (#spark1) closed ---*/

});


//  $('.resp-tabs-list .layout-spruha').addClass('active');
// $('.second-sidemenu .layout-spruha').addClass('resp-tab-content-active');


/*
var ctx = document.getElementById('bar-chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        datasets: [{
            label: 'Total Project',
            backgroundColor: "#6259ca",
            borderColor: "#6259ca ",
            data: [89, 59, 76, 56, 58,73, 59, 87, 45, 54,59, 76, 56,],
        }, {
            label: 'On Going',
            backgroundColor: "rgba(204, 204, 204,0.2)",
            borderColor: "rgba(204, 204, 204,0.2)",
            data: [66, 59, 76, 56, 58,65, 59, 85, 23, 32,59, 76, 56,],
        }
        ],
    },
    options: {
        tooltips: {
            displayColors: true,
        },
        barValueSpacing : 3,        // doesn't work; find another way
        barDatasetSpacing : 3,
        scales: {
            xAxes: [{
                barThickness: 3,
                categoryPercentage: 4,
                barPercentage: 4,
                stacked: true,
                display: false,
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                stacked: true,
                ticks: {
                    beginAtZero: false,
                },
                display: false,
                gridLines: {
                    display: false,
                },
                type: 'linear',
                display: false,
            }]
        },
        responsive: true,
        maintainAspectRatio: false,
        legend: { position: 'bottom',display: false, },
    }
});

*/


