<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>

<script src="../Highcharts-5.0.11/code/highcharts.js"></script>
<script src="../Highcharts-5.0.11/code/highcharts-3d.js"></script>
<script src="../Highcharts-5.0.11/code/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>


		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Inventario de Materiales'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Cantidad de Ejemplares',
        data: [
            ['Libros', 45.0],
            ['CD´S', 26.8],
            {
                name: 'Revistas',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['Juegos', 8.5],
            ['Trajes Tipicos', 6.2]            
        ]
    }]
});
		</script>
	</body>
</html>
