<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <h1>
        Device Search
    </h1>
    Please fill out the form or leave blank to see all devices.
<body>
    

<?php

//connect to datebase
    $servername = "us-cdbr-iron-east-05.cleardb.net";
   // mysql://b229677fee94e5:99214852@us-cdbr-iron-east-05.cleardb.net/heroku_ae0fb105b2b4a84?reconnect=true
    $username = "b229677fee94e5";
    $password = "99214852";
    $dbname="heroku_ae0fb105b2b4a84";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //echo "Connected successfully";
    
    /*
    //make a query
    $sql = "SELECT id, name, college FROM Departments";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "department id: " .$row['name'] ."<br/>";
        }
    } else {
        echo "0 results";
    }
    */
    
    //sort by device type
    //SELECT deviceName, deviceType FROM device ORDER BY deviceType //add DESC at end to get from z->a
    
    //filter by device type
    //SELECT deviceName, deviceType FROM device WHERE deviceType = 'computer' //computer = device type
    
    //filter by name
    //SELECT deviceName, deviceType FROM device WHERE deviceName LIKE '%a%' //a = what it contains
    
    //filter by status
    //SELECT deviceName, deviceType, status FROM device WHERE status = 'available' // available = if its checked out
    
    //sort by price
    //SELECT deviceName, deviceType, status, price FROM device ORDER BY price // add DESC to end to get from highest to lowest
   
   /*
    //make a query
    $sql = "SELECT deviceName FROM device ORDER BY deviceName";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Device: " .$row['deviceName'] ."<br/>";
        }
    } else {
        echo "0 results";
    }*/
    
    //creates form for types
    $sql = "SELECT DISTINCT deviceType FROM device ORDER BY deviceType";
    $result = $conn->query($sql);
    echo "<form>";
    
    echo "<input type='text'" ."name='name'" ."placeholder='Device Name'>";
    
    echo "<br>" ."<select name='type'>";
    echo "<option value=" .'"' ."is not NULL" .'"' .">" ."---type---" ."</option>";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<option value=" .'"' .'=' .'\'' .$row['deviceType'] .'\'' .'"' .">" .$row['deviceType'] ."</option>";
        }
    } else {
        echo "0 results";
    }
    echo "</select>";
    
    echo "<br>" ."Sort by: " ."<br>";
    echo "<input type= 'radio'" ."name='sort' value='deviceName' checked> Name<br>";
    echo "<input type= 'radio'" ."name='sort' value='price'> Price<br>";
    
    echo "<input type=checkbox name='status' value='Available'>Available";
    
    echo "<br>" ."<input type='submit' value='Submit'/>";
    
    echo "</form>";
    
    //
    
    echo "<h2>Results from database</h2>";
    
    //---------------------gets the devices for the type selected
    //echo $_GET['type'];
    
    if($_GET['status'] == 'Available')
    {
        //echo "IT IS CHECKED";
        $_GET['status'] = "= 'Available'";
    }
    else
    {
        //echo "NOT CHECKED";
        $_GET['status'] = "is not NULL";
    }
    if($_GET['name'] == NULL)
    {
        $_GET['name'] = "is NOT NULL";
        //echo "text is null <br/>";
    }
    else
    {
        $_GET['name'] = "LIKE " .'"' .'%' .$_GET['name'] .'%' .'"';
        //echo "text is NOT NULL<br/>";
    }
    if($_GET['type'] == NULL)
    {
        $_GET['type'] = "is not NULL";
    }
    
    if($_GET['sort'] == NULL)
    {
        $_GET['sort'] = "deviceName";
    }
    
   // $sql = "SELECT deviceName, deviceType FROM device WHERE deviceType = " ."'" .$_GET['type'] ."'";
    $sql= "SELECT * FROM `device` WHERE " ."deviceName " .$_GET['name'] ." AND deviceType " .$_GET['type'] ." AND device.status " .$_GET['status']  ." ORDER BY " .$_GET['sort'];
    //echo $sql ."<br/>";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Device name: " .$row['deviceName'] ."\tType: " .$row['type'] ."\tStatus:" .$row['status'] ."\tPrice:" .$row['price'] ."<br/>";
        }
    } else {
        echo "0 results";
    }
    
    
    $conn->close();
?>

</body>

</html>