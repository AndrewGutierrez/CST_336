<?php
    include 'database.php';
    global $conn;
    $conn = getDatabaseConnection();
    
    function getAdmin() {
        
        global $conn;
        $sql = "SELECT Genre type, COUNT(Genre) count FROM `movies` GROUP BY Genre"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        echo json_encode($records); 
    }
    $data = getAdmin();
?>
