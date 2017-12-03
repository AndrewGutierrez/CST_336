<?php
  session_start();
  include 'database.php';
  $conn = getDatabaseConnection();
    
  $sql ="DELETE FROM movies Where Number = " .$_GET['Number'];
              
  $stmt = $conn->prepare($sql);
  $stmt->execute();
      
  header("Location: adminpage.php");
?>