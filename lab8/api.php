<?php



function getDatabaseConnection() {
    /*
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bb108e997bcdab";
    $password = "7b071f8b";
    $dbname = "heroku_3d24ca78bc82e88"; */
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b229677fee94e5";
    $password = "99214852";
    $dbname="heroku_ae0fb105b2b4a84";
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}



function getUsersThatMatchUserName() {
    
    $username = $_GET['username']; 

    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from User WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records); 
}


getUsersThatMatchUserName(); 


?>
