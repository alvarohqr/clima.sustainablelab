<?php  
 //https://www.cloudways.com/blog/import-export-csv-using-php-and-mysql/
 if(isset($_POST["exportar"])) 
 {  
      $connect = mysqli_connect("sustainablelab.com.mx", "c132weather", "powerlab1", "c132clima");   
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=datos.csv');
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Fecha', 'Temperatura', 'Temp_interna', 'Humedad','Presion', 'Vel_viento', 'Dir_viento', 'Lluvia', 'PM2.5','PM10','Color'));  
      $query = "SELECT * FROM clima WHERE FECHA BETWEEN '".$_POST["Desde"]."' AND '".$_POST["Hasta"]."'  ";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output); 
}  
 ?>