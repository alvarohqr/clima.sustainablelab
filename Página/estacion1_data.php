  <!DOCTYPE html>
  <html>
  <head>
    <title>Weather Report | Estación #1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.ico" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="estacion_data.css">
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
                    <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown">ESTACIONES</a>
                    <div class="dropdown-menu">
                        <a href="estacion1_data.php" class="dropdown-item">ESTACIÓN #1</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #2</a>
                        <a href="#" class="dropdown-item">ESTACIÓN #3</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">GRÁFICOS</a>
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
<h1>Datos actuales</h1>
  <div class="container-all">
    <?php include 'datos_est1.php';?>

  <div class="container">
    <img src="temp.jpg" alt="">
     <span class="title">Temperatura</span>
     <span class="text"><?php
                          for($i = 0 ;$i<count($rawdata);$i++){
                      ?><?php echo $rawdata[$i]["TEMPERATURA"];?> °C
                      <?php } ?> </span>
    
  </div>

  <div class="container">
    <img src="hum.jpg" alt="">
    <span class="title">Humedad</span>
    <span class="text"><?php
                          for($i = 0 ;$i<count($rawdata);$i++){
                      ?><?php echo $rawdata[$i]["HUMEDAD"];?> %
                      <?php } ?> </span>
  </div>

  <div class="container">
    <img src="presion.jpg" alt="">
     <span class="title">Presión</span>
    <span class="text"><?php
                          for($i = 0 ;$i<count($rawdata);$i++){
                      ?><?php echo $rawdata[$i]["PRESION"];?> hPa
                      <?php } ?> </span>
  </div>

  <div class="container">
    <img src="lluvia.jpg" alt="">
     <span class="title">Lluvia</span>
    <span class="text"><?php
                          for($i = 0 ;$i<count($rawdata);$i++){
                      ?><?php echo $rawdata[$i]["LLUVIA"];?> mm
                      <?php } ?> </span>
  </div>

  <div class="container">
    <img src="viento.jpg" alt="">
    <span class="title">Viento</span>
    <span class="text"><?php
                          for($i = 0 ;$i<count($rawdata);$i++){
                      ?><?php echo $rawdata[$i]["VEL_VIENTO"];?> m/s | <?php echo $rawdata[$i]["DIR_VIENTO"];?>° 
                      <?php } ?> </span>
  </div>
  <div class="container">
    <img src="pm.jpg" alt="">
     <span class="title">Particulas</span>
    <span class="text"><?php
                          for($i = 0 ;$i<count($rawdata);$i++){
                      ?>PM2.5: <?php echo $rawdata[$i]["PM2_5"];?>µg/m3 | PM10: <?php echo $rawdata[$i]["PM10"];?>µg/m3
                      <?php } ?> </span>
      
  </div>
  </div>
</body>
</html>                            
