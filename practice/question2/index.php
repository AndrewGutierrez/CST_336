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
    
    
    //$conn->close(); //MAKE SURE TO CLOSE THE CONNECTION
    
    //_____________end copy & paste______________
    
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
    
    echo "<br><br><br>";
    
    $sql = "SELECT county_name, SUM( population ) total FROM  `mp_town` LEFT JOIN mp_county ON mp_town.county_id = mp_county.county_id GROUP BY county_name"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['county_name'] ." " .$row['total']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    
    //SELECT state_name, SUM( population ) FROM `mp_county` LEFT join mp_state on mp_state.state_id = mp_county.state_id LEFT join mp_town on mp_town.county_id = mp_county.county_id Group by mp_county.state_id
    
    echo "<br><br><br>";
    
    $sql = "SELECT state_name, SUM( population )total FROM `mp_county` LEFT join mp_state on mp_state.state_id = mp_county.state_id LEFT join mp_town on mp_town.county_id = mp_county.county_id Group by mp_county.state_id";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['state_name'] ." " .$row['total']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    echo "<br><br><br>";
    
    $sql = "SELECT * FROM `mp_town` WHERE 1 ORDER BY population LIMIT 3";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['town_name'] ." " .$row['population']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
        
     echo "<br><br><br>";
    
    $sql = "SELECT * FROM `mp_county` LEFT join mp_town on mp_county.county_id = mp_town.county_id  WHERE town_name is NULL";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['county_name']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    
    $conn->close();
?>

