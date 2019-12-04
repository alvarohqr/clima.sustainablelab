  <?php
  
   function conectarBD(){ 
              //Parámetros necesarios para lograr la conección a la base de datos
              $server = ""; //Dirección IP del servidor o bien URL del host
              $usuario = ""; //Usuario phpMyadmin
              $pass = ""; //Contraseña para ingresar
              $BD = ""; //Nombre de la base de datos
                //variable que guarda la conexión de la base de datos
                $conexion = mysqli_connect($server, $usuario, $pass, $BD); 
                //Comprobamos si la conexión ha tenido exito
                if(!$conexion){ 
                   echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>'; 
                } 
                //devolvemos el objeto de conexión para usarlo en las consultas  
                return $conexion; 
        }  
        /*Desconectar la conexion a la base de datos*/
        function desconectarBD($conexion){
                //Cierra la conexión y guarda el estado de la operación en una variable
                $close = mysqli_close($conexion); 
                //Comprobamos si se ha cerrado la conexión correctamente
                if(!$close){  
                   echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>'; 
                }    
                //devuelve el estado del cierre de conexión
                return $close;         
        }

        //Devuelve un array multidimensional con el resultado de la consulta
        function getArraySQL($sql){
            //Creamos la conexión
            $conexion = conectarBD();
            //generamos la consulta
            if(!$result = mysqli_query($conexion, $sql)) die();

            $rawdata = array();
            //guardamos en un array multidimensional todos los datos de la consulta
            $i=0;
            while($row = mysqli_fetch_array($result))
            {   
                //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
                $rawdata[$i] = $row;
                $i++;
            }
            //Cerramos la base de datos
            desconectarBD($conexion);
            //devolvemos rawdata
            return $rawdata;
        }

        //Sentencias SQL para la obtención de las distintas velocidades en el intervalo de un dia
    $sql = "SELECT * from nombre de la base;";
    
    $vel1 = 'SELECT * FROM `nombre de la base` WHERE `VEL_VIENTO`>=\'0\' AND `VEL_VIENTO`<=\'5\' AND `FECHA` > date_sub(now(), INTERVAL 1 day)';    
    $vel2 = 'SELECT * FROM `nombre de la base` WHERE `VEL_VIENTO`>=\'5\' AND `VEL_VIENTO`<=\'10\' AND `FECHA` > date_sub(now(), INTERVAL 1 day)';
    $vel3 = 'SELECT * FROM `nombre de la base` WHERE `VEL_VIENTO`>=\'10\' AND `VEL_VIENTO`<=\'15\' AND `FECHA` > date_sub(now(), INTERVAL 1 day)';
    $vel4 = 'SELECT * FROM `nombre de la base` WHERE `VEL_VIENTO`>=\'15\' AND `VEL_VIENTO`<=\'20\' AND `FECHA` > date_sub(now(), INTERVAL 1 day)';
    $vel5 = 'SELECT * FROM `nombre de la base` WHERE `VEL_VIENTO`>=\'20\' AND `VEL_VIENTO`<=\'25\' AND `FECHA` > date_sub(now(), INTERVAL 1 day)';
    $vel6 = 'SELECT * FROM `nombre de la base` WHERE `VEL_VIENTO`>=\'25\' AND `VEL_VIENTO`<=\'30\' AND `FECHA` > date_sub(now(), INTERVAL 1 day)';
    //Arrays Multidimensionales
    $rawdata = getArraySQL($sql);
    $rawvel1 = getArraySQL($vel1);
    $rawvel2 = getArraySQL($vel2);
    $rawvel3 = getArraySQL($vel3);
    $rawvel4 = getArraySQL($vel4);
    $rawvel5 = getArraySQL($vel5);
    $rawvel6 = getArraySQL($vel6);

    //Adaptar el tiempo
    for($i=0;$i<count($rawdata);$i++){
        $FECHA = $rawdata[$i]["FECHA"];
        $date = new DateTime($FECHA);
        $rawdata[$i]["FECHA"]=$date->getTimestamp()*1000;
    }
    ?>
