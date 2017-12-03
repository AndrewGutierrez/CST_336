<?php
    include 'database.php';
    global $conn;
    $conn = getDatabaseConnection();
    
    function getAdmin() {
        global $conn;
        $sql = "SELECT AVG(Minutes) average FROM `movies` WHERE 1"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        echo json_encode($records); 
    }
    $data = getAdmin();
?>
