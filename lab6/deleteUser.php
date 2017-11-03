<?php


  include '../../database.php';
  $conn = getDatabaseConnection();
  
  
    $sql ="DELETE FROM User
            Where id = " .$_GET['userId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");


?>