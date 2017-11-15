<?php
include "../database.php";
$conn=getDatabaseConnection();
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully" ."<br>";
    
    $sql = "SELECT * FROM `mp_town` WHERE population between 50000 and 80000"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['town_name'] ."-" .$row['population']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
?>