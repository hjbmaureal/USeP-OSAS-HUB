<?php
    require_once 'conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Search = $_POST['search'];
        $sql = "SELECT * from student where last_name like '".$Search."' ";
        $result = mysqli_query($conn,$sql);
        

        $sqlfil = "SELECT org_pres_gov from approve_funded where org_pres_gov like '%$Search%' ";
        $resultfil = mysqli_query($conn,$sqlfil); 

        if (mysqli_num_rows($resultfil)) {
             echo '<p class="list-group list-group-item-action">Account not found</p>';   
            }
            
        
       
            
            else{
                while ($row = mysqli_fetch_array($result)) {
            
                echo '<a href="#" class="list-group list-group-item-action border p-2">'.$row['Student_id'].'&emsp;'.$row['last_name'].',&emsp;'.$row['first_name'].'</a>';
                }
            
        }
    }



?>