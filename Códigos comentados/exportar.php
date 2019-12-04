<?php  
 //código obtenido en: https://www.cloudways.com/blog/import-export-csv-using-php-and-mysql/
 if(isset($_POST["exportar"])) 
 {  
      //Parámetros necesarios para lograr la conección a la base de datos
      $server = ""; //Dirección IP del servidor o bien URL del host
      $usuario = ""; //Usuario phpMyadmin
      $pass = ""; //Contraseña para ingresar
      $BD = ""; //Nombre de la base de datos
     
      $connect = mysqli_connect($server, $usuario, $pass, $BD);  
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=datos.csv');
      $output = fopen("php://output", "w"); 
      // selección de las columnas de la base que conformaran el archivo CSV
      fputcsv($output, array('columna1', 'columna2', 'columna3', 'columna4', 'columna5',... 'columnax'));  
      //
      $query = "SELECT * FROM nombre de la base WHERE FECHA BETWEEN '".$_POST["Desde"]."' AND '".$_POST["Hasta"]."'  ";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output); 
}  
 ?>