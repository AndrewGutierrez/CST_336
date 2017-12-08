<html>
    <header>Insert page for movies</header>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
<?php
    session_start();
    include 'database.php';
    global $conn;
    $conn = getDatabaseConnection();
      
    if(isset($_GET['submit']))
    {
      echo "submitted ";
      
        $sql ="INSERT INTO `movies`(`Number`, `Name`, `Year`, `Genre`, `Director`, `Platform`, `Minutes`, `Gross`, `Actor`, `Corporation`) 
        VALUES ('NULL','" .$_GET['name'] ."','" .$_GET['year'] ."','" .$_GET['genre'] ."','" .$_GET['director']
        ."','" .$_GET['platform'] ."','" .$_GET['minutes'] ."','" .$_GET['gross'] ."','" .$_GET['actor'] 
        ."','" .$_GET['corporation'] ."')";
        
        //echo $sql;        
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $sql= "INSERT INTO `ratings` (`ID`, `Name`, `Percent`) VALUES ('NULL','". $_GET['name'] ."', '0')";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
?>
        <form id ="insert-form">
            Name:<input type="text" name="name" placeholder="name"><br>
            
            Year released:<input type="number" name="year" placeholder="year"><br>
            
            Genre:<input type="text" name="genre" placeholder="genre"><br>
            
            Director:<input type="text" name="director" placeholder="director"><br>
            
            Platform:<input type="text" name="platform" placeholder="platform"><br>
            
            Minutes:<input type="number" name="minutes" placeholder="minutes"><br>
            
            Gross income in millions:<input type="number" name="gross" placeholder="gross"><br>
            
            Main actor:<input type="text" name="actor" placeholder="actor"><br>
            
            Production company:<input type="text" name="corporation" placeholder="corporation"><br>
            
            <input class = "insert-submit" type="submit" name = "submit" value="submit">
            
        </form>
    <!--Used to return the admin to the adminpage.php if they dont want to update the data-->
    <button class="btn btn-info" onclick="window.location.href='adminpage.php'">Return to admin page</button>
    </body>
</html>