<?php

function getDatabaseConnection()
{
    // $host = "us-cdbr-iron-east-05.cleardb.net";
    // $username = "b3d374bc5def80";
    // $password = "6038e853";
    // $dbname="heroku_876ef2f60b62635";
    
    // $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // return $dbConn;
    
    /*
    $host = "localhost";
    $username = "root";
    $password = "cst336";
    $dbname="techdevicesapp";
    */
    
    //$servername = "us-cdbr-iron-east-05.cleardb.net";
   // mysql://b229677fee94e5:99214852@us-cdbr-iron-east-05.cleardb.net/heroku_ae0fb105b2b4a84?reconnect=true
   //mysql://b229677fee94e5:99214852@us-cdbr-iron-east-05.cleardb.net/heroku_ae0fb105b2b4a84?reconnect=true
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b229677fee94e5";
    $password = "99214852";
    $dbname="heroku_ae0fb105b2b4a84";
    
    $host = "localhost";
    $username = "root";
    $password = "cst336";
    $dbname="midterm";

// Create connection new mysqli($servername, $username, $password, $dbname);
   //$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   $conn = new mysqli($servername, $username, $password, $dbname);
  // $conn = new mysqli($servername, $username, $password, $dbname);
    //$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    
  }

?>