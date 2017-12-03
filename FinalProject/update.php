<!DOCTYPE html>
<html>
    <header>UPDATE</header>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
</html>
<?php
    session_start();
    
    include 'database.php';
    global $conn;
    
    $conn = getDatabaseConnection();
    
    function getInfo() {
        
        global $conn;
        
        $sql = "SELECT * FROM `movies` WHERE Number = " .$_GET['id'];
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    $info = getInfo();
    
    
    if (isset($_GET['submit'])) { //checks whether admin has submitted form.
         
         $sql = "UPDATE movies
                 SET Number = :number,
                     Name  = :name,
                     Year = :year,
                     Genre = :genre,
                     Director = :director,
                     Platform = :platform,
                     Minutes = :minutes,
                     Gross = :gross,
                     Actor = :actor,
                     Corporation = :corporation
                 WHERE Number = :number";
         $np = array(); //creates the array to set variables to prevent SQL injection
         
         $np[':number'] = $_GET['number'];
         $np[':name'] = $_GET['name'];
         $np[':year'] = $_GET['year'];
         $np[':genre'] = $_GET['genre'];
         $np[':director'] = $_GET['director'];
         $np[':platform'] = $_GET['platform'];
         
         $np[':minutes'] = $_GET['minutes'];
         $np[':gross'] = $_GET['gross'];
         $np[':actor'] = $_GET['actor'];
         $np[':corporation'] = $_GET['corporation'];
         
         $stmt = $conn->prepare($sql);
         $stmt->execute($np);
         
         echo "Record has been updated!";
     }
?>
<html>
    <body>
        <!--Creates the form with prepopulated data so the admin can update it-->
        <form id = "update-form">
            <input type="hidden" name="number" value="<?=$info['Number']?>" />
            Name:<input type="text" name="name" value= "<?=$info['Name']?>"/>
                <br />
            Year:<input type="number" name="year" value= "<?=$info['Year']?>"/>
                <br/>
            Genre: <input type= "text" name ="genre" value= "<?=$info['Genre']?>"/>
                <br/>
            Director: <input type= "text" name ="director" value= "<?=$info['Director']?>"/>
                <br/>
            Platform: <input type= "text" name ="platform" value= "<?=$info['Platform']?>"/>
                <br/>
            Minutes: <input type= "number" name ="minutes" value= "<?=$info['Minutes']?>"/>
                <br/>
            Gross Income in millions: <input type= "number" name ="gross" value= "<?=$info['Gross']?>"/>
                <br/>
            Actor: <input type= "text" name ="actor" value= "<?=$info['Actor']?>"/>
                <br/>
            Corporation: <input type= "text" name ="corporation" value= "<?=$info['Corporation']?>"/>
                <br/>
            <input class="update-submit" type="submit" value="submit" name="submit">
        </form>
        <!--Used to return the admin to the adminpage.php if they dont want to update the data-->
        <button class="btn btn-info" onclick="window.location.href='adminpage.php'">Return to admin page</button>
    
    </body>
</html>