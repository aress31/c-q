function basic_line(tab1,tab2) {

        $('#widesection').highcharts({
            chart: {
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'COURSES & QUIZZES',
                x: -20 //center
            },
            subtitle: {
                text: 'Historic',
                x: -20
            },
            xAxis: {
                categories: tab1
            },
            yAxis: {
                title: {
                    text: 'Valeurs'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: '',
                data: tab2
            }]
        });
    };

	function basic_area(tab1,tab2) {
        $('#widesection').highcharts({
            chart: {
                type: 'area'
            },
            title: {
                text: 'COURSES & QUIZZES '
            },
            subtitle: {
                text: 'Historic'
            },
            xAxis: {
                categories: tab1,
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'Billions'
                },
                labels: {
                    formatter: function() {
                        return this.value / 1000;
                    }
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' millions'
            },
            plotOptions: {
                area: {
                    stacking: 'normal',
                    lineColor: '#666666',
                    lineWidth: 1,
                    marker: {
                        lineWidth: 1,
                        lineColor: '#666666'
                    }
                }
            },
            series: [{
                name: 'Asia',
                data: tab2
            }]
        });
    };
	
function basic_bar(tab1,tab2) {
        $('#widesection').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: ' COURSES & QUIZZES '
            },
            subtitle: {
                text: 'Historic'
            },
            xAxis: {
                categories: tab2,
                title: {
                    text: 'NbAccess'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Courses',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -100,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year 1800',
                data: tab1
            }]
        });
    };
    

    