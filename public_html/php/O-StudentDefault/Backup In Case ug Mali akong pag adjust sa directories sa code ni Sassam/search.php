<?php
    require_once 'conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Search = $_POST['search'];
        $sql = "SELECT * from student where last_name like '%".$Search."%' ";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#" class="list-group list-group-item-action border p-2">'.$row['Student_id'].'&emsp;'.$row['last_name'].',&emsp;'.$row['first_name'].'</a>';
                
            }
        }
        else{
            echo '<p class="list-group list-group-item-action">Account not found</p>';
        }
    }


?>