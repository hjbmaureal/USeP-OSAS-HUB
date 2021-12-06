<?php
  include_once("connect_db.php");
  $results = array();
  //ADD
  if(isset($_POST['addAnnouncement'])){
    $title = $_POST['addTitle'];
    $content = $_POST['addContent'];
    $today = $_POST['addDate'];

    if(mysqli_query($conn, "INSERT INTO `scholarship_announcement`(`title`,`content`, `date`) VALUES ('$title','$content','$today')")){
      die(header("Location: ../users/Scholarship/index.php?announcement-posted"));
    }else{
      die(header("Location: ../users/Scholarship/index.php?announcement-failed"));
    }
  }
  //READ
  if(isset($_POST['announcement_id'])){
    $id = $_POST['announcement_id'];
    if($result = mysqli_query($conn, "SELECT * FROM scholarship_announcement WHERE announcement_id ='$id' ")){
      while($row = mysqli_fetch_assoc($result)){
        $results[0] = $row['announcement_id'];
        $results[1] = $row['date'];
        $results[2] = $row['title'];
        $results[3] = $row['content'];
      }
    }
    die(json_encode($results));
  }
  //UPDATE
  if(isset($_POST['announcement-id']) && isset($_POST['updateAnnouncement'])){
    $id = $_POST['announcement-id'];
    $title = $_POST['editTitle'];
    $content = $_POST['editContent'];
    $query = "UPDATE scholarship_announcement SET title = '$title' , content = '$content' WHERE announcement_id = '$id'";
    if(mysqli_query($conn,$query)){
      die(header("Location: ../users/Scholarship/index.php?update=success"));
    }else{
      die(header("Location: ../users/Scholarship/index.php?update=failed"));
    }
  }
  //DELETE
  if(isset($_POST['announcement-id']) && isset($_POST['deleteAnnouncement'])){
    $id = $_POST['announcement-id'];
    if(mysqli_query($conn, "DELETE FROM scholarship_announcement WHERE announcement_id = '$id'")){
      die(header("Location: ../users/Scholarship/index.php?delete=success"));
    }else{
      die(header("Location: ../users/Scholarship/index.php?delete=failed"));
    }
  }