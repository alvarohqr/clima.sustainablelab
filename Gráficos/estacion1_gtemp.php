 <!DOCTYPE html>
  <html>
  <head>
    <title>Gráfico Temperatura | Estación #1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.ico" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/data.js"></script>
    <script src="https://code.highcharts.com/stock/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <link rel="stylesheet" href="estacion.css"> 
    <script src="tablalink.js"></script>
    <script src="datepicker.js"></script>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand">
            <img src="ITSON_negativo.png" style="width:110px; height:48px;" alt="ITSON">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.html" class="nav-item nav-link">INICIO</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ESTACIONES</a>
                    <div class="dropdown-menu">
                        <a href="estacion1_data.php" class="dropdown-item">ESTACIÓN #1</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #2</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #3</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown">GRÁFICOS</a>
                    <div class="dropdown-menu">
                        <a href="estacion1_gtemp.php" class="dropdown-item">ESTACIÓN #1</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #2</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #3</a>
                    </div>
                </div>
            <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">EXPORTAR DATOS</a>
                    <div class="dropdown-menu">
                        <a href="estacion1_full.html" class="dropdown-item">ESTACIÓN #1</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #2</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #3</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="container-all">
    <?php include 'conn.php';?>
    <div class="w3-container">
  
  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-green" onclick="openprmtr(event,'Temperatura')">Temperatura</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_ghum.php'">Humedad</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_gprsn.php'">Presión</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_glluvia.php'">Lluvia</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_gviento.php'">Viento</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_gpm.php'">Partículas</button>
  </div>
  <div id="Temperatura" class="w3-container w3-border parameter">
    <br /> 
    <div id="container" style="width:875px;height:440px"></div>
    <br />   
    <script type='text/javascript'>

Highcharts.getJSON('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/range.json', function (data) {

    Highcharts.setOptions({
    lang: {
            loading: 'Cargando...',
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            exportButtonTitle: "Exportar",
            printButtonTitle: "Importar",
            rangeSelectorFrom: "Desde",
            rangeSelectorTo: "Hasta",
            rangeSelectorZoom: "Período",
            downloadPNG: 'Descargar imagen PNG',
            downloadJPEG: 'Descargar imagen JPEG',
            downloadPDF: 'Descargar imagen PDF',
            downloadSVG: 'Descargar imagen SVG',
            downloadCSV: 'Descargar archivo CSV',
            downloadXLS: 'Descargar archivo XLS',
            printChart: 'Imprimir',
            resetZoom: 'Reiniciar zoom',
            resetZoomTitle: 'Reiniciar zoom',
            thousandsSep: ",",
            decimalPoint: '.'
        }        
});

    Highcharts.stockChart('container', {

        chart: {
            type: 'spline',
            backgroundColor: '#CCCCCC'
        },

       rangeSelector: {
            allButtonsEnabled: true,
            buttons: [{
                type: 'month',
                count: 3,
                text: 'Dia',
                dataGrouping: {
                    forced: true,
                    units: [['day', [1]]]
                }
            }, {
                type: 'year',
                count: 1,
                text: 'Semana',
                dataGrouping: {
                    forced: true,
                    units: [['week', [1]]]
                }
            }, 

            {
                type: 'all',
                text: 'Mes',
                dataGrouping: {
                    forced: true,
                    units: [['month', [1]]]
                }
            }],
            buttonTheme: {
                width: 60
            },
            selected: 2
        },

        xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'T (°C)'
                },
                
             },

        title: {
            text: 'Temperatura'
        },

        tooltip: {
            valueSuffix: '°C',
            valueDecimals: 2
        },

        series: [{
            name: 'Temperatura',
                color: '#FF0000',
                data: (function() {
                   var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawdata);$i++){
                    ?>
                    data.push([<?php echo $rawdata[$i]["FECHA"];?>,<?php echo $rawdata[$i]["TEMPERATURA"];?>]);
                    <?php } ?>
                return data;
                })()
        }]

    });
});


</script>
  </div>
  </div>
  </div>
</body>
</html>                            
