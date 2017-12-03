<?php
    include 'database.php';
    global $conn;
    $conn = getDatabaseConnection();
    
    function getAdmin() {
        global $conn;
        $username = $_GET['username']; 
    
        $sql = "SELECT * from admin WHERE username='$username'"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        echo json_encode($records); 
    }
    getAdmin();
?>
