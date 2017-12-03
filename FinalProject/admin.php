<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login  </title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>
            <header> Admin Login </header>
            
            <div class="login">
                <div class="user-pass">
                    <form method="post">
                        <label><b>Username</b></label>
                        <input onchange="validateUsername();" class = "username" id='username' type="text" name ="username"> <span id="username-valid"></span><br>
                        
                        <label><b>Password</b></label>
                        <input class="password" type="password" name="password" /> <br />
                        
                        <button class = "login-btn" type="submit" name="loginForm" value="Login">Login</button>
                        
                    </form>
                    <form action="login.php">
                        <button action = "login.php"  class = "return-btn">Back to start page</button>
                    </form>
                </div>
            </div>
            <br />
            <?=loginProcess()?>
            
    </body>
    
    <script>
    function validateUsername() {
            $.ajax({
                type: "get",
                url: "likeapi.php",
                dataType: "json",
                data: {'username': $('#username').val() },
                success: function(data,status) {
                    //debugger;
                    
                    if (data.length > 0) {
                        $('#username-valid').html("Username is in the table, enter the password"); 
                    } else {
                        $('#username-valid').html("Username is not in the table!");
                    }
                    
                  },
                complete: function(data,status) { //optional, used for debugging purposes
                     //alert(status);
                }
            });
                }
    </script>
    
</html>

<?php
session_start();   //starts or resumes a session

function loginProcess() {

    if (isset($_POST['loginForm'])) {  //checks if form has been submitted
    
        include 'database.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']); //uses sha1 for password encryption
            
            $sql = "SELECT *
                    FROM admin
                    WHERE username = :username 
                    AND   password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
               $_SESSION['username'] = $record['username'];
               header("Location: adminpage.php"); //redirecting to admin.php
            }
    }
}
?>
