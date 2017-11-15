<html>
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="color:green">
      <td >1</td>
      <td>Name and country of birth of female actresses who were NOT born in the USA, ordered by last name</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="color:green">
      <td>2</td>
      <td>Number of movies per category and their average duration</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="color:green">
      <td>3</td>
      <td>All info about the top three longest movies released after 2000</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="color:green">
       <td>4</td>
       <td>List of  actors and actresses who have not won an academy award, ordered by last name </td>
       <td align="center">15</td>
     </tr>
     <tr style="color:green">
      <td>5</td>
      <td>List of celebrities who have won an oscar, ordered by "award_year". Include full name, movie title, oscar year, and award category.</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="color:green">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    

</html>


<?php
    //_______________________Basic Setup for Connection to Database______________________________
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "midterm"; //name of the database in phpmyadmin
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully" ."<br>";
    
    echo "<br>" ."Problem A:" ."<br>" ."<br>";
    
    $sql = "SELECT firstName, lastName, country_of_birth FROM `celebrity` WHERE country_of_birth not like 'USA' AND gender LIKE 'F' ORDER BY lastName"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['firstName'] ." " .$row['lastName'] ." " .$row['country_of_birth']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    
    echo "<br><br>Problem B:<br><br>";
    
    $sql = "SELECT movie_category, COUNT(movie_category) as c, AVG(duration) as a FROM `movie` GROUP By movie_category"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['movie_category'] ." " .$row['c'] ." " .$row['a']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    
      echo "<br><br>Problem C:<br><br>";
    
    $sql = "SELECT * FROM `movie` Order by duration DESC limit 3"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['movie_title'] ." " .$row['duration'] ." " .$row['company'] ." " .$row['release_year']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    
     echo "<br><br>Problem D:<br><br>";
    
    $sql = "SELECT * FROM `celebrity` LEFT join oscar on celebrity.celebrityId = oscar.celebrity_id Where oscarId is NULL ORDER by lastName"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['firstName'] ." " .$row['lastName']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
     echo "<br><br>Problem E:<br><br>";
    
    $sql = "SELECT * FROM `celebrity` LEFT join oscar on celebrity.celebrityId = oscar.celebrity_id LEFT join award_category on oscar.award_cat_id = award_category.award_cat_id  LEFT join movie on movie.movieId = oscar.movieId where oscarId is not NULL ORDER by award_year"; //query statement
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['firstName'] ." " .$row['lastName'] ." " .$row['movie_title'] ." " .$row['award_category'] ." " .$row['award_year']; //display the info ['enter table column here']
            echo "<br>";
            }
    } else {
        echo "0 results";
    }
    
    
    
    $conn->close(); //MAKE SURE TO CLOSE THE CONNECTION
    
?>