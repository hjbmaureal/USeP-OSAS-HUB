<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "backupdb-3");  

      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Time Period', 'Equipment Code', 'Equipment', 'Quantity Received', 'Functional', 'Semi-functional','Non-functional'));  
      $query = "SELECT * from supply_equipment_inventory";  
      $result = mysqli_query($connect, $query);  
      
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  