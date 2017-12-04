<!DOCTYPE html>
<html>
    <header>Admin logged in</header>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    
    <script>
            function confirmDelete()
            {
                 return confirm("Are you sure you want to delete this entry?");
            }
            
            //ajax for avg
             function getAVG() {
            $.ajax({
                type: "get",
                url: "avgapi.php",
                dataType: "json",
                data: {'avgerage': $('#avg').val() },
                success: function(data,status) {
                    $('#AVGloc').html("");
                    var test;
                    test = data[0].average;
                    
                        $('#AVGloc').html("Average movie length: " + test +" minutes" + "<br>");
                    console.log(test);
                  },
                complete: function(data,status) { //optional, used for debugging purposes
                     //alert(status);
                }
            });
                }
            
            //ajax for gross income
             function getincome() {
            $.ajax({
                type: "get",
                url: "grossapi.php",
                dataType: "json",
                data: {'income': $('#income').val() },
                success: function(data,status) {
                    $('#GROSSloc').html("");
                    var test;
                    test = data[0].income;
                    
                        $('#GROSSloc').html("Average gross income: " + test +" million" + "<br>");
                    console.log(test);
                  },
                complete: function(data,status) { //optional, used for debugging purposes
                     //alert(status);
                }
            });
                }
                
            //ajax for genre count
             function getGenreCount() {
            $.ajax({
                type: "get",
                url: "genresapi.php",
                dataType: "json",
                data: {'genretype': $('#genretype').val() },
                success: function(data,status) {
                    $('#GENREloc').html("");
                    var test;
                    test = data.length;
                    for(var i = 0; i < test; i++)
                    {
                        $('#GENREloc').append("Number of " + data[i].type +" movies: " + data[i].count + "<br>");
                    }
                    console.log(test);
                    //debugger;
                  },
                complete: function(data,status) { //optional, used for debugging purposes
                     //alert(status);
                }
            });
                }
            
    </script>
<?php
session_start();
include 'database.php';
    global $conn;
    $conn = getDatabaseConnection();
    
function getdata()
{
    global $conn;
  
    $sql = "SELECT * FROM `movies` Join ratings ON movies.Name=ratings.Name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    //print_r($records);
    return $records;
}
    echo "<h1>Movies</h1>";
    
    $users = getdata();
    
    echo "<div class = 'text-center'>";
    
    echo "<table class = " .'"' ."table table-bordered" .'"' .">";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Year</th>";
    echo "<th>Genre</th>";
    echo "<th>Director</th>";
    echo "<th>Platform</th>";
    echo "<th>Minutes</th>";
    echo "<th>Income</th>";
    echo "<th>Actor</th>";
    echo "<th>Corporation</th>";
    echo "<th>Rating</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</thead>";
    
    echo "<tbody>";
    
    foreach($users as $user) {
        echo "<tr>";
        echo "<td>" .$user['Name'] ."</td>" ."<td>" .$user['Year'] ."</td>" ."<td>" .$user['Genre'] ."</td>"
            ."<td>" .$user['Director'] ."</td>" ."<td>" .$user['Platform'] ."</td>" ."<td>" .$user['Minutes'] ."</td>"
            ."<td>" .$user['Gross'] ."</td>" ."<td>" .$user['Actor'] ."</td>" ."<td>" .$user['Corporation'] ."</td>" ."<td>" .$user['Percent'] ."</td>";
        
        //echo $user['Number'] . "  " . $user['Name'] . " " . $user['Year'] ." LIKES: " .$user['Likes'];
        echo "<td><a href='update.php?id=".$user['Number']."'> Update </a></td>";
        echo "<td><a onclick='return confirmDelete()' href='deleteentry.php?Number=".$user['Number']."'> Delete </a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    echo "<br>";
        
?>

</div>

<button onclick="window.location.href='insert.php'" class="btn btn-warning">Insert</button>

    <div id="report-div">
        <h2>Reports</h2>
        
        <button class="btn" id="avg" onclick="getAVG();" name ="avg">Average movie length</button><br>
        <span id = "AVGloc"></span>
        
        <button class="btn btn-primary" id="income" onclick="getincome();" name ="income">Average income</button><br>
        <span id = "GROSSloc"></span>
        
        <button class="btn btn-info" id="genretype" onclick="getGenreCount();" name ="genretype">Amount in each genre</button><br>
        <span id = "GENREloc"></span>
    </div>
    <button class="btn btn-danger" onclick="window.location.href='logout.php'">
        Logout
    </button>
</html>