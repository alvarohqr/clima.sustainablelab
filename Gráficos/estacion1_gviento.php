 <!DOCTYPE html>
  <html>
  <head>
    <title>Rosa de los vientos | Estación #1</title>
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
    <?php include 'conn_rose.php';?>
    <div class="w3-container">
  
  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_gtemp.php'">Temperatura</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_ghum.php'">Humedad</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_gprsn.php'">Presión</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_glluvia.php'">Lluvia</button>
    <button class="w3-bar-item w3-button tablink w3-green" onclick="openprmtr(event,'Viento')">Viento</button>
    <button class="w3-bar-item w3-button tablink" role="link" onclick="location.href='estacion1_gpm.php'">Partículas</button>
  </div>
  <div id="Viento" class="w3-container w3-border parameter">
    <br /> 
    <div id="container" style="width:875px;height:440px"></div>
    <br />   
    <script type="text/javascript">
      var categories = ['N', 'NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW', 'SW', 'WSW', 'W', 'WNW', 'NW', 'NNW'];
    Highcharts.chart('container', {

        chart: {
                polar: true,
                type: 'column'
            },

        title: {
            text: 'Rosa de los vientos'
        },
        pane: {
                size: '85%'
            },

        legend: {
        align: 'right',
        verticalAlign: 'top',
        y: 100,
        layout: 'vertical'
    },

         xAxis: {
                min: 0,
                max: 360,
                type: "",
                tickInterval: 22.5,
                tickmarkPlacement: 'on',
                labels: {
                    formatter: function () {
                        return categories[this.value / 22.5];
                    }
                }
            },
            yAxis: {
                min: 0,
                endOnTick: false,
                showLastLabel: true,
                title: {
                    text: 'Frequency (%)'
                },
                labels: {
                    formatter: function () {
                        return this.value + '%';
                    }
                },
                reversedStacks: false
            },


        tooltip: {
        valueSuffix: 'km/h'
    },

        plotOptions: {
                series: {
                    stacking: 'normal',
                    shadow: false,
                    groupPadding: 0,
                    pointPlacement: 'on'
                }
            },

        series: [{
                name: '0-5 km/h',
                color: '#CC6600',
                data: (function() {
                   var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawvel1);$i++){
                    ?>
                    data.push([<?php echo $rawvel1[$i]["DIR_VIENTO"];?>,<?php echo $rawvel1[$i]["VEL_VIENTO"];?>]);
                    <?php } ?>
                return data;
                })()
            },{
                name: '5-10 km/h',
                     data: (function() {
                        var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawvel2);$i++){
                    ?>
                    data.push([<?php echo $rawvel2[$i]["DIR_VIENTO"];?>,<?php echo $rawvel2[$i]["VEL_VIENTO"];?>]);
                    <?php } ?>
                return data;
                     })() 
            },{
                name: '10-15 km/h',
                     data: (function() {
                        var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawvel3);$i++){
                    ?>
                    data.push([<?php echo $rawvel3[$i]["DIR_VIENTO"];?>,<?php echo $rawvel3[$i]["VEL_VIENTO"];?>]);
                    <?php } ?>
                return data;
                     })() 
            },{
                name: '15-20 km/h',
                     data: (function() {
                        var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawvel4);$i++){
                    ?>
                    data.push([<?php echo $rawvel4[$i]["DIR_VIENTO"];?>,<?php echo $rawvel4[$i]["VEL_VIENTO"];?>]);
                    <?php } ?>
                return data;
                     })() 
            },{
                name: '20-25 km/h',
                     data: (function() {
                        var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawvel5);$i++){
                    ?>
                    data.push([<?php echo $rawvel5[$i]["DIR_VIENTO"];?>,<?php echo $rawvel5[$i]["VEL_VIENTO"];?>]);
                    <?php } ?>
                return data;
                     })() 
            },{
                name: '25-30 km/h',
                     data: (function() {
                        var data = [];
                    <?php
                        for($i = 0 ;$i<count($rawvel6);$i++){
                    ?>
                    data.push([<?php echo $rawvel6[$i]["DIR_VIENTO"];?>,<?php echo $rawvel6[$i]["VEL_VIENTO"];?>]);
                    <?php } ?>
                return data;
                     })() 
            }]
    });
    </script>
  </div>
  </div>
  </div>
</body>
</html>                            
