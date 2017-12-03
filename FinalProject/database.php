<?php

function getDatabaseConnection() {
    
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b229677fee94e5";
    $password = "99214852";
    $dbname="heroku_ae0fb105b2b4a84";
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    /*
    //used to connect to local database
    $servername = "localhost";
    $username = "root";
    $password = "cst336";
    $dbname = "final_project"; //name of the database in phpmyadmin
    
    // Create connection
    //$conn = new mysqli($servername, $username, $password, $dbname);
   
   $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
*/
    //return $conn; 
    return $dbConn;
}


//mysql://b4038f71e14ee4:227621f2@us-cdbr-iron-east-05.cleardb.net/heroku_22106684c98b3b9?reconnect=true
        // $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b4038f71e14ee4","227621f2","heroku_22106684c98b3b9");
    
?>