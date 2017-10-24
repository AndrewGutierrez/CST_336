<?php

 //_______________________Basic Setup for Connection to Database______________________________

    $servername = "localhost";
    $username = "root";
    $password = "cst336";
    $dbname = "midterm"; //name of the database in phpmyadmin
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
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
    
    
   
     echo "<br><br><br>";
    
    $sql = "SELECT * FROM `mp_town` Left Join mp_county on mp_town.county_id = mp_county.county_id Order by population DESC"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['town_name'] ." " .$row['county_name'] ." " .$row['population']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }

 $conn->close(); //MAKE SURE TO CLOSE THE CONNECTION

?>