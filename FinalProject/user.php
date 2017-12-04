<!DOCTYPE html>
<html>
    <title>User page</title>
    <head>
         <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <h1 id ="movie-head">Movies Database</h1>
    
<?php
    $isnotnull = "is not NULL";
    
    include 'database.php';
    global $conn;
    $conn = getDatabaseConnection();
    
    function getcorp()
    {
        global $conn;
             
        $sql = "SELECT DISTINCT Corporation FROM `movies` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function getgenre()
    {
        global $conn;
             
        $sql = "SELECT DISTINCT Genre FROM `movies` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function getdirector()
    {
        global $conn;
             
        $sql = "SELECT DISTINCT Director FROM `movies` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    $records = getcorp();   
    $genres= getgenre();
    $directors = getdirector();
        
    echo "<form id = 'user-form'>";
    echo "<select name = 'corp'>";
    echo "<option value = " .'"' .$isnotnull .'"' .'>' ."--select corp--" ."</option>";
    
    foreach($records as $record)
    {
        echo "<option value = " .'"' .'=' .'\'' .$record['Corporation'] .'\'' .'"' .'>' .$record['Corporation'] ."</option>";
    }
    echo "</select>";
    
    echo "<select name = 'genre'>";
    echo "<option value = " .'"' .$isnotnull .'"' .'>' ."--select genre--" ."</option>";
    
    foreach($genres as $genre)
    {
        echo "<option value = " .'"' .'=' .'\'' .$genre['Genre'] .'\'' .'"' .'>' .$genre['Genre'] ."</option>";
    }
    echo "</select>";
    
    echo "<select name = 'director'>";
    echo "<option value = " .'"' ."$isnotnull" .'"' .'>' ."--select director--" ."</option>";
    
    foreach($directors as $director)
    {
        echo "<option value = " .'"' .'=' .'\'' .$director['Director'] .'\'' .'"' .'>' .$director['Director'] ."</option>";
    }
    echo "</select>";
?>
        <input class="btn btn-success" type="submit" name = "submit" value="submit">
    </form>
<?php

//search function
    if(isset($_GET['submit']))
    {
        global $conn;
        $sql = "SELECT * FROM movies JOIN ratings ON movies.Name=ratings.Name WHERE genre " .$_GET['genre'] 
                ." AND Director " .$_GET['director']
                ." AND Corporation " .$_GET['corp'];
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<div class = 'text-center'>";
        
        echo "<table class = " .'"' ."table table-bordered" .'"' .">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Year</th>";
        echo "<th>Genre</th>";
        echo "<th>Director</th>";
        echo "<th>Minutes</th>";
        echo "<th>Income</th>";
        echo "<th>Actor</th>";
        echo "<th>Corporation</th>";
        echo "<th>Rating</th>";
        echo "</thead>";
        
        echo "<tbody>";
        
        foreach($records as $data) {
            echo "<tr>";
            echo "<td>" .$data['Name'] ."</td>" ."<td>" 
            .$data['Year'] ."</td>" ."<td>" .$data['Genre'] ."</td>"
            ."<td>" .$data['Director'] ."</td>" ."<td>" .$data['Minutes'] ."</td>"
            ."<td>" .$data['Gross'] ."</td>" ."<td>" .$data['Actor'] ."</td>" 
            ."<td>" .$data['Corporation'] ."</td>" ."<td>" .$data['Percent'] ."</td>";
        
            echo "</tr>";
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "<br>";
        echo "</div>";
    }
?>
</html>